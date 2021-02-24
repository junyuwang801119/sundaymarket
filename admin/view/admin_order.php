<?php
require_once('../public/shared/conn_PDO.php');
//include_once('../public/shared/assist_admin_chklogin.php');
if( !isset($_SESSION) ){ session_start(); }


//顯示商品訂單 -----------------------------------------------------------
try {
  $max_rows    = 5;                         
  $curr_page   = 0;                        
  if( isset( $_GET['curr_page'] ) ){ $curr_page = $_GET['curr_page']; }

  $first_row   = $curr_page * $max_rows;    
  $last_row    = $first_row + $max_rows-1;  
  $total_rows  = 0;                         
  $total_pages = 0;                         
  $page_file   = 'admin_order';             

  //變數==>search bar ---------------------------------------------------
  $search_key = '';
  $where = '';
  $search = '';
  if( isset($_GET['search_keyword']) ){
    $search_key = $_GET['search_keyword'];

    $where = "WHERE ordertab.order_amount LIKE '%$search_key%'
              OR ordertab.total_amount LIKE '%$search_key%'";

    $search = '&search_keyword='.$search_key;
  }

  
  $sql_str = "SELECT * FROM ordertab $where";
  $RS_ordertab_all = $conn -> query($sql_str);
  $total_rows = $RS_ordertab_all->rowCount();          //總筆數
  $total_pages = ceil( $total_rows / $max_rows );  //總頁數

  $sql_str = "SELECT ordertab.*, prod.prod_name, mem.user_name 
              FROM ordertab
              
              LEFT JOIN prod
              ON ordertab.prod_id = prod.prod_id

              LEFT JOIN mem
              ON ordertab.user_id = mem.user_id

              $where
              ORDER BY ordertab.order_ctime ASC
              LIMIT $first_row, $max_rows";
  $RS_ordertab_1 = $conn -> query($sql_str);

} 
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>
      <!--      右側內容區-->
      <div class="content-wrapper bg_color">

        <div class="container p-5">
<!--------------------- search bar 區  ----------------------------------->
          <div class="navbar-search-block mt-5  row justify-content-center">
            <form class="form-inline" method="get" action="">
              <div class="input-group input-group-sm">
                <input name="search_key" class="form-control form-control-navbar" type="search" placeholder="搜索" aria-label="搜索" >
                <button class="btn btn-lg btn-secondary pt-1" type="submit" style="height:30px; font-size: 1em;">搜尋</button>
              </div>
            </form>
          </div>
          
<!--------------------- 訂單列表區  ----------------------------------->          
          <div class="row mt-2">

            <div style="margin-right: 0;
    margin-left: 0;">
              <div class="p-0">
                <table class="table table-striped text-center  projects">
                  <thead>
                    <tr>
                      <th  style="width:100px;">
                        處理狀態
                      </th>
                      <th>
                        訂單縮圖
                      </th>
                      <th>
                        訂單名稱
                      </th>
                      <th >
                        金額
                      </th>
                      <th>
                        買家
                      </th>
                      <th>
                        下單日期
                      </th>
                      <th>
                        發貨日期
                      </th>
                      <th style="width:100px;">
                        支付
                      </th>
                      <th style="width:80px;">
                        物流
                      </th>
                      <th>
                        動作
                      </th>
                    </tr>
                  </thead>
                  <!--   項目列-->
                  <tbody>
                  <?php foreach( $RS_ordertab_1 as $row_ordertab ){ ?>
                    <tr>
                      <td>
                        <a>
                          <?php switch( $row_ordertab['order_status'] ){
                              case 0: echo '處理中' ; break;
                              case 1: echo '已出貨' ; break;
                              case 2: echo '已完成' ; break;
                              case 3: echo '取消訂單' ; break;
                            }?>
                        </a>
                      </td>
                      <td>
                        <ul class="list-inline">
                          <img alt="img" class="table-avatar" src="../public/upload_img/<?php echo $row_ordertab['prod_pic'];?>">
                        </ul>
                      </td>
                      <td>
                        <a>
                          <?php echo $row_ordertab['prod_name']; ?> 
                        </a>
                      </td>
                      <td>
                        <a>
                          <?php echo $row_ordertab['total_amount']; ?> 
                        </a>
                      </td>
                      <td>
                        <a>
                          <?php echo $row_ordertab['user_name']; ?> 
                        </a>
                      </td>
                      <td class="project-state">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"><?php echo $row_ordertab['order_ctime']; ?> </font>
                        </font>
                      </td>
                      <td class="project-state">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"><?php echo $row_ordertab['ship_time']; ?></font>
                        </font>
                      </td>
                      <td>
                        <a>
                          <?php switch ($row_ordertab['pay_mode'] ){
                              case 0: echo '貨到付款' ; break;
                              case 1: echo '信用卡' ; break;
                              case 2: echo 'ATM' ; break;
                          }?> 
                        </a>
                      </td>
                      <td>
                        <a>
                         <?php switch ($row_ordertab['ship_mode'] ){
                              case 0: echo '宅配' ; break;
                              case 1: echo '7-11' ; break;
                              case 2: echo '全家' ; break;
                              case 3: echo '萊爾富' ; break;
                          }?> 
                          
                        </a>
                      </td>
                      <td class="project-state">

                        <a class="btn btn-info btn-sm process-btn-m" href="view/admin_order_modify.php?order_id=<?php echo $row_ordertab['order_id']; ?>" data-toggle="modal" data-target="#admin_order_modify">
                          <i class="fas fa-pencil-alt">
                          </i>
                          修改
                        </a>
                        <a class="btn btn-danger btn-sm process-btn" href="view/admin_order_delete.php?order_id=<?php echo $row_ordertab['order_id']; ?>" data-toggle="modal" data-target="#admin_del">
                          <i class="fas fa-trash">
                          </i>
                          刪除
                        </a>
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#admin_modify_logistics">
                          <i class="fas fa-folder">
                          </i>
                          物流
                        </a>
                      </td>
                      <?php }?>
                    </tr>
                    
                  </tbody>
                </table>
<!--------------------- 頁碼區  ----------------------------------->
                <table width="100%">
                  <tr>
                    <td >
                     <?php echo '第'.($first_row+1).'~'.min($last_row+1,$total_rows).'筆 / 共'.$total_rows.'筆'; ?>
                    </td>
                    <td >
                    <?php
                    
                    //顯示頁碼連結 -------------------------------- 
                    for( $i=0; $i<$total_pages; $i++ ){
                      if( $i == $curr_page ){
                        echo '<span class="current">&nbsp;&nbsp;'.($i+1).'&nbsp;&nbsp;</span>';
                      }else{
                        echo '<a href="?page='.$page_file.'&curr_page='.$i.$search.'">';
                        echo $i+1;
                        echo '</a>';
                      } //if end
                    } //for end

                   ?>
                    </td>
                    <td style="text-align: right;">
                       <?php echo '第'.($curr_page+1).'頁 / 共'.$total_pages.'頁'; ?>
                    </td>
                  </tr>
                </table>
 <!-- /.card-body -->
              </div>

            </div>




          </div>
        </div>
      </div>
      <!-----------------------modal_----------admin_order_modify------------------->
      <div class="modal fade process-modal_m" id="admin_order_modify" tabindex="-1" role="dialog" aria-labelledby="admin_order_modifyTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content procontent_m">
            <div class="modal-header">
              <h5 class="modal-title" id="admin_order_modifyTitle">修改訂單資料</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
<div class="modal-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 ">
        <form style="width:100%;">
          <div class="row m-4">
            <label class="col-2 pt-2">處理狀態:</label>
            <select class="form-control" style="width:auto;" >
              <option>已付款</option>
              <option>已出貨</option>
              <option>待出貨</option>
              <option>待付款</option>
              <option>已收到</option>
              <option class="text-danger">有問題</option>
            </select>
            <button type="button" class="btn btn-secondary offset-3" >訂單商品資訊</button>
          </div>
          <div class="input-group row m-4">
            <div class="custom-file col-9">
              <input type="file" class="custom-file-input" id="inputImg_commodity_modify" aria-describedby="inputImg_commodity_modify">
              <label class="custom-file-label" for="inputImg_commodity_modify">選擇一張圖片</label>
            </div>
            <div class="input-group-append col-3">
              <button class="btn btn-secondary" type="button" id="inputImg_commodity_modify">上傳</button>
            </div>
          </div>

          <div class="form-group row m-4">
            <label for="formGroupExampleInput" class="col-2 pt-2">訂單編號:</label>
            <input type="text" class="form-control col-10 form-control-plaintext" id="formGroupExampleInput" placeholder="t1234567">
            <label for="formGroupExampleInput" class="col-2 pt-2">會員帳號:</label>
            <input type="text" class="form-control col-5 form-control-plaintext" id="formGroupExampleInput" placeholder="mark111@gmail.com">
            <button class="btn btn-secondary col-2 offset-1" type="button" id="inputImg_commodity_modify">修改會員</button>
          </div>
          <div class="form-group row m-4 ">
            <label for="exampleFormControlSelect2" class="ml-2">訂單內容:</label>
            <select multiple class="form-control col-6 ml-2" id="exampleFormControlSelect2">
              <option>白色馬克杯</option>
            </select>
            <div class="">
              <button class="btn btn-secondary" type="button" id="inputImg_commodity_modify">複選刪除</button>
              <button class="btn btn-secondary" type="button" id="inputImg_commodity_modify">修改</button>
            </div>
          </div>


          <div style="" class="form-row m-4">
            <div class="form-group col-2">
              <label for="formGroupExampleInput">訂單金額</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="700">
            </div>
            <div class="form-group col-2">
              <label for="formGroupExampleInput">數量</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="請輸入主題文字">
            </div>
            <div class="form-group col-4 ">
              <div class="form-row pt-4 mt-3 pl-3">
                <div class="custom-control custom-switch mr-3">
                  <input type="checkbox" class="custom-control-input" id="admin_commodity_modify1">
                  <label class="custom-control-label" for="admin_commodity_modify1">超取</label>
                </div>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="admin_commodity_modify2">
                  <label class="custom-control-label" for="admin_commodity_modify2">宅配</label>
                </div>
              </div>
            </div>
          </div>
          <div style="" class="form-row m-4">
            <div class="form-group col-4">
              <label for="formGroupExampleInput">收件人</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="請輸入主題文字">
            </div>
            <div class="form-group col-8">
              <label for="formGroupExampleInput">送貨地址</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="請輸入主題文字">
            </div>
          </div>                      
          <div class="form-row m-4">
            <label class="col-2" for="admin_order_modify_supermarket">超取門市</label>
            <input type="text" class="form-control col-8" id="admin_order_modify_supermarket" placeholder="請輸入主題文字">
            <button type="button" class="btn btn-secondary col-2" >更改門市</button>
          </div>
          <div class="form-row m-4">
            <label class="col-2" for="formGroupExampleInput">付款方式</label>
            <input type="text" class="form-control col-8" id="formGroupExampleInput" placeholder="貨到付款">
            <button type="button" class="btn btn-secondary col-2" >更改付款</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" >清除資料</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>
              <button type="button" class="btn btn-info">確認修改</button>
            </div>
          </div>
        </div>
      </div>
      <!-----------------------modal_end----------admin_order_modify------------------>   
  
      <!-----------------------modal_del----------------------------->
      <div class="modal fade process-modal" id="admin_del" tabindex="-1" role="dialog" aria-labelledby="admin_delLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content procontent">
            
          </div>
        </div>
      </div>
      <!-----------------------modal_end---------------------------->  
      <div class="modal fade" id="admin_modify_logistics" tabindex="-1" role="dialog" aria-labelledby="admin_modify_logistics" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">物流資料</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 ">
                    <form>
                      <div class="row m-4">
                        <select class="form-control" style="width:auto;" >
                          <option>7-11</option>
                          <option>全家</option>
                          <option>萊爾富</option>
                          <option>宅配</option>
                        </select>
                        <button type="button" class="btn btn-secondary col-2 ml-2">修改</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">取消關閉</button>
              <button type="button" class="btn btn-primary">確認修改</button>
            </div>
          </div>
        </div>
      </div>


<style>
  .current{ color: red;font-weight: 600;}
</style>

<script src="include/js/modal_ajax_m.js"></script>
<script src="include/js/modal_ajax.js"></script>
<script src="include/js/modal_ajax_deta.js"></script>  
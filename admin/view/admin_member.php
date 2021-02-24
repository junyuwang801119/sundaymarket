<?php

require_once('../public/shared/conn_PDO.php');

try{

$sql_str = "SELECT * 
            FROM mem 
            ORDER BY user_id ASC";
$RS_mem_all = $conn -> query($sql_str);
$total_RS_mem_all = $RS_mem_all -> rowCount();

}
catch (PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }

try{
  
   //為了分頁的變數 ------------------------------------------------
  $max_rows    = 5;                         //一頁最多筆數
  $curr_page   = 0;                         //目前第幾頁(索引號碼)
  if( isset( $_GET['curr_page'] ) ){ $curr_page = $_GET['curr_page']; }

  $first_row   = $curr_page * $max_rows;    //目前頁面第一筆的索引號碼
  $last_row    = $first_row + $max_rows-1;  //目前頁面最後一筆的索引號碼
  $total_rows  = 0;                         //總共的筆數
  $total_pages = 0;                         //總共的頁數
   
  $page_file = 'admin_member';
  $search_key = '';
  $where = '';
  $search = '';
  $user_id = '';
  
 
  
  if(isset($_GET['search_keyword']) ){
    $search_key = $_GET['search_keyword'];
    $where = " WHERE mem.user_name LIKE '%$search_key%'";
    $search = "&search_key=".$search_key;
  }
  
  
  $sql_str = "SELECT * FROM mem $where";
  $RS_user_all = $conn -> query($sql_str);
  $total_rows = $RS_user_all->rowCount();          //--------------總筆數
  $total_pages = ceil( $total_rows / $max_rows );  //--------------總頁數

  $sql_str = "SELECT * FROM mem
              $where
              ORDER BY user_id ASC
              LIMIT $first_row, $max_rows";
  $RS_mem_rows = $conn -> query($sql_str);

  
}catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>

      <!--      右側內容區-->
      <div class="content-wrapper bg_color">

        

        <div class="container p-5">
          
          <div class="navbar-search-block mt-5  row justify-content-center">
            <form class="form-inline">
             <h6 style="margin-right:200px;">會員總人數：<?php echo $total_RS_mem_all; ?>人</h6>
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="搜索" aria-label="搜索" >
                <button class="btn btn-lg btn-secondary pt-1" type="submit" style="height:30px; font-size: 1em;">搜尋</button>
              </div>
            </form>
          </div>
          <div class="row mt-2">

            <div class="col-12">
              <div class="p-0">
                <table class="table table-striped text-center  projects">
                  <thead>
                    <tr>
                    <th>
                        會員頭像
                      </th> 
                       <th >
                        會員等級
                      </th>
                      <th>
                        會員名字
                      </th>
                      <th>
                        信箱帳號
                      </th>
                      <th>
                        新增日期
                      </th>
                      <th>
                        修改日期
                      </th>
                      <th>
                        動作
                      </th>
                    </tr>
                  </thead>
                  <!--   項目列-->
                  <tbody>
                   <?php while( $row_RS_mem = $RS_mem_rows->fetch(PDO::FETCH_ASSOC) ){ ?>
                    <tr class="text-center">
                     <td>
                        <a herf="view/admin_member_detail.php?user_id=<?php echo $row_RS_mem['user_id']; ?>" data-title="詳細內容">
                         <img src="../public/img_icon/<?php echo $row_RS_mem['user_icon'] ;?>" style="width:50px;">
                        </a>
                      </td>
                      <td>
                        <a>
                         <?php switch( $row_RS_mem['user_grade'] ){
                                  case 0:
                                  echo "未激活";break;
                                   case 1:
                                  echo "一般會員";break;
                                   case 2:
                                  echo "商品管理員";break;
                                   case 9:
                                  echo "超級管理員";break;
                              } ?>
                        </a>
                      </td>
                      <td>
                        <a>
                          [<?php echo $row_RS_mem['user_id']; ?>] <?php echo $row_RS_mem['user_name']; ?>
                        </a>
                      </td>
                      <td>
                        <a>
                          <?php echo $row_RS_mem['user_mail']; ?>
                        </a>
                      </td>
                      <td>
                        <a>
                          <?php echo $row_RS_mem['create_time']; ?>
                        </a>
                      </td>
                      <td>
                        <a>
                          <?php echo $row_RS_mem['modify_time']; ?>
                        </a>
                      </td>
                      <td>
                        <a class="btn btn-info btn-sm process-btn" href="view/admin_mem_modify.php?user_id=<?php echo $row_RS_mem['user_id']; ?>"  data-toggle="modal" data-target="#admin_member_modify">
                          <i class="fas fa-pencil-alt">
                          </i>
                          修改
                        </a>
                        <a class="btn btn-danger btn-sm process-btn" href="view/admin_mem_delete.php?user_id=<?php echo $row_RS_mem['user_id']; ?>"  data-toggle="modal" data-target="#admin_del">
                          <i class="fas fa-trash">
                          </i>
                          刪除
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                
                <table width="100%">
                  <tr>
                    <td >
                     <?php echo '第'.($first_row+1).'~'.min($last_row+1,$total_rows).'筆 / 共'.$total_rows.'筆'; ?>
                    </td>
                    <td >
                    <?php
                    
                    //顯示頁碼連結 -------------------------------- 
                    for( $i=0; $i<$total_pages; $i++ ){
                      //假如是目前所在的頁碼 > 不用連結, 用span > CSS設計
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
               

              </div>

            </div>




          </div>
        </div>
      </div>
      
           <!-----------------------modal_----------admin_member_modify------------------->
<!--
      <div class="modal fade process-modal " id="admin_member_modify" tabindex="-1" role="dialog" aria-labelledby="admin_member_modifyTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="admin_member_modifyTitle">修改會員資料</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 ">
                    <form style="width:100%;">
                      <div class="form-group row m-4">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">帳號等級:</label>
                        <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="管理員">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員帳號:</label>
                        <input type="text" class="form-control col-9  mt-2" id="formGroupExampleInput" placeholder="mark111@gmail.com">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">修改密碼:</label>
                        <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="******">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">確認密碼:</label>
                        <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="******">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員名稱:</label>
                        <input type="text" class="form-control col-9  mt-2" id="formGroupExampleInput" placeholder="Mark">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員性別:</label>
                        <div class="col-9 pt-2 mt-2">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">男</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">女</label>
                          </div>
                        </div>
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員電話:</label>
                        <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="0938138138">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員地址:</label>
                        <input type="text" class="form-control col-9 mt-2 " id="formGroupExampleInput" placeholder="天堂市天堂路地獄巷十八層">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-danger" >清除資料</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>
              <button type="button" class="btn btn-info">確認修改</button>
            </div>
          </div>
        </div>
      </div>
-->
      <!-----------------------modal_end----------admin_member_modify------------------>  
      
      <!-----------------------modal_del----------------------------->
      <div class="modal fade process-modal" id="admin_del" tabindex="-1" role="dialog" aria-labelledby="admin_delLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content procontent">

          </div>
        </div>
      </div>
      <!-----------------------modal_end---------------------------->  
<style>
  .current{ color: red;font-weight: 600;}
</style>


<script>
//修/刪 彈窗內容
  
$('.process-btn').click(function(){
    //載入需要的檔案
    var url = $(this).attr('href');
    console.log (url);
    $.get(url,function(data){
      //將彈窗內容格式載入.process-modal .modal-content裡
      $('.process-modal .procontent').html(data);
      //讓.process-modal出現
      $('.process-modal').show();
    });

    
  });

  $('.process-modal').click(function(){
    $(this).hide();
  });

//  $('.process-modal .w3-modal-content').click(function(e){
//    e.stopPropagation();
//  });

</script>
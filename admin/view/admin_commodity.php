<?php
require_once('../public/shared/conn_PDO.php');
//include_once('../public/shared/assist_admin_chklogin.php');
if( !isset($_SESSION) ){ session_start(); }

//新增商品-------------------------------------
try {
  $sql_str = "SELECT * FROM prod_class
              ORDER BY 	prod_class_level ASC";

  $RS_prod_class = $conn -> query($sql_str);
} 
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

//顯示商品 -----------------------------------------------------------
try {
  $max_rows    = 5;                         
  $curr_page   = 0;                        
  if( isset( $_GET['curr_page'] ) ){ $curr_page = $_GET['curr_page']; }

  $first_row   = $curr_page * $max_rows;    
  $last_row    = $first_row + $max_rows-1;  
  $total_rows  = 0;                         
  $total_pages = 0;                         
  $page_file   = 'admin_commodity';             

  //變數==>search bar ---------------------------------------------------
  $search_key = '';
  $where = '';
  $search = '';
  if( isset($_GET['search_keyword']) ){
    $search_key = $_GET['search_keyword'];

    $where = "WHERE prod.prod_name LIKE '%$search_key%'
              OR prod.prod_content LIKE '%$search_key%'";

    $search = '&search_keyword='.$search_key;
  }


  $sql_str = "SELECT * FROM prod $where";
  $RS_prod_all = $conn -> query($sql_str);
  $total_rows = $RS_prod_all->rowCount();          //總筆數
  $total_pages = ceil( $total_rows / $max_rows );  //總頁數

  $sql_str = "SELECT prod.*, prod_class.prod_class_name, mem.user_name 
              FROM prod
              LEFT JOIN prod_class
              ON prod.prod_class_id = prod_class.prod_class_id

              LEFT JOIN mem
              ON prod.user_id = mem.user_id

              $where
              ORDER BY prod.prod_create_time DESC
              LIMIT $first_row, $max_rows";
  $RS_prods = $conn -> query($sql_str);

} 
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>


<!--      右側內容區-->
<div class="content-wrapper bg_color">

  <div class="container p-5">
    <form method="post" enctype="multipart/form-data" action="view/admin_prod_process.php" class="form-row">
      <div class="row justify-content-center">  
        <!------------  上傳圖像區    -------------->

        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 ">
          <label class="btn btn-secondary ">
            <input type="file" name="prod_pic" id="prod_pic" style="display:none;">
            <i class="fa fa-photo"></i> 上傳圖片 </label>
          <!--#imgArea 這個區域負責顯示所選擇的圖檔, 也就是影像的預覽區域 -->
          <div id="imgArea" title="" style="padding:20px;">
            <img class="imgArea" style="max-width:100%;height:auto;">
          </div>
        </div>

        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
          <div class="form-group">
            <label>選擇分類</label>
            <select name="prod_class_id" class="form-control" style="width:50%;">

              <option value="" disabled selected>---請選擇分類---</option>
              <?php foreach( $RS_prod_class as $prod_row ){ ?>
              <option value="<?php echo $prod_row['prod_class_id'] ;?>">
                <?php echo $prod_row['prod_class_name'] ;?>
              </option>
              <?php } ?>
            </select>

          </div>

          <button id="showClassNews" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#admin_sort_modify" >修改分類</button>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
          <div style="" class="form-row">
            <div class="form-group col-md-6">
              <label for="in_name">商品名稱</label>
              <input type="text" name="prod_name" class="form-control" id="in_name" placeholder="請輸入商品名稱">
            </div>
<!--
            <div class="form-group col-md-6">
              <label for="formGroupExampleInput">商品位置</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="請輸入商品位置">
            </div>
-->
          </div>
          <div style="" class="form-row">
            <div class="form-group col-md-5">
              <label for="in_price">商品價格</label>
              <input type="text" name="prod_price" class="form-control" id="in_price" placeholder="商品價格">
            </div>
            <div class="form-group col-md-3">
              <label for="in_tnum">商品數量</label>
              <input type="text" name="prod_tnum" class="form-control" id="in_tnum" placeholder="商品數量">
            </div>
            <div class="form-group col-md-4 ">
              <div class="form-row pt-4 mt-3 pl-3">
                <div class="custom-control custom-switch mr-3">
                  <input type="checkbox" class="custom-control-input" id="commodity_Supermarket_new" name="prod_display">
                  <label class="custom-control-label" for="commodity_Supermarket_new">上架</label>
                </div>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="commodity_home_delivery_new">
                  <label class="custom-control-label" for="commodity_home_delivery_new">宅配</label>
                </div>
              </div>
            </div>
          </div>
          <div style="" class="form-row">
            <div class="form-group col-8">
              <label for="exampleFormControlTextarea1">商品敘述</label>
              <textarea name="prod_content" class="form-control" id="exampleFormControlTextarea1" placeholder="請輸入內文商品敘述" rows="3"></textarea>
            </div>
            <div class="form-group  btn-group-vertical col-3 pt-4 ">
              <!--                  <button type="button" class="btn btn-secondary m-1 " style="">確定新增</button>-->
              <button type="button" class="btn btn-secondary m-1 ">清除</button>
              <input type="submit" class="btn btn-secondary m-1 " value="確定新增">
              <input type="hidden" name="MM_process" value="insert">
            </div>
          </div>

        </div>

      </div>
    </form>
    <!----------------   search bar 區 ----------------->
    <div class="navbar-search-block mt-5">
      <form class="form-inline" method="get">
        <input type="hidden" name="page" value="admin_commodity">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="搜索" aria-label="搜索" name="search_keyword">
          <button class="btn btn-lg btn-secondary pt-1"  type="submit" style="height:30px; font-size: 1em;">搜尋</button>
        </div>
      </form>
    </div>

    <!----------------   商品顯示 區 ----------------->          
    <div class="row mt-2">
      <div class="col-12">
        <div class="p-0">
          <table class="table table-striped projects">
            <thead class="text-center">
              <tr>
                <th>
                  分類
                </th>
                <th>
                  縮圖
                </th>
                <th>
                  商品名
                </th>
                <th>
                  單價
                </th>
                <th>
                  庫存量
                </th>
                <th>
                  上架
                </th>
                <th>
                  新增日期
                </th>
                <th>
                  修改日期
                </th>
                <th>
                  上架人員
                </th>
                <th>
                  動作
                </th>
              </tr>
            </thead>
            <!--   項目列-->
            <tbody>
              <?php foreach( $RS_prods as $p_row ){ ?>
              <tr class="text-center">
                <td>
                  <a>
                    <?php echo $p_row['prod_class_name']; ?>
                  </a>
                </td>
                <td>
                  <ul class="list-inline">
                   <a href="view/admin_prod_detail.php?prod_id=<?php echo $p_row['prod_id']; ?>" 
                     class="process-btn" data-toggle="modal" data-target="#prod_modal">
                    <img src="../public/img_prod/<?php echo $p_row['prod_pic'] ;?>" class="table-avatar" style="width:50px;">
                    </a>
                  </ul>
                </td>
                <td>
                  <a >
                    <?php echo $p_row['prod_name']; ?>
                  </a>
                </td>
                <td>
                  <a>
                    <?php echo $p_row['prod_price']; ?>
                  </a>
                </td>
                <td>
                  <a>
                    <?php echo $p_row['prod_tnum']; ?>
                  </a>
                </td>
                <td>
                  <a>
                    <?php if( $p_row['prod_display']==1 ){ echo 'V'; } ?>
                  </a>
                </td>
                <td class="project-state">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"><?php echo $p_row['prod_create_time']; ?></font>
                  </font>
                </td>
                <td class="project-state">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"><?php echo $p_row['prod_modify_time']; ?></font>
                  </font>
                </td>
                <td>
                  <a>
                    <?php echo $p_row['user_name']; ?>
                  </a>
                </td>
                <td class="project-actions ">
                  <a class="btn btn-info btn-sm process-btn" href="view/admin_prod_modify.php?prod_id=<?php echo $p_row['prod_id']; ?>" data-toggle="modal" data-target="#prod_modal">
                    <i class="fas fa-pencil-alt">
                    </i>
                    修改
                  </a>
                  <a class="btn btn-danger btn-sm process-btn" href="view/admin_prod_delete.php?prod_id=<?php echo $p_row['prod_id']; ?>" data-toggle="modal" data-target="#prod_modal">
                    <i class="fas fa-trash">
                    </i>
                    刪除
                  </a>
                  <!--
<a class="btn btn-primary btn-sm" href="#">
<i class="fas fa-folder">
</i>
物流
</a>
-->
                </td>
              </tr>
              <?php }?>
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

 
<!-----------------------modal_del----------------------------->
<div class="modal fade process-modal" id="prod_modal" tabindex="-1" role="dialog" aria-labelledby="admin_delLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content procontent">

    </div>
  </div>
</div>
<!-----------------------modal_end---------------------------->  
<!-----------------------modal----------------------------->
<div class="modal fade classModal" id="admin_sort_modify" tabindex="-1" role="dialog" aria-labelledby="admin_sort_modify" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="admin_prod_modifyTitle">修改類別資料</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-danger" >清除資料</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>
        <button type="button" class="btn btn-info">確認修改</button>
      </div>
    </div>
  </div>
</div>
<!-----------------------modal_end---------------------------->      

<style>
  .current{ color: red;font-weight: 600;}
</style>

<script src="include/js/modal_ajax.js"></script>
<script src="include/js/class_modal_ajax.js"></script>


<script>

  //圖檔的預覽程式
  function preview(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var resultArea = '#imgArea img';
        $(resultArea).attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  //上傳圖片 按鈕選擇了圖檔
  $('#prod_pic').on('change', function() {
    preview(this);

  });

</script>
<!--

<script>
$(function(){

//當#showClassNews按鈕被點選時==================
$('#showClassNews').click(function(){
//運用ajax技術
$.ajax({
//呼叫 admin_news_class_show.php 協助處理，負責查詢出資料
url:'./admin_news_class_show.php'

//當完成 admin_news_class_show.php 檔案的工作之後
//繼續進行以下function
//變數result負責接收 admin_news_class_show.php 回傳的資料
}).done(function(result){
//將接收到的資訊，顯示到.class_news_list這個區塊之內
$('.class_news_list').html(result);
});
//完成以上之後，顯示出#newsClassArea這個區塊
$('#newsClassArea').show();
});

});


//當新增、修改、刪除三個按鈕被點選時
//皆由這個function函式來處理, obj變數接收傳遞過來的按鈕
function manage_news_class(obj){
//先取得需要的資料
var $type = $(obj).attr('data-type');  //得到的資訊是為了分辨insert新增、update修改、delete刪除
var $news_class_name = $(obj).parent().find('.class_val').val();  //輸入的分類名稱
var $news_class_id   = $(obj).parent().find('.class_val').attr('data-id');  //修改或刪除時需要的id值

if($type=='delete'){
if(!confirm('刪除後不能還原！確定刪除嗎？')){
return;  //表示接下來的程式不執行了, 回到呼叫這個function的位置
}
}
//接著運用ajax技術
$.ajax({
//呼叫 news_class_manage.php協助處理，負責新增、修改、刪除等功能
url:'./admin_news_class_manage.php'
//以post的方法將以下資料傳入news_class_manage.php檔案
,type:'post'
,data:{
type: $type  //負責辨別要處理新增或修改或刪除
,news_class_name: $news_class_name  //輸入的分類名稱
,news_class_id: $news_class_id  //修改或刪除時需要的id值
}
}).done(function(result){
//自動觸發關閉按鈕
$('#newsClassArea .w3-modal-close').trigger('click');
//將接收到資料送到.select_class_news這個區塊內顯示
$('.select_news_class').html(result);
//alert(result);
});    
}

</script>-->

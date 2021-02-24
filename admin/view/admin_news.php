<?php
require_once('../public/shared/conn_PDO.php');
//include_once('../public/shared/assist_admin_chklogin.php');
if( !isset($_SESSION) ){ session_start(); }
//新增訊息-------------------------------------
try {
  $sql_str = "SELECT * FROM news_class
              ORDER BY news_class_id ASC";
  $RS_news_class = $conn -> query($sql_str);
} 
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

//顯示訊息=====================================================================
try {
  $max_rows    = 5;                         
  $curr_page   = 0;                        
  if( isset( $_GET['curr_page'] ) ){ $curr_page = $_GET['curr_page']; }

  $first_row   = $curr_page * $max_rows;    
  $last_row    = $first_row + $max_rows-1;  
  $total_rows  = 0;                         
  $total_pages = 0;                         
  $page_file   = 'admin_news';             

  //變數==>search bar ---------------------------------------------------
  $search_str = '';
  $where = '';
  $search = '';
  if( isset($_GET['search_keyword']) ){
    $search_str = $_GET['search_keyword'];

    $where = "WHERE news.news_title LIKE '%$search_str%'
              OR news.news_content LIKE '%$search_str%'";

    $search = '&search_keyword='.$search_str;
  }

  
  $sql_str = "SELECT * FROM news $where";
  $RS_news_all = $conn -> query($sql_str);
  $total_rows = $RS_news_all->rowCount();          //總筆數
  $total_pages = ceil( $total_rows / $max_rows );  //總頁數

  $sql_str = "SELECT news.*, news_class.news_class_name, mem.user_name 
              FROM news
              LEFT JOIN news_class
              ON news.news_class_id = news_class.news_class_id

              LEFT JOIN mem
              ON news.user_id = mem.user_id

              $where
              ORDER BY news.new_create_time DESC
              LIMIT $first_row, $max_rows";
  $RS_news = $conn -> query($sql_str);

} 
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>

      <!--      右側內容區-->
      <div class="content-wrapper bg_color">
      <!------------  上傳圖像區    -------------->
        <div class="container p-5">
         <form style="width:100%;" method="post" enctype="multipart/form-data" action="view/admin_news_process.php" class="newsForm">
          <div class="row justify-content-center">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 ">
             
              <label class="btn btn-secondary ">
                <input type="file" name="news_pic" id="news_pic" style="display:none;">
                <i class="fa fa-photo"></i> 上傳圖片 </label>
              <!--#imgArea 這個區域負責顯示所選擇的圖檔, 也就是影像的預覽區域 -->
              <div id="imgArea" title="" style="padding:20px;">
                <img class="imgArea" style="max-width:100%;height:auto;">
              </div>
            </div>
            
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
              <div class="form-group">
                <label>選擇分類</label>
                <select name="news_class_id" class="form-control" style="width:50%;">
                  
                  <option value="news_class_id" disabled selected>---請選擇分類---</option>
                  <?php foreach( $RS_news_class as $key=>$row_class ){ ?>
                  <option value="<?php echo $row_class['news_class_id']; ?>">
                     <?php echo $row_class['news_class_name']; ?>
                  </option>
                   <?php } ?>
                  
                </select>
              </div>
              
              <button id="showClassNews" type="button" class="btn btn-secondary process-btn" data-toggle="modal" data-target="#news_class_modal">分類管理</button>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
              
                <div class="form-group">
                  <label for="formGroupExampleInput">新訊標題</label>
                  <input name="news_title" type="text" class="form-control" id="formGroupExampleInput" placeholder="請輸入主題文字">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">新訊內文</label>
                  <textarea name="news_content" class="form-control" id="exampleFormControlTextarea1" placeholder="請輸入內文" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">顯示：
                  <input type="checkbox" name="news_show" value="1" checked> </label>
                  </div>
<!--                <button type="button" class="btn btn-secondary">確定新增</button>-->
                <input type="submit" class="btn btn-secondary" value="確定新增新訊">
                <button type="button" class="btn btn-secondary">清除</button>
                <input type="hidden" name="MM_process" value="insert">
            </div>
          </div>
          </form>
          
<!--         search bar 區 -->
          <div class="navbar-search-block mt-5">
            <form class="form-inline" method="get">
              <div class="input-group input-group-sm">
                <input type="hidden" name="page" value="admin_news"> 
                <input class="form-control form-control-navbar" type="search" placeholder="搜索" aria-label="搜索" name="search_keyword">
                <button class="btn btn-lg btn-secondary pt-1" type="submit" style="height:30px; font-size: 1em;">搜尋</button>
              </div>
            </form>
          </div>
          
<!--   訊息顯示區       -->
          <div class="row mt-2">

            <div class="col-12">
              <div class="p-0">
                <table class="table table-striped projects">
                  <thead>
                    <tr>
                      <th class="text-center">
                        分類
                      </th>
                      <th class="text-center">
                        縮圖
                      </th>
                      <th class="text-center">
                        標題
                      </th>
                      <th class="text-center">
                        顯示
                      </th>
                      <th class="text-center">
                        新增日期
                      </th>
                      <th class="text-center">
                        建檔人員
                      </th>
                      <th class="text-center">
                        動作
                      </th>
                    </tr>
                  </thead>
                  <!--   項目列-->
                  <tbody>
                   <?php foreach( $RS_news as $row ){?>
                    <tr>
                      <td>
                        <a>
                          <?php echo $row['news_class_name']; ?>
                        </a>
                      </td>
                      <td>
                        <ul class="list-inline">
                        <a href="view/admin_news_detail.php?news_id=<?php echo $row['news_id']; ?>" 
                           class="process-btn" data-toggle="modal" data-target="#news_modal">
                         <img src="../public/img_news/<?php echo $row['news_pic'] ;?>" style="width:80px;">
                          </a>
                        </ul>
                      </td>
                      <td>
                       <a>
                          <?php echo $row['news_title']; ?>
                        </a>
                      </td>
                      <td class="project-state">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"><?php if( $row['news_show']==1 ){ echo 'V'; } ?></font>
                        </font>
                      </td>
                      <td class="project-state">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;"><?php echo $row['new_create_time']; ?></font>
                        </font>
                      </td>
                      <td class="project-state">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                        <?php if( $row['user_name']!='' ){
                                echo $row['user_name'];
                              }else{
                                echo '前期預設';
                              }
                            ?></font>
                        </font>
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm process-btn" href="view/admin_news_modify.php?news_id=<?php echo $row['news_id']; ?>" data-toggle="modal" data-target="#news_modal"> 
                          <i class="fas fa-pencil-alt">
                          </i>
                          修改
                        </a>
                        <a class="btn btn-danger btn-sm process-btn" href="view/admin_news_delete.php?news_id=<?php echo $row['news_id']; ?>" data-toggle="modal" data-target="#news_modal">
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
               
              </div>
            </div>
          </div>
        </div>
      </div>



<!--      ---------------------modal----------------------------->
      <div class="modal fade classModal" id="news_class_modal" tabindex="-1" role="dialog" aria-labelledby="admin_sort_modify" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="admin_news_modifyTitle">修改類別資料</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
<!--
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 ">
                    <form>
                      <div class="row m-4">
                        <input type="text" class="form-control col-9" id="formGroupExampleInput" placeholder="請輸入主題文字">
                        <button type="button" class="btn btn-secondary col-3">新增分類</button>
                      </div>
                      <div class="row m-4">
                        <input type="text" class="form-control col-7" id="formGroupExampleInput" placeholder="廣告">
                        <button type="button" class="btn btn-secondary col-2 ml-2">修改</button>
                        <button type="button" class="btn btn-secondary col-2 ml-2">刪除</button>
                      </div>
                      <div class="row m-4">
                        <input type="text" class="form-control col-7" id="formGroupExampleInput" placeholder="優惠">
                        <button type="button" class="btn btn-secondary col-2 ml-2">修改</button>
                        <button type="button" class="btn btn-secondary col-2 ml-2">刪除</button>
                      </div>
                      <div class="row m-4">
                        <input type="text" class="form-control col-7" id="formGroupExampleInput" placeholder="活動">
                        <button type="button" class="btn btn-secondary col-2 ml-2">修改</button>
                        <button type="button" class="btn btn-secondary col-2 ml-2">刪除</button>
                      </div>
                      <div class="row m-4">
                        <input type="text" class="form-control col-7" id="formGroupExampleInput" placeholder="其他">
                        <button type="button" class="btn btn-secondary col-2 ml-2">修改</button>
                        <button type="button" class="btn btn-secondary col-2 ml-2">刪除</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
-->
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-danger" >清除資料</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>
              <button type="button" class="btn btn-info">確認修改</button>
            </div>
          </div>
        </div>
      </div>
<!--      ---------------------modal_end--------------------------  -->
      <!-----------------------modal_修改/刪除/詳情彈窗----------------------------->
      <div class="modal fade process-modal" id="news_modal" tabindex="-1" role="dialog" aria-labelledby="admin_delLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content procontent">

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
//準備上傳圖檔的預覽程式===============================================================
  function preview(input) {
    
    if (input.files && input.files[0]) {
      //建立 reader 變數為一個檔案讀取器物件
      var reader = new FileReader();
      //因為讀取器的建立與整頁的讀取非同步進行, 所以得等待onload之後再.....
      reader.onload = function(e) {
        //準備顯示預覽圖的區域(也就是指定位置的img標籤)
        var resultArea = '#imgArea img';
        $(resultArea).attr('src', e.target.result);
      }
      //讀取器讀取檔案內容送到img的src
      reader.readAsDataURL(input.files[0]);
    }
  }

  //"上傳圖片" 按鈕選擇了圖檔後==========
  $('#news_pic').on('change', function() {
    //可以先測試選擇圖檔的input欄位接收到的val值
    //var fileName = $(this).val(); console.log(fileName);
    //將接收到圖檔的input交給preview這個function
    preview(this);
    
  });

</script>



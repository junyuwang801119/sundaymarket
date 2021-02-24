<?php
require_once('../../public/shared/conn_PDO.php');

//news_class ---------------------------------
try {
  $sql_str = "SELECT *
              FROM news_class
              ORDER BY news_class_id ASC";
  $RS_news_class = $conn -> query($sql_str);
} 
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

//news單筆---------------------
try{
  $sql_str = "SELECT news.*, news_class.news_class_name 
              FROM news
              LEFT JOIN news_class
              ON news.news_class_id = news_class.news_class_id
              WHERE news.news_id = :news_id";

  $stmt = $conn -> prepare($sql_str);
  $news_id = $_GET['news_id'];
  $stmt -> bindParam(':news_id', $news_id);

  $RS_news = $stmt -> execute();
  $row_RS_news = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}
?>

<div class="modal-header">
  <h5 class="modal-title" id="admin_news_modifyTitle">修改新訊資料</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form style="width:100%;" method="post" enctype="multipart/form-data" action="view/admin_news_process.php">
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 ">

          <div class="row m-4">
            <label class="col-2 pt-2">分類:</label>
            <select name="news_class_id" class="form-control" style="width:50%;">

              <option value="" disabled selected>---請選擇分類---</option>
              <?php foreach( $RS_news_class as $key=>$row_class ){ ?>
              <option value="<?php echo $row_class['news_class_id']; ?>"
                      <?php if( $row_class['news_class_id'] == $row_RS_news['news_class_id'] ){ echo ' selected'; } ?>>
                <?php echo $row_class['news_class_name']; ?>
              </option>
              <?php } ?>

            </select>

            <!--            <button type="button" class="btn btn-secondary">修改分類</button>-->
          </div>

          <div class="form-group row m-4">
            <label for="formGroupExampleInput" class="col-2">標題:</label>
            <input name="news_title" type="text" class="form-control col-10" id="formGroupExampleInput" placeholder="請輸入主題文字" value="<?php echo $row_RS_news['news_title']; ?>">
          </div>
          <div class="form-group row  m-4">
            <label for="exampleFormControlTextarea1" class="col-2">內文:</label>
            <textarea name="news_content" class="form-control col-8" id="exampleFormControlTextarea1" placeholder="請輸入內文" rows="3"><?php echo $row_RS_news['news_content']; ?></textarea>
          </div>
          <div class="form-group row mt-5 justify-content-end">
            <label>
              <input type="checkbox" name="news_show" class="show-check" value="1" 
                     <?php if( $row_RS_news['news_show']==1 ){ echo ' checked'; } ?> 
                     > 顯示</label>

            <div class="input-group mb-5 justify-content-center offset-md-3">
              <label class="custom-file-label col-7" for="news_pic">
                <input type="file" name="news_pic" id="news_pic" style="display:none;">
                <i class="fa fa-photo"></i> 上傳圖片 </label>

              <!--
<input type="file" class="custom-file-input" name="news_pic" id="news_pic" aria-describedby="inputImg_news">
<label class="custom-file-label" for="inputImg_news">選擇一張圖片</label>
</div>
<div class="input-group-append col-3">
<button class="btn btn-secondary" type="button" id="inputImg_news">上傳</button>
</div>
-->
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="modal-footer justify-content-center">
      <button type="button" class="btn btn-danger" >清除資料</button>
      <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>
      <!--  <button type="button" class="btn btn-info">確認修改</button>-->
      <input type='submit' class="btn btn-info" value="確認修改">
      <input type="hidden" name="news_id" value="<?php echo $row_RS_news['news_id']; ?>">
      <input type="hidden" name="MM_process" value="update">
    </div>
  </div>
</form>



<!--
<script>
//準備上傳圖檔的預覽程式===============================================================
function preview_modi(input) {

if (input.files && input.files[0]) {
var reader = new FileReader();
//      reader.onload = function(e) {
//        var resultArea = '#imgArea_modi img';
//        $(resultArea).attr('src', e.target.result);
//      }
//讀取器讀取檔案內容送到img的src
reader.readAsDataURL(input.files[0]);
}
}

//當按下 "上傳圖片" 按鈕選擇了圖檔之後==========
$('#inputGroupFile04').on('change', function() {
//可以先測試選擇圖檔的input欄位接收到的val值
//var fileName = $(this).val(); console.log(fileName);
//將接收到圖檔的input交給preview這個function
preview_modi(this);

});
</script>
-->

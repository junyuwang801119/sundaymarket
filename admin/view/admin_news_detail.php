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
  <h5 class="modal-title" id="admin_news_modifyTitle">訊息資料</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 ">
        <div class="form-group row ml-2">
          <label for="staticEmail" class="col-sm-2 col-form-label">分類:</label>
          <div class="col-10 mt-2">
            <?php echo $row_RS_news['news_class_name']; ?>
          </div>
        </div>
        <div class="form-group row ml-2">
          <label for="staticEmail" class="col-sm-2 col-form-label">標題:</label>
          <div class="col-10 mt-2">
            <?php echo $row_RS_news['news_title']; ?>
          </div>
        </div>
        <div class="form-group row ml-2">
          <label for="staticEmail" class="col-sm-2 col-form-label">圖片:</label>
          <div class="col-10 mt-2">
            <img style="width:100%" src="../public/img_news/<?php echo $row_RS_news['news_pic'] ;?>" >
          </div>
        </div>
        <div class="form-group row ml-2">
          <label for="staticEmail" class="col-sm-2 col-form-label">內文:</label>
          <div class="col-10 mt-2">
            <?php echo nl2br($row_RS_news['news_content']); ?>
          </div>
        </div>
        <div class="form-group row ml-2">
          <div class="col-10 mt-2">
            <?php if( $row_RS_news['news_show']==1 ){ echo ' 顯示'; } ?>
          </div>
        </div>

        <div class=" row m-4">

        </div>
        <div class="row m-4">
          <div> <?php if( $row_RS_news['news_show']==1 ){ echo ' 顯示'; } ?>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-center">

    <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>

  </div>

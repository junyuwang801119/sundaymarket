<?php
include_once('../shared/assist_admin_chklogin.php');
require_once('../shared/conn_PDO.php');

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


<div class="w3-row w3-text-grey form-news-result">

  <div class="w3-third w3-center">
    <!-- 影像圖片 -->
    &nbsp;
    <?php
    if( $row_RS_news['news_img_s']!='' ){
      echo '<img src="../img_news/'.$row_RS_news['news_img_s'].'" class="news_img" alt="">';
    }else{
      echo '<img src="../img_layout/pre_img_news.png" class="news_img" alt="">';
    }
    ?>
  </div>

  <div class="w3-twothird">

    <div class="w3-row">
      <div class="w3-col"><i class="w3-xxlarge fa fa-folder-open"></i></div>
      <div class="w3-rest select_news_class">
        <!-- 新訊分類 -->
        [<?php echo $row_RS_news['news_class_id']; ?>]
        <?php echo $row_RS_news['news_class_name']; ?>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col"><i class="w3-xxlarge fa fa-flag"></i></div>
      <div class="w3-rest">
        <!-- 新訊標題 -->
        <?php echo $row_RS_news['news_title']; ?>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col"><i class="w3-xxlarge fa fa-commenting"></i></div>
      <div class="w3-rest">
        <!-- 新訊內容 -->
        <?php echo nl2br($row_RS_news['news_content']); ?>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col"><i class="w3-xxlarge fa fa-map-marker"></i></div>
      <div class="w3-rest">
        <!-- 是否為焦點新訊, 是否顯示 -->
        <?php $row_RS_news['news_focus']==1?$focus='是':$focus='不是'; ?>
        <?php echo $focus; ?>焦點新聞

        <div class="w3-right">
          <?php $row_RS_news['news_show']==1?$show='是':$show='不'; ?>
          <?php echo $show; ?>顯示
        </div>
      </div>
    </div>

  </div>
</div>
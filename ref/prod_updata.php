<?php
//include_once('../shared/assist_admin_chklogin.php');
require_once('../public/shared/conn_PDO.php');

//$uri = $_SERVER['REQUEST_URI'];
//$uri2 = $_SERVER['QUERY_STRING'];

//news_class==新增表單才需要===================================================
try {
  $sql_str = "SELECT *
              FROM prod_class
              ORDER BY prod_class_id ASC";
  $RS_prod_class = $conn -> query($sql_str);
} 
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="UTF-8">
  <title>updata</title>
  <link rel="stylesheet" href="../public/css/w3.css">
  
  <style>
.right-btn { display: block; padding: 8px 16px; margin-bottom: 5px; 
  background-color: #bbb; color: #fff; border-radius: 5px; text-align: center; }
.right-btn:hover { background-color: #333; color: #fff; }
</style>

</head>
<body>
  
<form method="post" enctype="multipart/form-data" action="text_process.php" class="w3-text-grey w3-row form-news">

  <div class="w3-third w3-center">
    <!-- 以label標籤包含input標籤, 讓input標籤隱藏, 設計label標籤呈現視覺看到的樣子 -->
    <!-- 當按到label標籤時, 即代表了按到了input標籤(選擇檔案準備上傳檔案) -->

    <label class="w3-button w3-grey w3-round w3-padding cursor-p">
      <input type="file" name="prod_pic" id="prod_pic" style="display:none;">
      <i class="fa fa-photo"></i> 上傳圖片 </label>
    <!--#imgArea 這個區域負責顯示所選擇的圖檔, 也就是影像的預覽區域 -->
    <div id="imgArea" title="" style="padding:20px;">
      <img class="imgArea" style="max-width:100%;height:auto;">
    </div>

    

  </div>

  <div class="w3-twothird">

    <div class="w3-row">
      <div class="w3-col"><i class="w3-xxlarge fa fa-folder-open"></i></div>
      <div class="w3-rest select_news_class">
        <!-- 這裡是下拉式選單選擇新訊分類 -->
        <select name="prod_class_id" class="w3-select w3-border" required>
          <option value="" disabled selected>選擇新訊的分類...</option>

          <?php foreach( $RS_prod_class as $key=>$row_prod_class ){ ?>
          <option value="<?php echo $row_prod_class['prod_class_id']; ?>">
            <?php echo $row_prod_class['prod_class_name']; ?>
          </option>
          <?php } ?>

        </select>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col"><i class="w3-xxlarge fa fa-flag"></i></div>
      <div class="w3-rest">
        <!-- 這裡是新訊標題欄位 -->
        <input type="text" name="prod_name" maxlength="30" class="w3-input w3-border" 
               placeholder="輸入商品名" required>
      </div>
    </div>
    
    <div class="w3-row">
      <div class="w3-col"><i class="w3-xxlarge fa fa-flag"></i></div>
      <div class="w3-rest">
        <!-- 這裡是新訊標題欄位 -->
        <input type="text" name="prod_price" maxlength="30" class="w3-input w3-border" 
               placeholder="輸入價格" required>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col"><i class="w3-xxlarge fa fa-commenting"></i></div>
      <div class="w3-rest">
        <!-- 這裡是新訊內容欄位 -->
        <textarea name="prod_content" class="w3-input w3-border" rows="5" 
                  placeholder="輸入內容" required="" required></textarea>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col"><i class="w3-xxlarge fa fa-map-marker"></i></div>
      <div class="w3-rest">
        <div class="w3-right">
          <label class="cursor-p">
            <input type="checkbox" name="prod_display" class="w3-check" value="1" checked> 顯示</label>
        </div>
      </div>
    </div>

  </div>

  <div class="form-btn-area">
    <a href="" class="form-btn">不新增新訊回上一頁</a>
    <input type="submit" class="form-btn" value="確定新增新訊">
  </div>

  <input type="hidden" name="MM_process" value="insert">
</form>
  
</body>
</html>
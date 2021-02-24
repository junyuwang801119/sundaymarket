<?php
require_once('../public/shared/conn_PDO.php');

$news_id = $_GET['news_id'];
try{
  $sql_str = "SELECT * FROM news 
              WHERE news_id = :news_id";
  
  $stmt = $conn -> prepare($sql_str);
  $stmt -> bindParam( ':news_id' , $news_id );
  $RS_news = $stmt -> execute();
  $row_RS_new = $stmt->fetch(PDO::FETCH_ASSOC);
 

}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>




  <div id="showPhoto_img" style="background-image: url(public/img_news/<?php echo $row_RS_new['news_pic'] ;?>)"></div>

  <div id="showPhoto_text" >
  <div>2021.02.24</div>
  <div class="h3"><?php echo $row_RS_new['news_title'] ;?></div>
 
  <?php echo $row_RS_new['news_content'] ;?>
  </div>




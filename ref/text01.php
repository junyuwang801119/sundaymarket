<?php
require_once('../public/shared/conn_PDO.php');

$news_id = 3;
$result = array();
try{
  $sql_str = "SELECT * FROM news
              WHERE news_id = :news_id";
  
  $RS_news_all = $conn -> prepare($sql_str);
  $RS_news_all -> bindParam(':news_id' , $news_id );
  $RS_news_all -> execute();
  $num = $RS_news_all -> rowCount();  
  $row_RS_new = $RS_news_all->fetch(PDO::FETCH_ASSOC);
  
  
  array_push($result,$row_RS_new['news_pic'],$row_RS_new['news_title'],$row_RS_new['news_content']);
  print_r($result) ;
//  $result = array_push();
  
  
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>
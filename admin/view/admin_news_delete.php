<?php
require_once('../../public/shared/conn_PDO.php');


$news_id = $_GET['news_id'];

try{
  $sql_str = "SELECT * FROM news 
              WHERE news_id = :news_id";
  $stmt = $conn -> prepare($sql_str);
  $stmt -> bindParam(':news_id', $news_id);

  $RS_news = $stmt -> execute();
//  $row = $stmt ->rowCount();
  $row_RS_news_1 = $stmt->fetch(PDO::FETCH_ASSOC);
  
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}
?>


<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">訊息資料刪除</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  是否真的要刪除此訊息：&nbsp;[<?php echo $row_RS_news_1['news_id'];?>]&nbsp;<?php echo $row_RS_news_1['news_title'];?>&nbsp;？
  
<form method="post" action="view/admin_news_process.php">
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">取消關閉</button>
  
  <input type="hidden" name="news_id" value="<?php echo $row_RS_news_1['news_id']; ?>">
  <input type="hidden" name="MM_process" value="delete">
  <input type="submit" class="btn btn-primary" value="刪除資訊">
</div>
</form>

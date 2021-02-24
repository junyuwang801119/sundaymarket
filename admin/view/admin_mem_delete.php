<?php
require_once('../../public/shared/conn_PDO.php');

//$uri = $_SERVER['REQUEST_URI'];
$user_id = $_GET['user_id'];
//$user_id = 2;
try{
  $sql_str = "SELECT * FROM mem 
              WHERE user_id = :user_id";
  $stmt = $conn -> prepare($sql_str);
  $stmt -> bindParam(':user_id', $user_id);

  $RS_mems = $stmt -> execute();
//  $row = $stmt ->rowCount();
  $row_RS_mem_1 = $stmt->fetch(PDO::FETCH_ASSOC);
  
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}
?>


<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">會員資料刪除</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  是否真的要刪除&nbsp;[<?php echo $row_RS_mem_1['user_id'];?>]&nbsp;<?php echo $row_RS_mem_1['user_name'];?>&nbsp; 會員？
  
<form method="post" action="view/admin_mem_process.php">
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">取消關閉</button>
  
  <input type="hidden" name="user_id" value="<?php echo $row_RS_mem_1['user_id']; ?>">
  <input type="hidden" name="MM_process" value="delete">
  <input type="submit" class="btn btn-primary" value="刪除資訊">
</div>
</form>

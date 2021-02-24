<?php
require_once('../../public/shared/conn_PDO.php');


$order_id = $_GET['order_id'];
//$order_id = 2;

try{
  $sql_str = "SELECT ordertab.* FROM ordertab
              WHERE order_id = :order_id";
  $stmt = $conn -> prepare($sql_str);
  $stmt -> bindParam(':order_id', $order_id);

  $RS_ordertab = $stmt -> execute();
//  $row = $stmt ->rowCount();
  $row_RS_ordertab_1 = $stmt->fetch(PDO::FETCH_ASSOC);
  
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>


<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">訂單資料刪除</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  是否真的要刪除此訂單號：&nbsp;[<?php echo $row_RS_ordertab_1['order_id'];?>]？
  
<form method="post" action="view/admin_order_process.php">
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">取消關閉</button>
  
  <input type="hidden" name="order_id" value="<?php echo $row_RS_ordertab_1['order_id']; ?>">
  <input type="hidden" name="MM_process" value="delete">
  <input type="submit" class="btn btn-primary" value="刪除訂單">
</div>
</form>

<?php
require_once('../../public/shared/conn_PDO.php');


$prod_id = $_GET['prod_id'];

try{
  $sql_str = "SELECT * FROM prod 
              WHERE prod_id = :prod_id";
  $stmt = $conn -> prepare($sql_str);
  $stmt -> bindParam(':prod_id', $prod_id);

  $RS_prods = $stmt -> execute();
//  $row = $stmt ->rowCount();
  $row_RS_prod_1 = $stmt->fetch(PDO::FETCH_ASSOC);
  
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}
?>


<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">商品資料刪除</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  是否真的要刪除此商品：&nbsp;[<?php echo $row_RS_prod_1['prod_id'];?>]&nbsp;<?php echo $row_RS_prod_1['prod_name'];?>&nbsp;？
  
<form method="post" action="view/admin_prod_process.php">
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">取消關閉</button>
  
  <input type="hidden" name="prod_id" value="<?php echo $row_RS_prod_1['prod_id']; ?>">
  <input type="hidden" name="MM_process" value="delete">
  <input type="submit" class="btn btn-primary" value="刪除資訊">
</div>
</form>

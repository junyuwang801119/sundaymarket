<?php
require_once('../../public/shared/conn_PDO.php');

$prod_id=-1;
if(isset($_GET['prod_id']) && $_GET['prod_id']!='' ){ 
  $prod_id=$_GET['prod_id']; 
}

//商品分類 ---------------------------------
try {
  $sql_str = "SELECT * FROM prod_class
             ORDER BY prod_class_level ASC";

  $RS_prod_class = $conn -> query($sql_str);
} 
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

//商品修改顯示---------------------
try{
  $sql_str = "SELECT prod.*, prod_class.prod_class_name 
              FROM prod
              LEFT JOIN prod_class
              ON prod.prod_class_id = prod_class.prod_class_id
              WHERE prod.prod_id = :prod_id";

  $stmt = $conn -> prepare($sql_str);
  $stmt -> bindParam(':prod_id', $prod_id);

  $RS_news = $stmt -> execute();
  $row_RS_prod = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}
?>

<form style="width:100%;" method="post" enctype="multipart/form-data" action="view/admin_prod_process.php">
<div class="modal-header">
  <h5 class="modal-title" id="admin_commodity_modifyTitle">商品詳細資料</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 ">
        
          <div class="row m-4">
            <div class="col-2 pt-2">商品分類:</div>
            <div><?php echo $row_RS_prod['prod_class_name'];?></div>
            
            
          </div>

          <div class="form-group row m-4">
            <div class="col-2 pt-2">[<?php echo $row_RS_prod['prod_id'];?>]商品名稱:</div>
            <div class="form-control col-4"><?php echo $row_RS_prod['prod_name']; ?></div>
             <div class="col-2 pt-2">商品上架:</div>
            <div><?php if( $row_RS_prod['prod_display']==1 ){ echo '以上架'; } ?></div>
            
          </div>
          <div style="" class="form-row m-4">
            <div class="form-group col-5">
              <div >商品價格</div>
              <div class="form-control"><?php echo $row_RS_prod['prod_price']; ?></div>
              </div>
            <div class="form-group col-3">
              <div >商品數量</div>
              <div class="form-control" ><?php echo $row_RS_prod['prod_tnum']; ?></div>
              </div>
<!--
            <div class="form-group col-4 ">
              <div class="form-row pt-4 mt-3 pl-3">
                <div class="custom-control custom-switch mr-3">
                  <input type="checkbox" class="custom-control-input" id="commodity_Supermarket_modify">
                  <label class="custom-control-label" for="commodity_Supermarket_modify">超取</label>
                </div>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="commodity_home_delivery_modify">
                  <label class="custom-control-label" for="commodity_home_delivery_modify">宅配</label>
                </div>
              </div>
            </div>
-->
          </div>
          
             
          <div class=" row m-4">
            <div class="custom-file col-9">
              <img src="../public/upload_img/<?php echo $row_RS_prod['prod_pic']; ?>" style="width:70px;">
            </div>
            
          </div>
          
          <div class="form-group row m-4">
            <div  class="col-2">商品敘述:</div>
            <div class="form-control col-9"><?php echo nl2br($row_RS_prod['prod_content']);?></div>
           
          </div>
        
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>

</div>

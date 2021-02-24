<?php 
require_once('../../public/shared/conn_PDO.php');

try {
  $sql_str = "SELECT * FROM prod_class ORDER BY prod_class_id ASC";
  $prod_class_show = $conn -> query($sql_str);
  
//  $row = $news_class_show->rowCount();
//  echo $row;
  
} 
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}


?>


<div class="container-fluid">
  <div class="row">
    <div class="col-12 ">
      <form>
        <div class="row m-4">
          <input style="width:60%" name="prod_class_name" type="text" class="form-control col-9" id="formGroupExampleInput" placeholder="請輸入分類">
          <button type="button" class="btn btn-secondary col-3">新增分類</button>
        </div>
        <?php foreach( $prod_class_show as $row_prod_class ){ ;?>
        <div class="row m-4">
          <input name="prod_class_name" type="text" class="form-control col-7" 
                 value="<?php echo $row_prod_class['prod_class_name'];?>" data-id=" <?php echo $row_prod_class['prod_class_id'];?> ">
          <button data-type="update" type="button" class="btn btn-secondary col-2 ml-2">修改</button>
          <button data-type="delete" type="button" class="btn btn-secondary col-2 ml-2">刪除</button>
        </div>
        <?php   };?>
      </form>

    </div>
  </div>
</div>
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
    <h5 class="modal-title" id="admin_commodity_modifyTitle">修改商品資料</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 ">

          <div class="row m-4">
            <label class="col-2 pt-2">商品分類:</label>
            <select id="in_prod_class_id" name="prod_class_id" class="form-control prod_class_id" style="width:50%;">
              <option value="" disabled selected>---請選擇分類---</option>
              <?php foreach( $RS_prod_class as $prod_row ){ ?>
              <option value="<?php echo $prod_row['prod_class_id'] ;?>">
                <?php echo $prod_row['prod_class_name'] ;?>
              </option>
              <?php } ?>
            </select>
            <!--            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#admin_sort_modify">修改分類</button>-->
          </div>

          <div class="form-group row m-4">
            <label for="in_prod_name" class="col-2 pt-2">[<?php echo $row_RS_prod['prod_id'];?>]商品名稱:</label>
            <input name="prod_name" type="text" class="form-control col-4" id="in_prod_name" placeholder="請輸入商品名稱" value="<?php echo $row_RS_prod['prod_name']; ?>">
            <label for="in_display" class="col-2 pt-2">商品上架:</label>
            <input id="in_display" type="checkbox" name="prod_display" class="show-check" value="1" <?php if( $row_RS_prod['prod_display']==1 ){ echo ' checked'; } ?> > 
            <label for="hotprod" class="col-2 pt-2">熱賣商品:</label>
            <input name="is_hot" id="hotprod" type="checkbox" class="show-check" value="1" <?php if( $row_RS_prod['is_hot']==1 ){ echo ' checked'; } ?> > 

          </div>
          <div style="" class="form-row m-4">
            <div class="form-group col-5">
              <label for="in_price">商品價格</label>
              <input name="prod_price" type="text" class="form-control" id="in_price" placeholder="請輸入商品價格" value="<?php echo $row_RS_prod['prod_price']; ?>">
            </div>
            <div class="form-group col-3">
              <label for="in_tnum">商品數量</label>
              <input name="prod_tnum" type="text" class="form-control" id="in_tnum" placeholder="請輸入商品數量" value="<?php echo $row_RS_prod['prod_tnum']; ?>">
            </div>
            <div class="form-group col-4 ">
              <!--
<div class="form-row pt-4 mt-3 pl-3">
<div class="custom-control custom-switch mr-3">
<input type="checkbox" class="custom-control-input" id="commodity_Supermarket_new" name="prod_display">
<label class="custom-control-label" for="commodity_Supermarket_new">上架</label>
</div>
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input" id="commodity_home_delivery_modify">
<label class="custom-control-label" for="commodity_home_delivery_modify">宅配</label>
</div>
</div>
-->
            </div>
          </div>


          <!--
<div class="input-group row m-4">
<div class="custom-file col-9">
<input type="file" class="custom-file-input" name="prod_pic" id="inputImg_commodity_modify" aria-describedby="inputImg_commodity_modify">
<label class="custom-file-label" for="inputImg_commodity_modify">選擇一張圖片</label>
</div>
<div class="input-group-append col-3">
<button class="btn btn-secondary" type="button" id="inputImg_commodity_modify">上傳</button>
</div>
</div>

-->
          <div class="form-group row m-4">
            <label for="exampleFormControlTextarea1" class="col-2">商品敘述:</label>
            <textarea name="prod_content" class="form-control col-9" id="in_content" placeholder="請輸入內文" rows="3"><?php echo $row_RS_prod['prod_content'];?></textarea>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <input id="prod_id" type="hidden" name="prod_id" value="<?php echo $row_RS_prod['prod_id'];?>">
    <input id="MM_process" type="hidden" name="MM_process" value="update">
    <!--  <button type="button" class="btn btn-danger" >清除資料</button>-->
    <input type="reset" value="清除資料" class="btn btn-danger">
    <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>
      <button type="button" class="btn btn-info up_btn" onclick="getTestData()">確認修改</button>
<!--    <input type="submit" class="btn btn-info up_btn" value="確定更新" onclick="getTestData()">-->
  </div>
</form>



<!--
<script>
//準備上傳圖檔的預覽程式===============================================================
function preview_modi(input) {

if (input.files && input.files[0]) {
var reader = new FileReader();
//      reader.onload = function(e) {
//        var resultArea = '#imgArea_modi img';
//        $(resultArea).attr('src', e.target.result);
//      }
//讀取器讀取檔案內容送到img的src
reader.readAsDataURL(input.files[0]);
}
}

//當按下 "上傳圖片" 按鈕選擇了圖檔之後==========
$('#inputImg_commodity_modify').on('change', function() {
//可以先測試選擇圖檔的input欄位接收到的val值
//var fileName = $(this).val(); console.log(fileName);
//將接收到圖檔的input交給preview這個function
preview_modi(this);

});
</script>
-->



<script>

 var testData = {}
  function getTestData() {
    var testDataArr = {}
    testDataArr['prod_id']        = $('#prod_id').val();
    testDataArr['MM_process']     = $('#MM_process').val();
    
    testDataArr['prod_class_id']  = $('#in_prod_class_id').val();
    testDataArr['prod_name']      = $('#in_prod_name').val();     
    testDataArr['prod_display']   = $('#in_display').val();     
    testDataArr['is_hot']         = $('#hotprod').val();              
    testDataArr['prod_price']     = $('#in_price').val();        
    testDataArr['prod_tnum']      = $('#in_tnum').val();        
    testDataArr['prod_content']   = $('#in_content').val();        
    
    console.log( testDataArr['prod_class_id']);

    testData = testDataArr
    console.log(testData);
    // return testData
  }
  
  function renderData(res) {
    $('#prod_num').val(res['prod_num']);
    $('#prod_num').val(res['prod_price']);
    $('#prod_num').val(res['prod_id']);
    
    $('#in_prod_class_id').val(res['prod_class_id']);
    $('#in_prod_name').val(res['prod_name']);
    $('#in_display').val(res['prod_display']);  
    $('#hotprod').val(res['is_hot']);     
    $('#in_price').val(res['prod_price']);    
    $('#in_tnum').val(res['prod_tnum']);     
    $('#in_content').val(res['prod_content']);  
        

//*** /
    }
  
  $('.up_btn').click(function() {
    $.ajax({
      url: 'org/test_select.php',
      data: testData,
      type: 'post'
    }).done(function(res) {
      console.log(res);
      renderData(res)
      //...DO
    })
  })
  //準




</script>
<?php
require_once('../../public/shared/conn_PDO.php');

$order_id=-1;
if(isset($_GET['order_id']) && $_GET['order_id']!='' ){ 
  $order_id=$_GET['order_id']; 
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

<!----------------- 彈窗顯示內容區 ----------------->
<div class="modal-header">
  <h5 class="modal-title" id="admin_order_modifyTitle">修改訂單資料</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 ">
        <form style="width:100%;">
          <div class="row m-4">
            <label class="col-2 pt-2">處理狀態:</label>
            <select class="form-control" style="width:auto;" >
              <option>已付款</option>
              <option>已出貨</option>
              <option>待出貨</option>
              <option>待付款</option>
              <option>已收到</option>
              <option class="text-danger">有問題</option>
            </select>
            <button type="button" class="btn btn-secondary offset-3" >訂單商品資訊</button>
          </div>
          <div class="input-group row m-4">
            <div class="custom-file col-9">
              <input type="file" class="custom-file-input" id="inputImg_commodity_modify" aria-describedby="inputImg_commodity_modify">
              <label class="custom-file-label" for="inputImg_commodity_modify">選擇一張圖片</label>
            </div>
            <div class="input-group-append col-3">
              <button class="btn btn-secondary" type="button" id="inputImg_commodity_modify">上傳</button>
            </div>
          </div>

          <div class="form-group row m-4">
            <label for="formGroupExampleInput" class="col-2 pt-2">訂單編號:</label>
            <input type="text" class="form-control col-10 form-control-plaintext" id="formGroupExampleInput" placeholder="t1234567">
            <label for="formGroupExampleInput" class="col-2 pt-2">會員帳號:</label>
            <input type="text" class="form-control col-5 form-control-plaintext" id="formGroupExampleInput" placeholder="mark111@gmail.com">
            <button class="btn btn-secondary col-2 offset-1" type="button" id="inputImg_commodity_modify">修改會員</button>
          </div>
          <div class="form-group row m-4 ">
            <label for="exampleFormControlSelect2" class="ml-2">訂單內容:</label>
            <select multiple class="form-control col-6 ml-2" id="exampleFormControlSelect2">
              <option>超級VIP土豪金懸浮螢幕iphone 19 1TB</option>
              <option>超級VIP土豪金懸浮螢幕iphone 19 1TB</option>
              <option>超級VIP土豪金懸浮螢幕iphone 19 1TB</option>
              <option>超級VIP土豪金懸浮螢幕iphone 19 1TB</option>
            </select>
            <div class="">
              <button class="btn btn-secondary" type="button" id="inputImg_commodity_modify">複選刪除</button>
              <button class="btn btn-secondary" type="button" id="inputImg_commodity_modify">修改</button>
            </div>
          </div>


          <div style="" class="form-row m-4">
            <div class="form-group col-2">
              <label for="formGroupExampleInput">訂單金額</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="請輸入主題文字">
            </div>
            <div class="form-group col-2">
              <label for="formGroupExampleInput">數量</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="請輸入主題文字">
            </div>
            <div class="form-group col-4 ">
              <div class="form-row pt-4 mt-3 pl-3">
                <div class="custom-control custom-switch mr-3">
                  <input type="checkbox" class="custom-control-input" id="admin_commodity_modify1">
                  <label class="custom-control-label" for="admin_commodity_modify1">超取</label>
                </div>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="admin_commodity_modify2">
                  <label class="custom-control-label" for="admin_commodity_modify2">宅配</label>
                </div>
              </div>
            </div>
          </div>
          <div style="" class="form-row m-4">
            <div class="form-group col-4">
              <label for="formGroupExampleInput">收件人</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="請輸入主題文字">
            </div>
            <div class="form-group col-8">
              <label for="formGroupExampleInput">送貨地址</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="請輸入主題文字">
            </div>
          </div>                      
          <div class="form-row m-4">
            <label class="col-2" for="admin_order_modify_supermarket">超取門市</label>
            <input type="text" class="form-control col-8" id="admin_order_modify_supermarket" placeholder="請輸入主題文字">
            <button type="button" class="btn btn-secondary col-2" >更改門市</button>
          </div>
          <div class="form-row m-4">
            <label class="col-2" for="formGroupExampleInput">付款方式</label>
            <input type="text" class="form-control col-8" id="formGroupExampleInput" placeholder="貨到付款">
            <button type="button" class="btn btn-secondary col-2" >更改付款</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-danger" >清除資料</button>
  <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>
  <button type="button" class="btn btn-info">確認修改</button>
</div>








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

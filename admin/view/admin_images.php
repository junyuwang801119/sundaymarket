<?php
include_once('../shared/assist_admin_chklogin.php');

//如果要刪除圖檔================================================
if( isset($_GET['del']) && $_GET['del']!='' ){
  unlink('../img_prod/'.$_GET['del']);
  header('Location:?page=admin_images');
}

//如果有收到檔案================================================
if( isset($_FILES['imgFile']) ){
  $files = $_FILES['imgFile'];
  //print_r($files);

  $new_array = array();  //建立新陣列, 將收到檔案的陣列轉換後存放在新陣列

  //依收到檔案的陣列依第一層繞迴圈, 因為是5個資訊所以會繞5圈
  foreach( $files as $file ){
    $i = 0;  //新陣列的索引編號
    //print_r($file);
    //echo '<hr>';

    //依收到的檔案數繞迴圈, 也就是有3個檔案就繞3圈
    foreach( $file as $key => $val ){
      $new_array[$i]['name']     = $files['name'][$key];
      $new_array[$i]['type']     = $files['type'][$key];
      $new_array[$i]['tmp_name'] = $files['tmp_name'][$key];
      $new_array[$i]['error']    = $files['error'][$key];
      $new_array[$i]['size']     = $files['size'][$key];
      $i++;
    } //foreach 第2層 end
  } //foreach 第1層 end
  //print_r( $new_array );

  $img_msg = '';
  foreach($new_array as $key => $file){
    //接收到檔案的資訊==================================================
    $file_name = $file['name'];                //上傳檔案的原來檔案名稱
    $file_type = $file['type'];                //上傳檔案的類型(副檔名)

    //指定&限制的條件====================================================
    $max_size = 200*1024;                             //(1)檔案大小
    $allow_ext = array('jpeg','jpg','png','gif');     //(2)檔案類型

    $path = '../img_prod/';                           //(3)存放位置
    if( !file_exists($path) ){ mkdir($path); }
    $file_name = $file['name'];                       //(4)檔案名稱

    //載入fn負責檢查======================================================
    include_once('../shared/fn_upload_chk.php');
    $result = fn_upload_chk($file, $max_size, $allow_ext, $path, $file_name);

    if( $result==1 ){
      $img_msg .= '第'.($key+1).'個檔案上傳成功<br>';
    }else{
      $img_msg .= '第'.($key+1).'個檔案'.$result;
    }
    $img_msg .= '<hr>';

  }//foreach end
}//if end
?>
<h1 data-no="1">圖像管理中心</h1>


<form name="imgUpload" id="imgUpload" enctype="multipart/form-data" method="post" action="">

  <label class="w3-button w3-gray w3-round" style="cursor:pointer;padding:8px 30px;margin-right:10px;">
    <input type="file" name="imgFile[]" multiple="multiple" id="imgFile" style="display:none;">
    <i class="fa fa-photo"></i> 上傳圖片 </label>

  <input type="submit" class="w3-button w3-gray w3-round" id="btnSubmit" value="確定上傳">
  <p style="color:red; font-size:13px;"> (上傳的檔案名稱請符合英數字及減號或底線，檔案類型必須是jpg、png、gif，檔案容量必須小於200K) </p>

  <!--#imgArea 這個區域負責顯示所選擇的圖檔, 也就是影像的預覽區域 -->
  <div id="imgArea"></div>

  <?php 
  if( $img_msg!=''){
    echo '<h2 id="img_msg">'.$img_msg.'</h2>';
  } 
  ?>
</form>

<div class="imgContainer">

  <?php
  //取出上傳影像的資料夾中的所有檔案,記錄到$files陣列變數
  $pathfile = '../img_prod/*.*';
  $files = glob($pathfile);
  //print_r($files);

  //顯示影像內容 ($file是含路徑的檔案名稱,代表了一個檔案)
  foreach ($files as $file) {
    //echo '<tr>';
    //$file => 含路徑及檔名
    $file_name = basename($file);  //不含路徑的檔名
    $ext = '.' . pathinfo($file_name, PATHINFO_EXTENSION);
    $file_basename = basename($file_name, $ext);  //不含副檔名,只有主檔名的部份

    //getimagesize($file)是取得$file檔案的圖檔資訊, 如果不是圖檔, 則會回傳false
    if (getimagesize($file)) {
      //當getimagesize($file)能取得到圖檔資訊時, 相當於回傳true, 則顯示img影像
      echo '<div class="fileItem">';

      echo '<h2>' . $file_basename . '</h2>';  //不含路徑不含副檔名,只有主檔名
      echo '<a href="javascript:;" class="delImgBtn w3-button" onclick="delimg(\''.$file_name.'\')">刪除影像</a>';

      echo '<img src="../img_prod/'.$file_name.'">';

      echo '</div>';

    } else {
      echo '<div>【不是圖檔】</div>';
    }

  }
  ?>

</div>





<script>
  //準備上傳圖檔的預覽程式===============================================================
  function preview(input) {
    //上一行的input是一個變數, 負責接收傳入的input物件
    //假如 input 接收到檔案是存在的, 並且接收到檔案不是空值
    console.log(input.files);

    if (input.files && input.files[0]) {
      $('#imgArea').html('');
      $('#img_msg').html('');
      $(input.files).each(

        function(i,obj){
          //建立 reader 變數為一個檔案讀取器物件
          var reader = new FileReader();
          //因為讀取器的建立與整頁的讀取非同步進行, 所以得等待onload之後再.....
          reader.onload = function (e) {
            //將 e.target.result 也就是讀取器接收到的檔案名稱資訊, 
            //設定在img標籤的src屬性上, 那麼就會在指定位置顯示圖檔影像
            //console.log(e.target.result);

            //e.target.result 路徑/檔名 
            $('#imgArea').append('<img src="'+e.target.result+'">');
          }
          //讀取器讀取檔案內容送到輸出區域
          reader.readAsDataURL(input.files[i]);
        }//function end

      );//each end
    }//if end
  }//function end


  //當按下 "上傳圖片" 按鈕選擇了圖檔之後==========
  $('#imgFile').on('change', function() {
    //可以先測試選擇圖檔的input欄位接收到的val值
    //var fileName = $(this).val(); console.log(fileName);
    //將接收到圖檔的input交給preview這個function
    preview(this);
    //$(this).parents('.w3-third').find('h2').remove();
  });

  function delimg(filename){
    if( confirm('刪除後不能還原！\n刪除後不能還原！\n刪除後不能還原！\n確定刪除嗎？') ){
      window.location.href='?page=admin_images&del='+filename;
    }
  }
</script>

<style type="text/css">
  /* 上傳表單 */
  #imgUpload { background-color: #DDD; padding: 5px 15px; 
    font-size: 15px; text-align: center; }
  #imgFile { color: #FFF; background-color: #FFF; padding: 3px; 
    border: 1px solid #BBB; border-radius:5px;}
  #imgUpload input { vertical-align: middle; }

  /* 影像縮圖 */
  .imgContainer { display: flex; flex-wrap: wrap; justify-content: center; }
  .fileItem { width: 180px; /*height: 220px; float: left; overflow:hidden;*/ 
    margin: 5px; padding: 5px; background-color: #F5F5F5; 
    text-align: center; border: 1px dotted #BDBDBD; }
  .fileItem h2 { color: #FFF; background-color: #838383; 
    font-size: 13px; text-align: left; margin: 0; padding: 3px; 
    white-space: nowrap; overflow: hidden; 
    -o-text-overflow: ellipsis; text-overflow: ellipsis; }
  .fileItem img { display: block; width: 100%; height: auto; margin: 0px auto; }
  .delImgBtn{ margin:5px 0; width:100%;	text-align:center; }

  /* 影像預覽區域 */
  #imgArea img { max-width:120px; height:auto; margin: 10px 5px; }
</style>
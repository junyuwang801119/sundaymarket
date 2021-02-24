<?php
//include_once('../shared/assist_admin_chklogin.php');
require_once('../public/shared/conn_PDO.php');

//判斷是否要新增資料===========================================
if( isset($_POST['MM_process']) && $_POST['MM_process']=='insert' ){

  try{
    //~~~~~~標準款的寫法~~~~~~~~
    //準備SQL語法>建立預處理器=========================
    $sql_str = "INSERT INTO prod ( prod_class_id, prod_name, prod_content, prod_id, 
                                   prod_price,prod_display, prod_create_time ) 
                          VALUES ( :prod_class_id, :prod_name, :prod_content, :prod_id,
                                    :prod_price,:prod_display, :prod_create_time )";
    $stmt = $conn -> prepare($sql_str);

    //接收資料===========================================
    $prod_class_id = $_POST['prod_class_id'];
    $prod_name    = $_POST['prod_name'];
    $prod_content  = $_POST['prod_content'];
    $prod_price  = $_POST['prod_price'];
//    $prod_id  = $_POST['prod_id'];

//    $mem_id = $_SESSION['mem_id'];

//    $news_focus    = $_POST['news_focus'];
    //$news_show     = $_POST['news_show'];
    //if( isset($_POST['news_show']) ){ $news_show=1; }else{ $news_show=0; }
    isset($_POST['prod_display'])?$prod_display=1:$prod_display=0;

    $prod_create_time   = date('Y-m-d H:i:s');
//    $news_time_m   = date('Y-m-d H:i:s');

    //綁定資料===========================================
    $stmt -> bindParam( ':prod_class_id' , $prod_class_id );
    $stmt -> bindParam( ':prod_name'    , $prod_name    );
    $stmt -> bindParam( ':prod_content'  , $prod_content  );

//    $stmt -> bindParam( ':prod_id'        , $prod_id  );

    $stmt -> bindParam( ':prod_display'    , $prod_display    );
    $stmt -> bindParam( ':prod_create_time'     , $prod_create_time     );
//    $stmt -> bindParam( ':news_time_c'   , $news_time_c   );
//    $stmt -> bindParam( ':news_time_m'   , $news_time_m   );

    //執行==============================================
    $stmt -> execute();
    $prod_id = $conn -> lastInsertId();


    //如果有收到檔案................................................................
    if( isset($_FILES['prod_pic']) ){

      //接收到檔案的資訊==================================================
      $file = $_FILES['prod_pic'];

      //指定&限制的條件====================================================
      $max_size = 200*1024;                             //(1)檔案大小
      $allow_ext = array('jpeg','jpg','png','gif');     //(2)檔案類型

      $path = '../public/img_prod/';                           //(3)存放位置
      if( !file_exists($path) ){ mkdir($path); }

      $file_name = $file['name'];
      $ext = pathinfo($file_name,PATHINFO_EXTENSION);
      $file_basename = 'prod_'.$prod_id;
      $file_name = $file_basename.'.'.$ext;          //(4)檔案名稱

      //載入fn負責檢查=================================================================
      include_once('fn_upload_chk.php');
      $result = fn_upload_chk($file, $max_size, $allow_ext, $path, $file_name, true);


      if( $result==1 ){

        //當上傳的檔案存在時, 表示上傳檔案成功, 接著再製作縮圖==============================
        if( file_exists($path.$file_name) ){

          //縮圖(1)-----------------------------------
          $smallfilename = $file_basename . '_b.' . $ext;          //準備小圖檔名

          //決定縮圖大小
          $dst_w = 247.13;
          $dst_h = 247.13;

          include_once('fn_thumbnail.php');
          $src_name = $path.$file_name;
          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h);

          //目的：檔名存入資料庫
          $news_img = $smallfilename;


          //縮圖(2)-----------------------------------
          $smallfilename = $file_basename . '_s.' . $ext;          //準備小圖檔名

          //決定縮圖大小
          $dst_w = 183.19;
          $dst_h = 183.19;

          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h, true);

          //目的：檔名存入資料庫
          $news_img_s = $smallfilename;

          //檔名存入資料庫
          try{
            //~~~~~~標準款的寫法~~~~~~~~
            //準備SQL語法>建立預處理器=========================
            $sql_str = "UPDATE prod SET prod_pic   = :prod_pic, 
                                        prod_pic_s = :prod_pic_s
                          WHERE prod_id = :prod_id";
            $stmt = $conn -> prepare($sql_str);

            //接收資料===========================================

            //綁定資料===========================================
            $stmt -> bindParam( ':prod_pic'   , $prod_pic    );
            $stmt -> bindParam( ':prod_pic_s' , $prod_pic_s  );
            $stmt -> bindParam( ':prod_id'    , $prod_id     );

            //執行==============================================
            $stmt -> execute();
          }
          catch ( PDOException $e ){
            die("Errpr!: ". $e->getMessage());
          }

        }else{
          echo $result;  //上傳失敗時
        }
      }else{
        $_SESSION['upload_msg'] = $result;
      }
    }

    header('Location: ../index.php');
  }
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }

}


//判斷是否要修改資料===========================================
if( isset($_POST['MM_process']) && $_POST['MM_process']=='update' ){

  try{
    //~~~~~~標準款的寫法~~~~~~~~
    //準備SQL語法>建立預處理器=========================
    $sql_str = "UPDATE news SET news_class_id = :news_class_id, 
                                news_title    = :news_title   , 
                                news_content  = :news_content , 
                                news_focus    = :news_focus   , 
                                news_show     = :news_show    , 
                                news_time_m   = :news_time_m  
                          WHERE news_id       = :news_id";
    $stmt = $conn -> prepare($sql_str);

    //接收資料===========================================
    $news_class_id = $_POST['news_class_id'];
    $news_title    = $_POST['news_title'];
    $news_content  = $_POST['news_content'];

    $news_focus    = $_POST['news_focus'];

    //if( isset($_POST['news_show']) ){ $news_show=1; }else{ $news_show=0; }
    isset($_POST['news_show'])?$news_show=1:$news_show=0;

    $news_time_m   = date('Y-m-d H:i:s');
    $news_id       = $_POST['news_id'];

    //綁定資料===========================================
    $stmt -> bindParam( ':news_class_id' , $news_class_id );
    $stmt -> bindParam( ':news_title'    , $news_title    );
    $stmt -> bindParam( ':news_content'  , $news_content  );

    $stmt -> bindParam( ':news_focus'    , $news_focus    );
    $stmt -> bindParam( ':news_show'     , $news_show     );
    $stmt -> bindParam( ':news_time_m'   , $news_time_m   );
    $stmt -> bindParam( ':news_id'       , $news_id       );

    //執行==============================================
    $stmt -> execute();


    //如果有收到檔案................................................................
    if( isset($_FILES['news_img']) ){

      //接收到檔案的資訊==================================================
      $file = $_FILES['news_img'];

      //指定&限制的條件====================================================
      $max_size = 200*1024;                             //(1)檔案大小
      $allow_ext = array('jpeg','jpg','png','gif');     //(2)檔案類型

      $path = '../img_news/';                           //(3)存放位置
      if( !file_exists($path) ){ mkdir($path); }

      $file_name = $file['name'];
      $ext = pathinfo($file_name,PATHINFO_EXTENSION);
      $file_basename = 'news_'.$news_id;
      $file_name = $file_basename.'.'.$ext;          //(4)檔案名稱

      //載入fn負責檢查=================================================================
      include_once('../shared/fn_upload_chk.php');
      $result = fn_upload_chk($file, $max_size, $allow_ext, $path, $file_name, true);

      if( $result==1 ){

        //當上傳的檔案存在時, 表示上傳檔案成功, 接著再製作縮圖==============================
        if( file_exists($path.$file_name) ){

          //縮圖(1)-----------------------------------
          $smallfilename = $file_basename . '_b.' . $ext;          //準備小圖檔名

          //決定縮圖大小
          $dst_w = 900;
          $dst_h = 900;

          include_once('../shared/fn_thumbnail.php');
          $src_name = $path.$file_name;
          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h);

          //目的：檔名存入資料庫
          $news_img = $smallfilename;


          //縮圖(2)-----------------------------------
          $smallfilename = $file_basename . '_s.' . $ext;          //準備小圖檔名

          //決定縮圖大小
          $dst_w = 180;
          $dst_h = 180;

          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h, true);

          //目的：檔名存入資料庫
          $news_img_s = $smallfilename;

          //檔名存入資料庫
          try{
            //~~~~~~標準款的寫法~~~~~~~~
            //準備SQL語法>建立預處理器=========================
            $sql_str = "UPDATE news SET news_img   = :news_img, 
                                        news_img_s = :news_img_s
                          WHERE news_id = :news_id";
            $stmt = $conn -> prepare($sql_str);

            //接收資料===========================================

            //綁定資料===========================================
            $stmt -> bindParam( ':news_img'   , $news_img    );
            $stmt -> bindParam( ':news_img_s' , $news_img_s  );
            $stmt -> bindParam( ':news_id'    , $news_id     );

            //執行==============================================
            $stmt -> execute();
          }
          catch ( PDOException $e ){
            die("Errpr!: ". $e->getMessage());
          }

        }else{
          echo $result;  //上傳失敗時
        }
      }else{
        $_SESSION['upload_msg'] = $result;
      }
    }    


    header('Location: ../TS_adminpage/?page=admin_news');
    //echo $news_class_id.', '.$news_title.', '.$news_content.', '.$news_focus.', '.$news_show.', '.$news_time_m.', '.$news_id;
  }
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }

}


//判斷是否要刪除資料===========================================
if( isset($_POST['MM_process']) && $_POST['MM_process']=='delete' ){
  try{
    //~~~~~~標準款的寫法~~~~~~~~
    //準備SQL語法>建立預處理器=========================
    $sql_str = "DELETE FROM news WHERE news_id = :news_id";
    $stmt = $conn -> prepare($sql_str);

    //接收資料===========================================
    $news_id = $_POST['news_id'];
    //$uri = $_POST['uri'];

    //綁定資料===========================================
    $stmt -> bindParam( ':news_id', $news_id );

    //執行==============================================
    $stmt -> execute();
    header('Location: ../TS_adminpage/?page=admin_news');
    //echo $uri;
  }
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }
}

?>
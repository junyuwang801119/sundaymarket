<?php
require_once('../../public/shared/conn_PDO.php');
//include_once('../public/shared/assist_admin_chklogin.php');
if( !isset($_SESSION) ){ session_start(); }
//判斷是否要新增資料===========================================

if( isset($_POST['MM_process']) && $_POST['MM_process']=='insert' ){

  try{
    
    $sql_str = "INSERT INTO prod ( prod_class_id, prod_name, prod_tnum, prod_price, 
                                   prod_content ) 
                          VALUES ( :prod_class_id, :prod_name, :prod_tnum, :prod_price,
                                   :prod_content)";
    $stmt = $conn -> prepare($sql_str);
    
    $prod_class_id   = $_POST['prod_class_id'];
    $prod_name       = $_POST['prod_name   '];
    $prod_tnum       = $_POST['prod_tnum '];
   
//    isset($_POST['prod_display '])?$prod_display =1:$prod_display =0;
    
    $prod_price      = $_POST['prod_price'];   
//    $prod_create_time =date('Y-m-d H:i:s');
    $prod_content    = $_POST['prod_content'];
    
    $stmt -> bindParam( ':prod_class_id '  , $prod_class_id  );
    $stmt -> bindParam( ':prod_name     '  , $prod_name      );
    $stmt -> bindParam( ':prod_tnum     '  , $prod_tnum      );
  
//    $stmt -> bindParam( ':prod_display '      , $prod_display  );
//    $stmt -> bindParam( ':prod_create_time '  , $prod_create_time  );
    $stmt -> bindParam( ':prod_price   '      , $prod_price   );
    $stmt -> bindParam( ':prod_content '      , $prod_content);
    
    $stmt -> execute();
    $prod_id = $conn -> lastInsertId();


//    //如果有收到檔案................................................................
//    if( isset($_FILES['prod_pic']) ){
//
//      //接收到檔案的資訊==================================================
//      $file = $_FILES['prod_pic'];
//
//      //指定&限制的條件====================================================
//      $max_size = 200*1024;                             //(1)檔案大小
//      $allow_ext = array('jpeg','jpg','png','gif');     //(2)檔案類型
//
//      $path = '../../public/upload_img/';                           //(3)存放位置
//      if( !file_exists($path) ){ mkdir($path); }
//
//      $file_name = $file['name'];
//      $ext = pathinfo($file_name,PATHINFO_EXTENSION);
//      $file_basename = 'prod_'.$news_id;
//      $file_name = $file_basename.'.'.$ext;          //(4)檔案名稱
//
//      //載入fn負責檢查=================================================================
//      include_once('../org/fn_upload_chk.php');
//      $result = fn_upload_chk($file, $max_size, $allow_ext, $path, $file_name, true);
//
//
//      if( $result==1 ){
//
//        //當上傳的檔案存在時, 表示上傳檔案成功, 接著再製作縮圖==============================
//        if( file_exists($path.$file_name) ){
//
//          //縮圖(1)-----------------------------------
//          $smallfilename = $file_basename . '_b.' . $ext;          //準備小圖檔名
//
//          //決定縮圖大小
//          $dst_w = 830;
//          $dst_h = 830;
//
//          include_once('../org/fn_thumbnail.php');
//          $src_name = $path.$file_name;
//          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h);
//
//          //目的：檔名存入資料庫
//          $prod_pic = $smallfilename;
//
//
//          //縮圖(2)-----------------------------------
//          $smallfilename = $file_basename . '_s.' . $ext;          //準備小圖檔名
//
//          //決定縮圖大小
//          $dst_w = 180;
//          $dst_h = 180;
//
//          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h, true);
//
//          //目的：檔名存入資料庫
//          $prod_pic_s = $smallfilename;
//
//          //檔名存入資料庫
//          try{
//            
//            $sql_str = "UPDATE prod SET prod_pic   = :prod_pic, 
//                                        prod_pic_s = :prod_pic_s
//                          WHERE prod _id = :prod _id";
//            $stmt = $conn -> prepare($sql_str);
//           
//            $stmt -> bindParam( ':prod_pic'   , $prod_pic   );
//            $stmt -> bindParam( ':prod_pic_s' , $prod_pic_s  );
//            $stmt -> bindParam( ':prod _id'    , $prod_id    );
//            //執行==============================================
//            $stmt -> execute();
//          }
//          catch ( PDOException $e ){
//            die("Errpr!: ". $e->getMessage());
//          }
//
//        }else{
//          echo $result;  //上傳失敗時
//        }
//      }else{
//        $_SESSION['upload_msg'] = $result;
//      }
//    }

    header('Location: ../?page=admin_commodity');

}
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }
}




////判斷是否要修改資料===========================================
if( isset($_POST['MM_process']) && $_POST['MM_process']=='update' ){

  try{
    
    $sql_str = "UPDATE prod SET prod_class_id  = :prod_class_id, 
                                prod_name      = :prod_name   , 
                                prod_tnum      = :prod_tnum , 
                                prod_display   = :prod_display,   , 
                                prod_price     = :prod_price ,
                                
                                prod_content   =: prod_content
                            WHERE prod_id      = :prod_id";
    
    $stmt = $conn -> prepare($sql_str);

    $prod_class_id   = $_POST['prod_class_id'];
    $prod_name       = $_POST['prod_name   '];
    $prod_tnum       = $_POST['prod_tnum '];
   
    isset($_POST['prod_display '])?$prod_display =1:$prod_display =0;
    
    $prod_price      = $_POST['prod_price'];   

    $prod_content    = $_POST['prod_content'];
    $prod_id       = $_POST['prod_id'];
    
    
    $stmt -> bindParam( ':prod_class_id '  , $prod_class_id  );
    $stmt -> bindParam( ':prod_name     '  , $prod_name      );
    $stmt -> bindParam( ':prod_tnum     '  , $prod_tnum      );
  
    $stmt -> bindParam( ':prod_display '   , $prod_display  );
    $stmt -> bindParam( ':prod_price   '   , $prod_price   );

    $stmt -> bindParam( ':prod_content '   , $prod_content);
    $stmt -> bindParam( ':prod_id '        , $prod_id);
    
    $stmt -> execute();

    //如果有收到檔案................................................................
    if( isset($_FILES['prod_pic']) ){

      $file = $_FILES['prod_pic'];

      //指定&限制的條件====================================================
      $max_size = 500*1024;                             //(1)檔案大小
      $allow_ext = array('jpeg','jpg','png','gif');     //(2)檔案類型

      $path = '../../public/upload_img/';               //(3)存放位置
      if( !file_exists($path) ){ mkdir($path); }

      $file_name = $file['name'];
      $ext = pathinfo($file_name,PATHINFO_EXTENSION);
      $file_basename = 'prod_'.$news_id;
      $file_name = $file_basename.'.'.$ext;          //(4)檔案名稱

      //載入fn負責檢查=================================================================
      include_once('../org/fn_upload_chk.php');
      $result = fn_upload_chk($file, $max_size, $allow_ext, $path, $file_name, true);

      if( $result==1 ){

        //當上傳的檔案存在時, 表示上傳檔案成功, 接著再製作縮圖==============================
        if( file_exists($path.$file_name) ){

          //縮圖(1)-----------------------------------
          $smallfilename = $file_basename . '_b.' . $ext;          //準備小圖檔名

          //決定縮圖大小
          $dst_w = 830;
          $dst_h = 830;

          include_once('../org/fn_thumbnail.php');
          $src_name = $path.$file_name;
          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h);

          //目的：檔名存入資料庫
          $prod_pic = $smallfilename;


          //縮圖(2)-----------------------------------
          $smallfilename = $file_basename . '_s.' . $ext;          //準備小圖檔名

          //決定縮圖大小
          $dst_w = 180;
          $dst_h = 180;

          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h, true);

          //目的：檔名存入資料庫
          $prod_pic_s = $smallfilename;

          //檔名存入資料庫
          try{
            //~~~~~~標準款的寫法~~~~~~~~
            //準備SQL語法>建立預處理器=========================
            $sql_str = "UPDATE prod SET prod_pic   = :prod_pic, 
                                        prod_pic_s = :prod_pic_s
                          WHERE prod _id = :prod _id";
            $stmt = $conn -> prepare($sql_str);

            //接收資料===========================================

            //綁定資料===========================================
            $stmt -> bindParam( ':prod_pic'   , $prod_pic   );
            $stmt -> bindParam( ':prod_pic_s' , $prod_pic_s  );
            $stmt -> bindParam( ':prod _id'    , $prod_id    );

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
    
    
    
    header('Location: ../?page=admin_commodity');
 
  }
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }

}


////判斷是否要刪除資料===========================================
if( isset($_POST['MM_process']) && $_POST['MM_process']=='delete' ){
  try{
    
    $sql_str = "DELETE FROM ordertab WHERE order_id = :order_id";
    $stmt = $conn -> prepare($sql_str);

    $order_id = $_POST['order_id'];
    $stmt -> bindParam( ':order_id', $order_id );
    $stmt -> execute();
    
    header('Location: ../?page=admin_order');
    
  }
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }
}

?>
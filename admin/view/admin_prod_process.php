<?php
require_once('../../public/shared/conn_PDO.php');
//include_once('../public/shared/assist_admin_chklogin.php');
if( !isset($_SESSION) ){ session_start(); }
//判斷是否要新增資料===========================================
if( isset($_POST['MM_process']) && $_POST['MM_process']=='insert' ){

  try{

    $sql_str = "INSERT INTO prod ( prod_class_id, prod_name, prod_price, 
                                   prod_tnum, prod_display,prod_content,prod_create_time,user_id) 
                          VALUES ( :prod_class_id, :prod_name, :prod_price,
                                   :prod_tnum, :prod_display,:prod_content,:prod_create_time,:user_id)";
    $stmt = $conn -> prepare($sql_str);

    $prod_class_id  = $_POST['prod_class_id'];
    $prod_name      = $_POST['prod_name'];
    $prod_price     = $_POST['prod_price'];
    $prod_tnum      = $_POST['prod_tnum'];
    $prod_content   = $_POST['prod_content'];

    $prod_create_time   = date('Y-m-d H:i:s');

    if( isset($_POST['prod_display']) ){ $prod_display=1; }else{ $prod_display=0; }
    //    
    $user_id  = $_SESSION['user_id'];
        
    //
    //    //綁定資料===========================================
    $stmt -> bindParam( ':prod_class_id' , $prod_class_id );
    $stmt -> bindParam( ':prod_name'     , $prod_name    );
    $stmt -> bindParam( ':prod_price'    , $prod_price  );
    $stmt -> bindParam( ':user_id'       , $user_id  );
 
    $stmt -> bindParam( ':prod_tnum'        , $prod_tnum        );
    $stmt -> bindParam( ':prod_content'     , $prod_content     );
    $stmt -> bindParam( ':prod_create_time' , $prod_create_time );
    $stmt -> bindParam( ':prod_display'     , $prod_display     );
   
    //
    $stmt -> execute();
    $prod_id = $conn -> lastInsertId();
    
    
    //上傳圖檔
    if( isset( $_FILES['prod_pic'] ) ){
      $file = $_FILES['prod_pic'];
      
      //上傳檔限定&條件
      //1.檔案大小
      $max_size = 500*1024 ;
      //2.檔案類型
      $allow_ext = array('jpeg','jpg','png','gif');
      //3.儲存目錄 (如果沒有此目錄-->創建)
      $path = '../../public/img_prod/';
      if( !file_exists($path) ){ mkdir($path); }
      
      $file_name = $file['name'];
      $ext = pathinfo($file_name,PATHINFO_EXTENSION);
      $file_basename = 'prod_'.$prod_id;
      //4.檔案名稱
      $file_name = $file_basename.'.'.$ext;
      
      //引入fn (1)檢查
      include_once('../org/fn_upload_chk.php');
      $result = fn_upload_chk($file, $max_size, $allow_ext, $path, $file_name, true);
      
      if( $result==1 ){
        if( file_exists($path.$file_name) ){
          //縮圖1製作
          //1.縮圖檔名(大)
          $smallfilename = $file_basename . '_b.' . $ext; 
          //2.縮圖尺寸
          $dst_w = 830;
          $dst_h = 830;
          
          //引入fn (2)製作
          include_once('../org/fn_thumbnail.php');
          //1.儲存目錄檔名
          $src_name = $path.$file_name;
          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h);
          //資料庫存入欄位
          $prod_pic = $smallfilename;

          //縮圖2製作(小)
          $smallfilename = $file_basename . '_s.' . $ext;
          $dst_w = 180;
          $dst_h = 180;
          
          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h, true);
          $prod_pic_s = $smallfilename;
          
          try{
            //更新入資料庫
            $sql_str = "UPDATE prod SET prod_pic   = :prod_pic,
                                        prod_pic_s = :prod_pic_s
                        WHERE prod_id = :prod_id";
            $stmt = $conn -> prepare($sql_str);
            $stmt -> bindParam(':prod_pic'  , $prod_pic);
            $stmt -> bindParam(':prod_pic_s', $prod_pic_s);
            $stmt -> bindParam(':prod_id'   , $prod_id);
            
            $stmt -> execute();
            
          }
          catch( PDOException $e){
            die("Errpr!: ". $e->getMessage());
          }
        }else{
            //上傳失敗
            echo $result;
          }
        }else{
          $_SESSION['upload_msg'] = $result;
        }
                
        
      }
      //完成後跳轉回原來頁面
      header ('Location:../?page=admin_commodity');
      
    }catch( PDOException $e){
            die("Errpr!: ". $e->getMessage());
          }
  }



//
////判斷是否要修改資料===========================================
if( isset($_POST['MM_process']) && $_POST['MM_process']=='update' ){

  try{
    
    $sql_str = "UPDATE prod SET prod_class_id  = :prod_class_id, 
                                prod_name      = :prod_name    , 
                                prod_tnum      = :prod_tnum    , 
                                prod_display   = :prod_display ,    
                                prod_price     = :prod_price   ,
                                is_hot          = :is_hot   ,
                                prod_content   = :prod_content
                           
                           WHERE prod_id      = :prod_id";
    
    $stmt = $conn -> prepare($sql_str);

    $prod_class_id   = $_POST['prod_class_id'];
    $prod_name       = $_POST['prod_name   '];
    $prod_tnum       = $_POST['prod_tnum '];
    
    if( isset($_POST['prod_display']) ){ $prod_display=1; }else{ $prod_display=0; }
    if( isset($_POST['is_hot']) ){ $is_hot=1; }else{ $is_hot=0; }
   
    
    $prod_price      = $_POST['prod_price']; 
    $prod_content    = $_POST['prod_content'];
    $prod_id         = $_POST['prod_id'];
    
    
    $stmt -> bindParam( ':prod_class_id '  , $prod_class_id  );
    $stmt -> bindParam( ':prod_name     '  , $prod_name      );
    $stmt -> bindParam( ':prod_tnum     '  , $prod_tnum      );
  
    $stmt -> bindParam( ':prod_display '   , $prod_display  );
    $stmt -> bindParam( ':prod_price   '   , $prod_price   );

    $stmt -> bindParam( ':prod_content '   , $prod_content);
    $stmt -> bindParam( ':prod_id '        , $prod_id);
    
    $stmt -> execute();
    
    //上傳圖檔
    if( isset( $_FILES['prod_pic'] ) ){
      $file = $_FILES['prod_pic'];
      
      //上傳檔限定&條件
      //1.檔案大小
      $max_size = 500*1024 ;
      //2.檔案類型
      $allow_ext = array('jpeg','jpg','png','gif');
      //3.儲存目錄 (如果沒有此目錄-->創建)
      $path = '../../public/img_prod/';
      if( !file_exists($path) ){ mkdir($path); }
      
      $file_name = $file['name'];
      $ext = pathinfo($file_name,PATHINFO_EXTENSION);
      $file_basename = 'prod_'.$prod_id;
      //4.檔案名稱
      $file_name = $file_basename.'.'.$ext;
      
      //引入fn (1)檢查
      include_once('../org/fn_upload_chk.php');
      $result = fn_upload_chk($file, $max_size, $allow_ext, $path, $file_name, true);
      
      if( $result==1 ){
        if( file_exists($path.$file_name) ){
          //縮圖1製作
          //1.縮圖檔名(大)
          $smallfilename = $file_basename . '_b.' . $ext; 
          //2.縮圖尺寸
          $dst_w = 830;
          $dst_h = 830;
          
          //引入fn (2)製作
          include_once('../org/fn_thumbnail.php');
          //1.儲存目錄檔名
          $src_name = $path.$file_name;
          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h);
          //資料庫存入欄位
          $prod_pic = $smallfilename;

          //縮圖2製作(小)
          $smallfilename = $file_basename . '_s.' . $ext;
          $dst_w = 180;
          $dst_h = 180;
          
          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h, true);
          $prod_pic_s = $smallfilename;
          
          try{
            //更新入資料庫
            $sql_str = "UPDATE prod SET prod_pic   = :prod_pic,
                                        prod_pic_s = :prod_pic_s
                        WHERE prod_id = :prod_id";
            $stmt = $conn -> prepare($sql_str);
            $stmt -> bindParam(':prod_pic'  , $prod_pic);
            $stmt -> bindParam(':prod_pic_s', $prod_pic_s);
            $stmt -> bindParam(':prod_id'   , $prod_id);
            
            $stmt -> execute();
            
          }
          catch( PDOException $e){
            die("Errpr!: ". $e->getMessage());
          }
        }else{
            //上傳失敗
            echo $result;
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
    
    $sql_str = "DELETE FROM prod WHERE prod_id = :prod_id";
    $stmt = $conn -> prepare($sql_str);

    $prod_id = $_POST['prod_id'];
    $stmt -> bindParam( ':prod_id', $prod_id );
    $stmt -> execute();
    
    header('Location: ../?page=admin_commodity');
    
  }
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }
}

?>
<?php
require_once('../../public/shared/conn_PDO.php');
//include_once('../public/shared/assist_admin_chklogin.php');
if( !isset($_SESSION) ){ session_start(); }

//判斷是否要新增資料-------------------------
if( isset($_POST['MM_process']) && $_POST['MM_process']=='insert' ){

  try{

    $sql_str = "INSERT INTO news ( news_class_id, news_title, news_content, 
                                   news_show, new_create_time,user_id) 
                          VALUES ( :news_class_id, :news_title, :news_content,
                                   :news_show, :new_create_time,:user_id)";
    $stmt = $conn -> prepare($sql_str);

    $news_class_id = $_POST['news_class_id'];
    $news_title    = $_POST['news_title'];
    $news_content  = $_POST['news_content'];

    $user_id  = $_SESSION['user_id'];

    //      echo $user_id;
    //    $news_focus    = $_POST['news_focus'];
    if( isset($_POST['news_show']) ){ $news_show=1; }else{ $news_show=0; }
    //    
    $new_create_time   = date('Y-m-d H:i:s');
    //    $new_modify_time   = date('Y-m-d H:i:s');
    //
    //    //綁定資料===========================================
    $stmt -> bindParam( ':news_class_id' , $news_class_id );
    $stmt -> bindParam( ':news_title'    , $news_title    );
    $stmt -> bindParam( ':news_content'  , $news_content  );
    //
    $stmt -> bindParam( ':user_id'       , $user_id  );
    //
    //    $stmt -> bindParam( ':news_focus'    , $news_focus    );
    $stmt -> bindParam( ':news_show'     , $news_show     );
    $stmt -> bindParam( ':new_create_time'   , $new_create_time   );
    //    $stmt -> bindParam( ':new_modify_time'   , $new_modify_time   );
    //
    $stmt -> execute();
    $news_id = $conn -> lastInsertId();
    
    
    //上傳圖檔
    if( isset( $_FILES['news_pic'] ) ){
      $file = $_FILES['news_pic'];
      
      //上傳檔限定&條件
      //1.檔案大小
      $max_size = 500*1024 ;
      //2.檔案類型
      $allow_ext = array('jpeg','jpg','png','gif');
      //3.儲存目錄 (如果沒有此目錄-->創建)
      $path = '../../public/img_news/';
      if( !file_exists($path) ){ mkdir($path); }
      
      $file_name = $file['name'];
      $ext = pathinfo($file_name,PATHINFO_EXTENSION);
      $file_basename = 'news_'.$news_id;
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
          $news_pic = $smallfilename;

          //縮圖2製作(小)
          $smallfilename = $file_basename . '_s.' . $ext;
          $dst_w = 180;
          $dst_h = 180;
          
          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h, true);
          $news_pic_s = $smallfilename;
          
          try{
            //更新入資料庫
            $sql_str = "UPDATE news SET news_pic   = :news_pic,
                                        news_pic_s = :news_pic_s
                        WHERE news_id = :news_id";
            $stmt = $conn -> prepare($sql_str);
            $stmt -> bindParam(':news_pic'  , $news_pic);
            $stmt -> bindParam(':news_pic_s', $news_pic_s);
            $stmt -> bindParam(':news_id'   , $news_id);
            
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
      header ('Location:../?page=admin_news');
      
    }catch( PDOException $e){
            die("Errpr!: ". $e->getMessage());
          }
  }
  
//判斷是否要修改資料===========================================
if( isset($_POST['MM_process']) && $_POST['MM_process']=='update' ){

  try{

    $sql_str = "UPDATE news SET news_class_id  = :news_class_id, 
                                news_title     = :news_title   , 
                                news_content   = :news_content , 
                                news_show      = :news_show   , 
                                new_modify_time = :new_modify_time 
                            WHERE news_id      = :news_id";

    $stmt = $conn -> prepare($sql_str);

    $news_class_id   = $_POST['news_class_id'];
    $news_title      = $_POST['news_title   '];
    $news_content    = $_POST['news_content '];
    
    if( isset($_POST['news_show']) ){ $news_show=1; }else{ $news_show=0; }
    $new_modify_time = date('Y-m-d H:i:s');

    $news_id       = $_POST['news_id'];

    $stmt -> bindParam( ':news_class_id'  , $news_class_id  );
    $stmt -> bindParam( ':news_title    ' , $news_title     );
    $stmt -> bindParam( ':news_content'   , $news_content   );

    $stmt -> bindParam( ':news_show'      , $news_show       );
    $stmt -> bindParam( ':new_modify_time' , $new_modify_time );
    $stmt -> bindParam( ':news_id'        , $news_id       );

    $stmt -> execute();

     
    //上傳圖檔
    if( isset( $_FILES['news_pic'] ) ){
      $file = $_FILES['news_pic'];
      
      //上傳檔限定&條件
      //1.檔案大小
      $max_size = 500*1024 ;
      //2.檔案類型
      $allow_ext = array('jpeg','jpg','png','gif');
      //3.儲存目錄 (如果沒有此目錄-->創建)
      $path = '../../public/img_news/';
      if( !file_exists($path) ){ mkdir($path); }
      
      $file_name = $file['name'];
      $ext = pathinfo($file_name,PATHINFO_EXTENSION);
      $file_basename = 'news_'.$news_id;
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
          $news_pic = $smallfilename;

          //縮圖2製作(小)
          $smallfilename = $file_basename . '_s.' . $ext;
          $dst_w = 180;
          $dst_h = 180;
          
          fn_thumbnail($src_name, $path, $smallfilename, $dst_w, $dst_h, true);
          $news_pic_s = $smallfilename;
          
          try{
            //更新入資料庫
            $sql_str = "UPDATE news SET news_pic   = :news_pic,
                                        news_pic_s = :news_pic_s
                        WHERE news_id = :news_id";
            $stmt = $conn -> prepare($sql_str);
            $stmt -> bindParam(':news_pic'  , $news_pic);
            $stmt -> bindParam(':news_pic_s', $news_pic_s);
            $stmt -> bindParam(':news_id'   , $news_id);
            
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
    
    
    header('Location: ../?page=admin_news');

  }
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }

}


//判斷是否要刪除資料===========================================
if( isset($_POST['MM_process']) && $_POST['MM_process']=='delete' ){
  try{

    $sql_str = "DELETE FROM news WHERE news_id = :news_id";
    $stmt = $conn -> prepare($sql_str);

    $news_id = $_POST['news_id'];
    $stmt -> bindParam( ':news_id', $news_id );
    $stmt -> execute();

    header('Location: ../?page=admin_news');

  }
  catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
  }
}

?>
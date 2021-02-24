<?php
require_once('public/shared/conn_PDO.php');
session_start();

if( isset($_POST['MM_process']) && $_POST['MM_process'] == 'addmem' ) {

        //準備SQL語法>建立預處理器=========================
    $sql_str = "INSERT INTO mem (  user_name , user_mail, user_pwd, chkcode , user_real_name, user_tel) 
                        VALUES (  :user_name , :user_mail, :user_pwd, :chkcode , :user_real_name, :user_tel)";                     
        $stmt = $conn -> prepare($sql_str);

        //接收資料===========================================
        $user_name = $_POST['user_name'];
        $user_mail = $_POST['user_mail'];
        $user_pwd  = $_POST['user_pwd'];
        $user_real_name  = $_POST['user_real_name'];
        $user_tel  = $_POST['user_tel'];
        $chkcode = "123456";

        //綁定資料===========================================
        $stmt -> bindParam(':user_name' , $user_name );
        $stmt -> bindParam(':user_mail' , $user_mail );
        $stmt -> bindParam(':user_pwd'  , $user_pwd  );
        $stmt -> bindParam(':user_real_name'  , $user_real_name  );
        $stmt -> bindParam(':user_tel'  , $user_tel  );
        $stmt -> bindParam(':chkcode'  , $chkcode );
    

        //執行==============================================
        $stmt -> execute();
  
        $user_id = $conn -> lastInsertId();  
        $_SESSION['user_id'] = $user_id;
        echo '<script>alert("註冊成功，跳轉回首頁~");window.location="index.php";</script>';
//        echo '<script>alert('.$_SESSION['user_id'].'"會員id");';
//        header("location:../?page=index_content");
}
?>

<?php
require_once('../../public/shared/conn_PDO.php');
if( !isset($_SESSION) ){ session_start(); }

try{
  //準備SQL語法>建立預處理器=========================
  $sql_str = "SELECT *
              FROM mem 
              WHERE user_name = :user_name
              AND   user_pwd  = :user_pwd
              AND   user_grade > 1";
  $stmt = $conn -> prepare($sql_str);

  //接收資料===========================================
  $user_name = $_POST['user_name'];
  $user_pwd  = $_POST['user_pwd'];

  //綁定資料===========================================
  $stmt -> bindParam( ':user_name', $user_name );
  $stmt -> bindParam( ':user_pwd',  $user_pwd );

  //執行==============================================
  $stmt -> execute();
  $total = $stmt -> rowCount();
  
  if( $total==1 ){
    $row_member = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION['user_id']    = $row_member['user_id'];
    $_SESSION['user_name']  = $row_member['user_name'];
    $_SESSION['user_grade'] = $row_member['user_grade'];
//    
    header('Location: ../index.php');
//    echo ($_SESSION['user_id']) ;
  }else{
    header('Location: ../Login_index.php?msg=1');
  }
  
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}
?>




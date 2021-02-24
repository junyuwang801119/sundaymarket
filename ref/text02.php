<?php
require_once('../public/shared/conn_PDO.php');

try{
  
  $user_name = admin001;
  $user_pwd  = 123456;
  
  $sql_str = "SELECT *
              FROM user 
              WHERE user_name = :user_name
              AND   user_pass  = :user_pass
              ";
//  AND   user_grade > 1
  $stmt = $conn -> prepare($sql_str);
//
//  $user_name = $_POST['user_name'];
//  $user_pwd  = $_POST['user_pass'];


  $stmt -> bindParam( ':user_name', $user_name );
  $stmt -> bindParam( ':user_pass',  $user_pass );

  $stmt -> execute();

  $total = $stmt -> rowCount();
  echo $total;
//  if( $user_total == 1 ){
//    $row = $stmt->fetch(PDO::FETCH_ASSOC);
//    
//    $_SESSION['user_id']    = $row['user_id'];
//    $_SESSION['user_name']  = $row['user_name'];
//    $_SESSION['user_grade'] = $row['user_grade'];
//    
//    header('Location: ../?page=index_content');
//  }else{
//    header('Location: ../?page=loginsignup3&msg=1');
//  }
//  
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}
?>




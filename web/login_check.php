<?php
require_once('../public/shared/conn_PDO.php');

try{
  //由登入頁面收到帳/密資料比對-->select語法搜尋資料庫
 $sql_str = "SELECT * FROM user 
             WHERE user_name = :user_name
             AND user_pwd = :user_pwd
             AND user_grade > 1";
  
 $stmt = $conn -> prepare($sql_str) ;
 
 $user_name = $_POST["user_name"]; 
 $user_pwd  = $_POST["user_pwd"];
 
 $stmt -> bindParam(":user_name",$user_name);
 $stmt -> bindParam(":user_pwd" ,$user_pwd); 
 
 // 資料表中以資料條件搜尋，計算筆數(結果筆數僅會有1條)  
 $stmt -> execute();
 $RS_mem_rows = $stmt -> rowCount();
  
  echo $RS_mem_rows;
  //判斷是否有資料在資料表中，且僅有一筆數據
//  if( $RS_mem_rows == 1 ){
//    $mem_row = $stmt -> fetch(PDO::FETCH_ASSOC); 
//    
//    //將獲取的 帳號/等級/id 紀錄在session
//    $_SESSION["user_name"] = $mem_row["user_name"];
//    $_SESSION["user_id"] = $mem_row["user_id"];
//    $_SESSION["user_grade"] = $mem_row["user_grade"];
//    
//    header("location:../?page=admin-main");
//      $website = "Location:./../index.php";
//  }else{
////    header("location:../?page=admin_login&msg=1");
//    $website ="Location:../?page=loginsignup3&msg=1";
//  }
//    header($website);
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}
?>




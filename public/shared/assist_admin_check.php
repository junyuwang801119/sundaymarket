<?php
 //判斷session中是否有寄存數據 : Y->用戶已登入 可檢查其等級  N->用戶尚未登入(or未註冊) ==>跳轉登入頁面

  //進入頁面可先啟動session
  if( !isset($_SESSION) ){session_start() ;}
  if( !isset( $_SESSION['user_grade'] )){
    $website = "Location:../?m=login&page=admin_login&msg=2";
  }

  if( $_SESSION['user_grade'] > 1 ){
    $website = "Location:../?m=login&page=admin_login&msg=3";
  }

  header($website);

?>
<?php
  //後臺主入口文件
  $method = $_GET['m']??'index';
//  $a =  $_GET['a']??'show';
  
  require_once '../public/shared/conn_PDO.php';
  include './control/indexControl.php';
  include './control/sysControl.php';
  include './control/posterControl.php';
  include './control/userControl.php';
  //調用外部函數
  $method();
//  $a();

  



?>
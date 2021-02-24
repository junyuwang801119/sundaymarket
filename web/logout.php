<?php
require_once('../public/shared/conn_PDO.php');
session_start();

$_SESSION['user_id']    = '';
$_SESSION['user_name']  = '';
$_SESSION['user_grade'] = '';

unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_grade']);

 echo '<script>alert("登出成功，跳轉回首頁~")</script>';
header('location:../');
?>
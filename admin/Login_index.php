<?php
require_once('../public/shared/conn_PDO.php');
//include_once('../public/shared/assist_admin_chklogin.php');
if( !isset($_SESSION) ){ session_start(); }

?>


<!DOCTYPE html>
<html lang="zh-Hant-TW">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <title>Document</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="include/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="include/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="include/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="include/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker 日期選擇-->
    <link rel="stylesheet" href="include/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote 編輯器-->
    <link rel="stylesheet" href="include/plugins/summernote/summernote-bs4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="include/dist/css/adminlte.min.css">
  </head>
  <body class="login_Img">
    <div id="login" class="mt-4 ">
      <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
          <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12 rounded">
              <form id="login-form" class="form" method="post" action="view/mem_login_check.php">
<!--               LOGO-->
                <h3 class="text-center text-dark">後台管理系統</h3>
                <div class="form-group">
                  <label for="username" class="text-dark">帳號:</label><br>
                  <input type="text" name="user_name" id="username" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password" class="text-dark">密碼:</label><br>
                  <input type="text" name="user_pwd" id="password" class="form-control">
                </div>
                <div class="form-group row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <label for="remember-me" class="text-dark"><span>自動登入</span><span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <a href="javascript:;" class="text-dark ">忘記密碼</a>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <a href="" class="btn btn-lg btn-secondary btn-block rounded-pill">取消</a>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <input type="submit" class="btn btn-lg btn-secondary btn-block rounded-pill" value="登入">
<!--                      <a href="Admin_index.php" class="btn btn-lg btn-secondary btn-block rounded-pill">登入</a>-->
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                      <a href="" class="btn btn-lg btn-secondary btn-block rounded-pill">註冊</a>
                    </div>
                  </div>
              </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    <!-- jQuery -->
    <script src="include/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="include/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="include/plugins/moment/moment.min.js"></script>
    <script src="include/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="include/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="include/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="include/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="include/dist/js/adminlte.js"></script>

  </body>
</html>

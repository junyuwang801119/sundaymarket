<?php

//require_once('../public/shared/conn_PDO.php');
//include_once('../public/shared/assist_admin_chklogin.php');
if( !isset($_SESSION) ){ session_start(); }

$page = '';
if( isset($_GET['page']) && $_GET['page']!='' ){ $page = $_GET['page']; }



?>



<!DOCTYPE html>
<html lang="zh-Hant-TW">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <title>後臺管理中心</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./include/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="./include/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./include/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./include/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker 日期選擇-->
    <link rel="stylesheet" href="./include/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote 編輯器-->
    <link rel="stylesheet" href="./include/plugins/summernote/summernote-bs4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./include/dist/css/adminlte.min.css">
 
  <!-- jQuery -->
      <script src="./include/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="./include/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="./include/plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="./include/plugins/moment/moment.min.js"></script>
      <script src="./include/plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="./include/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="./include/plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="./include/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="./include/dist/js/adminlte.js"></script>
      

   
     </head>
  
  <body class="hold-transition sidebar-mini layout-fixed bag">
    <div class="wrapper">
      <aside class="main-sidebar elevation-2 left-sidebar">


        <!-- Sidebar -->
        <div class="sidebar pt-5">
          <!-- Sidebar user panel (optional) -->
          <!--
<div class="user-panel mt-3 pb-3 mb-3 row justify-content-center align-items-end">
<div class="image col-12">
<img src="dist/img/user2-160x160.jpg" class="" alt="User Image">
</div>
<div class="info col-12">
<a href="#" class="d-block">Mark</a>
</div>
</div>
-->
          <div class="justify-content-center">

            <div class="thumbnail text-center">
              <img src="./include/dist/img/user2-160x160.jpg" alt="Marcel Newman" class="img-circle">
            </div><!-- /thumbnail -->
            <h3 class="text-center"><?php
          if( isset($_SESSION['user_name']) ){
            echo '歡迎'.$_SESSION['user_name'];
          }else{echo "請登入";}
          ?></h3>
            <br>
            <div class="text-center">
              <button type="button" class="btn btn-info mr-3" data-toggle="modal" data-target="#admin_member_modify">修改資料</button>
<!--              <button type="button" class="btn btn-secondary">登出</button>-->
              <a href="view/mem_logout.php" class="btn btn-secondary">登出</a>
              <a href="./Login_index.php" class="btn btn-secondary">登入</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <!--
<div class="form-inline">
<div class="input-group" data-widget="sidebar-search">
<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-sidebar">
<i class="fas fa-search fa-fw"></i>
</button>
</div>
</div>
</div>
-->

          <!-- Sidebar Menu -->
          <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="?page=admin_index" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    首頁
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=admin_news" class="nav-link">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                    最新消息
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              <li class="nav-item">
                <a href="?page=admin_order" class="nav-link">
                  <i class="nav-icon fas fa-align-justify"></i>
                  <p>
                    訂單管理
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=admin_commodity" class="nav-link">
                  <i class="nav-icon fas fa-inbox"></i>
                  <p>
                    商品管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=admin_member" class="nav-link">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>
                    會員管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="?page=admin_media" class="nav-link">
                  <i class="nav-icon fas fa-images"></i>
                  <p>
                    媒體庫
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              </li>
             
              
              <!--
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fas fa-table"></i>
<p>
其他
<i class="fas fa-angle-left right"></i>
</p>
</a>
</li>
-->
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
        <!-- Brand Logo -->
        <a href="../index.php" class="brand-link">
          <img src="" alt="" class="brand-image elevation-3" style="opacity: .8">
          <i class="fas fa-angle-left right"></i>
          <span class="brand-text ">回到 Sunday Market</span>
        </a>
      </aside>
      
<!-------------   右側內容替換區  ------------------->
    <div class="rightMain">

      <?php
      if( $page=='' ){
        echo '<h1>後台管理中心</h1>';
      }else{
        include('view/'.$page.'.php');
      }
      ?>



    </div>

           
          <!-----------------------modal_----------admin_member_modify------------------->
      <div class="modal fade" id="admin_member_modify" tabindex="-1" role="dialog" aria-labelledby="admin_member_modifyTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="admin_member_modifyTitle">修改會員資料</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 ">
                    <form style="width:100%;">
                      <div class="form-group row m-4">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">帳號等級:</label>
                        <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="管理員">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員帳號:</label>
                        <input type="text" class="form-control col-9  mt-2" id="formGroupExampleInput" placeholder="mark111@gmail.com">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">修改密碼:</label>
                        <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="******">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">確認密碼:</label>
                        <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="******">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員名稱:</label>
                        <input type="text" class="form-control col-9  mt-2" id="formGroupExampleInput" placeholder="Mark">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員性別:</label>
                        <div class="col-9 pt-2 mt-2">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">男</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">女</label>
                          </div>
                        </div>
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員電話:</label>
                        <input type="text" class="form-control col-9 mt-2" id="formGroupExampleInput" placeholder="0938138138">
                        <label for="formGroupExampleInput" class="col-3 pt-2 mt-2">會員地址:</label>
                        <input type="text" class="form-control col-9 mt-2 " id="formGroupExampleInput" placeholder="天堂市天堂路地獄巷十八層">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-danger" >清除資料</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">關閉視窗</button>
              <button type="button" class="btn btn-info">確認修改</button>
            </div>
          </div>
        </div>
      </div>
      <!-----------------------modal_end----------admin_member_modify------------------>   
        </div>

      
      </body>
    </html>

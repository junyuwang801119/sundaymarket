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
            <h3 class="text-center">Mark</h3>
            <br>
            <div class="text-center">
              <button type="button" class="btn btn-info mr-3" data-toggle="modal" data-target="#admin_member_modify">修改資料</button>
              <button type="button" class="btn btn-secondary">登出</button>
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
                <a href="admin_index.php" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    首頁
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_news.php" class="nav-link">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                    最新消息
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              <li class="nav-item">
                <a href="admin_order.php" class="nav-link">
                  <i class="nav-icon fas fa-align-justify"></i>
                  <p>
                    訂單管理
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_commodity.php" class="nav-link">
                  <i class="nav-icon fas fa-inbox"></i>
                  <p>
                    商品管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?m=admin_member" class="nav-link">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>
                    會員管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="admin_media.php" class="nav-link">
                  <i class="nav-icon fas fa-images"></i>
                  <p>
                    媒體庫
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?m=poster&a=show" class="nav-link">
                  <i class="nav-icon fas fa-images"></i>
                  <p>
                    廣告列表
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?m=poster&a=add" class="nav-link">
                  <i class="nav-icon fas fa-images"></i>
                  <p>
                    廣告添加
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
        <a href="index3.html" class="brand-link">
          <img src="" alt="" class="brand-image elevation-3" style="opacity: .8">
          <i class="fas fa-angle-left right"></i>
          <span class="brand-text ">回到 Sunday Market</span>
        </a>
      </aside>
      

           
      
        </div>

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

      </body>
    </html>

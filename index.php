<?php
require_once('public/shared/conn_PDO.php');
if( !isset($_SESSION) ){ session_start(); } 

$page = '';
if( isset($_GET['page'])&& !empty($_GET['page']) ){
  $page = $_GET['page'];
}


//if( isset($_SESSION['user_id'])){
//  $sql_str = "SELECT * FORM mem WHERE user_id = :user_id";
//  $stmt = $conn -> prepare($sql_str);
//  $user_id = $_SESSION['user_id'];
//  $stmt = bindParam(':user_id',$user_id);
//  $stmt ->execute();
//  $RS_mem= $stmt->fetch(PDO::FETCH_ASSOC);;
//}



?>


<!DOCTYPE html>
<html lang="zh-Hant-TW">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <title>Sunday Market</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="public/js/wow.js"></script>
    <link rel="stylesheet" href="public/css/animate.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/index_main.css">
    <link rel="stylesheet" href="public/css/header_responsive.css">
    
    <link href="public/js/slick-1.8.1/slick/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="public/js/slick-1.8.1/slick/slick.css">
    <script src="public/js/slick-1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="public/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="icon" 
          type="image/png" 
          href="public/image/sundaymarket_favicon.png">
    
    <script>
      new WOW().init();
 $(document).ready(function () {
    $('a.nav-link.dropdown-toggle').click(function() {
        location.href = this.href;
    });
});
    </script>


  <style>
    .navbar {
      padding-top: 10px;
    }

    .nav-item3 {
      margin-top: -15px;
    }

    .carousel-indicators li {
      width: 12px;
      height: 12px;
      border-radius: 100%;
      margin: 0 12px;
    }

    .list-container {
      margin-top: 80px;
      margin-bottom: 80px;
      margin-right: 120px;


    }

    .list-title {
      margin-top: 20px;

      margin-left: 150px;


    }
    
    .nav-item3 {
  background-color: #000000;
  width: 240px;
  padding-top: 25px;
  padding-bottom: 25px;
  padding-right: 60px;
  padding-left: 60px;
  margin-right: -20px;
  justify-content: center;

}

  </style>

  </head>

  <body>
    <div class="logo"><img src="public/image/LOGO.svg"></div>
    <div class="logo2"><a href="?page=index_content"><img src="public/image/LOGO_BK.svg"></a></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav col align-self-end" style="justify-content: flex-end">

          <li class="nav-item">
            <a class="nav-link" href="?page=about"><img src="public/image/about.svg"></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?page=news"><img src="public/image/news.svg"></a>
          </li>

          <li class="nav-item dropdown" style="position: unset">
            <a class="nav-link dropdown-toggle shop-link" href="?page=shop/shop" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="public/image/shop.svg">
            </a>
            <div class="navshop dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <div class="list-container">
                <div class="row">
                  <div class="col-3">
                    <div class="list-title">
                      <h2>Shop</h2>
                      <p>50%折扣區</p>
                      <p>熱銷商品</p>
                      <p>新品上架</p>
                      <p>免運出清</p>
                    </div>
                  </div>


<!--商品欄位分類選項-->
                  <div class="col-9">
                    <div class="row">
                      <div class="col-lg-4 col-md-3 col-sm-2">
                        <a class="shop-link" href="?page=shop/shop">
                          <div class="shopbox"><img src="public/image/navbar01.png"></div>
                        </a>

                      </div>
                      <div class="col-lg-4 col-md-3 col-sm-2">
                        <a class="shop-link" href="javascript:;">
                          <div class="shopbox"><img src="public/image/navbar02.png"></div>
                        </a>

                      </div>
                      <div class="col-lg-4 col-md-3 col-sm-2">
                        <a class="shop-link" href="?page=shop/shop_book">
                          <div class="shopbox"><img src="public/image/navbar03.png"></div>
                        </a>

                      </div>
                      <div class="col-lg-4 col-md-3 col-sm-2">
                        <a class="shop-link" href="?page=shop/shop_jewelry">
                          <div class="shopbox"><img src="public/image/navbar04.png"></div>
                        </a>

                      </div>
                      <div class="col-lg-4 col-md-3 col-sm-2">
                        <a class="shop-link" href="javascript:;">
                          <div class="shopbox"><img src="public/image/navbar05.png"></div>
                        </a>

                      </div>
                      <div class="col-lg-4 col-md-3 col-sm-2">
                        <a class="shop-link" href="javascript:;">
                          <div class="shopbox"><img src="public/image/navbar06.png"></div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </li>

         <li class="nav-item">
          <a class="nav-link contact" href="?page=contact"><img src="public/image/contact.svg"></a>
        </li>

        
        <li class="nav-item3 dropdown">
<!--          <a class="nav-link3 dropdown-toggle" data-target="#" href="?page=loginsignup" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="public/image/mamber_01.png"></a>-->
          <a class="nav-link3 dropdown-toggle" data-target="#" href="?page=loginsignup" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false"><img src="public/image/mamber_01.png"></a>
          
           <div class="navcontact dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="navcontact2 dropdown-item" href="?page=shop/cart">購物車</a>
            <a class="navcontact2 dropdown-item" href="?page=modify">會員修改</a>
            <div class="dropdown-divider"></div>
            <a class="navcontact2 dropdown-item" href="web/logout.php">登出</a>
          </div>

        </li>
<!--
       
        <li class="nav-item3 ">
          <a class="nav-link3 dropdown-toggle" href="?page=loginsignup" role="button"><img src="public/image/mamber_01.png"></a>
                    <a class="nav-link3 dropdown-toggle" href="?page=loginsignup3" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="public/image/mamber_01.png"></a>


        </li>
      
-->




      </ul>

    </div>

  </nav>

  <div class="main">



    <?php
      if( $page=='' ){
        include('web/index_content.php');
      }else{
        include('web/'.$page.'.php');
      }
      ?>



  </div>


    <div class="wrape">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="box1">
            <img src="public/image/foot_logo8.svg">
            <div class="word1">
              <h6>週日市集文化園區</h6>
              <p>100台北市中正區八德路一段1號</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="word2">
            <p>電話: (02)2358-1914</p>
            <p>傳真: (02)2358-1615</p>
          </div>
        </div>

        <div class="col-lg-5 col-md-4 col-sm-6">
          <div class="box2">
            <img src="public/image/FB.svg">
            <img src="public/image/Twitter.svg">
            <img src="public/image/IG.svg">
            <img src="public/image/YT.svg">
            <div class="word3">
              <p>Copyright © Sunday Market. All rights reserved.</p>
            </div>
          </div>

        </div>
      </div>
    </div>



  </body>
  </html>

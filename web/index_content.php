<?php
require_once('public/shared/conn_PDO.php');

if( !isset($_SESSION) ){ session_start(); }

//顯示熱門商品 -> 資料表:prod 
try{
  $sql_str = "SELECT prod_price,prod_name,prod_pic,is_hot,prod_id
              FROM prod
              ORDER BY prod_id DESC";
  
  $RS_prod = $conn -> query($sql_str);
}
catch ( PDOException $e ){
    die("Errpr!: ". $e->getMessage());
}

?>

<style>
  .wrapecarousel {
    padding-top: 80px;
  }

  .wrapesundayone {
    background-color: #fff79a;
    width: 100%;
    padding-top: 100px;
    padding-bottom: 60px;
  }

  .box555 {
    text-align: center;
    margin-bottom: 50px;
  }

  .box555 img {
    width: 80%;
    margin-bottom: 50px;
  }

  .box666 {
    text-align: center;
  }

  .box666 img {
    width: 60%;
    margin-bottom: 20px !important;
  }

  .footer_indexcontent01 {
    width: 100%;
    height: 80px;

  }
  
  .sundaywords h2{
    color: grey;
    font-size: 20px;
    
  }
  
  .sundaywords_content{
    margin-bottom: 100px;
    padding-right: 10px;
    font-size: 20px;
  }
  
  .sundaywords p{
    font-size: 20px;
  }
  
  .sundaywordswords{
    padding-top: 50px;
  }
  


</style>

<div class="wrapecarousel">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active wow fadeIn">
        <img src="public/image/cariusel_01.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item wow fadeIn">
        <img src="public/image/cariusel_02.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item wow fadeIn">
        <img src="public/image/cariusel_03.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="wrapetopic">
  <div class="container">
    <div class="topic wow fadeIn">
      <img src="public/image/topics.png">
    </div>
    <div class="row">

      <?php foreach( $RS_prod as $row_prod ){ 
                if( $row_prod['is_hot'] == 1 ){?>
      <div class="boxtopic wow fadeInUp col-lg-3 col-md-6 col-sm-6">

        <div class="box3">
          <?php echo '<img src="public/upload_img/'.$row_prod['prod_pic'].'">'; ?>

        </div>
        <h6>NT <?php echo $row_prod['prod_price']; ?></h6>
        <p><?php echo $row_prod['prod_name']; ?></p>

      </div>
      <?php } } ?>

    </div>
  </div>
</div>


<div class="anniecarousel">
  <div class="square"></div>
</div>




<div class="wrapetopic">
  <div class="container">
    <div class="topic wow fadeIn">
      <img src="public/image/timetable.png">
    </div>
    <div class="sundaywordswords row">
     <div class="col-md-7 col-sm-12 wow fadeInLeft">
        <div class="sundaywords">
           <div class="sundaywords_content"><p> 鄰近信義黃金商圈，分為生活市集、二手市集二種型態，提供文青展現自我創作的平台，眾多手作或應景的商品都充滿創意，來走走逛逛會了解現在正流行什麼，來市集也找得到品質不錯的二手衣物，價格卻不一定貴，有時有音樂表演，讓整體好感度更提升，是個文青味十足的假日市集。
</p></div>
       <p>地點：台北市信義區松勤街50號 （信義區公民會館四四南村）</p>
<p>擺攤時間：每月第二和第四個週六13:00- 19:00</p>


        </div>

      </div>
      <div class="col-md-5 col-sm-12 wow fadeInRight">
        <div class="box3"><img src="public/image/index_picture.png"></div>
      </div>

    </div>
  </div>
</div>







<div class="wrapesundayone">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-12 wow fadeInLeft">
        <div class="box555">
          <img src="public/image/index001.png">
          <div class="box666"><img src="public/image/index001-1.png">
            <p>販賣超過百萬件獨特商品</p>
            <p>透過好設計實現心中的理想生活</p>
          </div>
        </div>

      </div>
      <div class="col-md-4 col-sm-12 wow fadeInDown">
        <div class="box555">
          <img src="public/image/index002.png">
          <div class="box666"><img src="public/image/index002-2.png">
            <p>專業工程團隊時時把關</p>
            <p>保障你的個資安全</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12 wow fadeInRight">
        <div class="box555">
          <img src="public/image/index003.png">
          <div class="box666"><img src="public/image/index003-3.png">
            <p>市集鄰近各大捷運站與藝術園區</p>
            <p>交通方便安全有保障</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="footer_indexcontent">
  <div class="footer_indexcontent01"></div>

</div>

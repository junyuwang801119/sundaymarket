<link rel="stylesheet" href="public/css/about.css">
<link rel="stylesheet" href="public/css/owl.carousel.min.css">

<script src="public/js/owl.carousel.min.js"></script>

<!---->

<script>
  new WOW().init();
  /****************頭像輪播*********/
  $(document).ready(function() {
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      responsiveClass: true,
      responsive: {
        400: {
          items: 3,
        },
        600: {
          items: 4,
        },

        800: {
          items: 5,
        },

        1000: {
          items: 6,
        },
        1200: {
          items: 7,
          loop: false
        }

      }
    })

  });

</script>



<section id="sec1">

  <img class="wow animate__animated animate__fadeIn animate__fast" src="public/image/about/aboutbanner.png">

</section>



<section id="sec2">
  <div class="row">
    <div class="col-12 col-md-6 px-auto">
      <h2 class="wow animate__animated animate__fadeInLeft">About</h2>
      <p class="wow animate__animated animate__fadeInLeft animate__delay-0.5s"> Sunday Market是台灣規模最大、唯一結合線上與線下的二手市集平台。讓所有家中閒置物品或是任何想要分享出來的寶貝能立即出現在我們日流量破萬的二手物品交易網站。並且我們於每週日都有在全台不同縣市舉辦跳蚤市場集會讓賣家擺攤與民眾互動交流，自2015年以來已成為許多人假日必逛的去處，不僅僅是交易市集，更聚集了各種藝文活動與街頭表演，演變為每月地方盛會。
        <br><br>
        &nbsp &nbsp &nbsp &nbsp 有了Sunday Market的幫助，你擁有回憶的每樣物品不應躲在角落或在垃圾桶安息，你知道它們將發揮最大價值擁有第2次生命。同時當你在考慮尋找新歡時，先來看看吧，你或許將發現意想不到的寶藏。
      </p>

    </div>
    <div class="aboutimg col-12 col-md-6">
      <img class="wow animate__animated animate__fadeIn animate__fast" src="public/image/about/mkt9.jpg">
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-md-6">
      <h2 class="wow animate__animated animate__fadeInRight">Story</h2>
      <p class="wow animate__animated animate__fadeInRight animate__delay-0.5s">2009年，一群好友從澳洲打工度假歸來，聚會時回憶起在澳洲的所見所聞，不約而同地回想起當地每週日人聲鼎沸的跳蚤市場。一切充滿著活力，喧鬧中又可以感受到濃厚的人文氣息。各路人馬前來尋寶的、討生活的或僅僅只是遊客都可以穿梭在市場的舊物堆中發現令自己注目的人事物。
        <br><br>
        &nbsp &nbsp &nbsp &nbsp那台灣呢?我們有沒有辦法把這樣的景象帶到台灣? 因此2010年Sunday Market從只是想法一步步成為了現在的真實。
      </p>
    </div>
    <div class="aboutimg col-12 col-md-6">
      <img class="wow animate__animated animate__fadeIn animate__fast" src="public/image/about/mkt8.jpg">
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-6">
      <h2 class="wow animate__animated animate__fadeInLeft">Come & Join</h2>
      <p class="wow animate__animated animate__fadeInLeft animate__delay-0.5s">
        我們平台的交易量及週日活動每年不斷成長，平台上目前已有10幾萬的賣家進駐，每場市集活動平均也有近千個攤位。你只要帶著你的寶貝們出現，其他我們都可以協助辦理。<br><br>
        &nbsp &nbsp &nbsp &nbsp
        我們一直努力讓所有的二手物品都能夠以最快速簡單的方式呈現到大家面前，希望有相同理念的你能夠一同參與，若有參加活動的需求或疑問，歡迎與我們聯繫。
      </p>
    </div>
    <div class="aboutimg col-12 col-md-6">
      <img class="wow animate__animated animate__fadeIn animate__fast" src="public/image/about/mkt14.jpg">
    </div>
  </div>

</section>






<section id="sec3">
  <div class="container-fluid">
    <div class="team">
      <img class="title animate__animated animate__fadeIn animate__delay-0.5s" src="public/image/about/team.svg" alt="">
      <p>我們的團隊</p>
    </div>
    <div class="row">
      <div class="owl-carousel">
        <div class="item"> <img src="public/image/about/face/Mark.png">
          <h3>Mark</h3>
          <p>後台介面</p>
        </div>
        <div class="item"> <img src="public/image/about/face/sunnie.png">
          <h3>Sunnie</h3>
          <p>後端資料庫、串接</p>
        </div>
        <div class="item"> <img src="public/image/about/face/Nina.png">
          <h3>Nina</h3>
          <p>主視覺設計</p>
        </div>
        <div class="item"> <img src="public/image/about/face/Annie.png">
          <h3>Annie</h3>
          <p>網頁前端</p>
        </div>
        <div class="item"> <img src="public/image/about/face/Angela.png">
          <h3>Angela</h3>
          <p>網頁前端</p>
        </div>
        <div class="item"> <img src="public/image/about/face/joy.png">
          <h3>Joy</h3>
          <p>網頁前端</p>
        </div>
        <div class="item"> <img src="public/image/about/face/Lingo.png">
          <h3>Lingo</h3>
          <p>網頁前端</p>
        </div>

      </div>
    </div>
  </div>
</section>

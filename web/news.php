<?php
require_once('public/shared/conn_PDO.php');

//if( !isset($_SESSION) ){ session_start(); }

try{
  $sql_str = "SELECT * FROM news
              ORDER BY news_id DESC";

  $RS_news = $conn -> query($sql_str);
}
catch ( PDOException $e ){
  die("Errpr!: ". $e->getMessage());
}

?>

<link rel="stylesheet" type="text/css" href="public/css/news.css">


<script>
  $(document).ready(function(){
    $('.slider-top').slick({
      dots:true,
      vertical: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay:true,
      autoplaySpeed:2000,

    });
  });

  $(document).ready(function(){

     $("#close").click(function(){
      console.log ("@@@@@@@@@@@@@@@@");
      $("#showPhoto,#maskArea").fadeOut(300);
    });
    
    $("#maskArea").click(function(){
      console.log ("@@@@@@@@@@@@@@@@");
      $("#showPhoto,#maskArea").fadeOut(300);
    });
    
    $(".content_s1").click(function(){
      var news_id = $(this).attr('data-id');  //取得點擊的news id
      var url = "./web/new_show.php?news_id="+news_id;

      //      console.log (news_id)+'\n'+ url;
            console.log (url);

      $.get( url,function(data){
        $('#maskArea #showPhoto_info').html(data);
        $("#showPhoto,#maskArea").fadeIn(300);
      });
      console.log ("****************");
    });

   


  });

</script>


<div class="slider-top">
  <div style="background-image: url(public/img_news/slik_1.jpg)"></div>
  <div style="background-image: url(public/img_news/slik_2.jpg)"></div>
  <div style="background-image: url(public/img_news/slik_3.jpeg)"></div>
  <div style="background-image: url(public/img_news/slik_4.jpg)"></div>
  <div style="background-image: url(public/img_news/slik_5.jpg)"></div>
  <div style="background-image: url(public/img_news/slik_6.png)"></div>


</div>

<div id="news1" style="background-image: url(public/img_news/news1.png);width: 224px;height:98px;margin:auto;dispaly:block"></div>


<div class="news_content">

  <div class="news_block_s">
    <?php foreach( $RS_news as $row_new ){
  if( $row_new['news_focus'] == 0 && $row_new['news_show'] == 1){  ?>

    <div class="news_ditel">
      <div class="content_s1" style="background-image: url(public/img_news/<?php echo $row_new['news_pic'] ;?>)" 
          data-id="<?php echo $row_new['news_id'];?>">
      </div> 


      <div class="h5" ><?php echo $row_new['news_title'];?></div>
      <div class="news_texts_s" value='<?php echo $row_new['news_content'];?>'><?php echo  mb_substr($row_new['news_content'],0,55,'utf-8');?></div>
    </div>
    <?php } } ?>

  </div>
</div>





<div id="maskArea">

  <div id="showPhoto">
   <div id="close" style="background-image: url(public/img_news/close.svg)"></div>
    <div id="showPhoto_info" ></div>
    
  </div>
</div>


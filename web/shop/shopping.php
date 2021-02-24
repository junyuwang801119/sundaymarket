<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="UTF-8">
  <title>Sunday Market</title>
  <style>
   

*{padding: 0;margin: 0;box-sizing: border-box}
   
    .bigform{width: 60%;height: auto; margin: auto;}
  
    .shopping_info{width: 426px;height: 100px;background-size: contain;margin: 100px auto 20px auto;background-repeat: no-repeat}
    
    .logo {top: 0;}

    .detform{padding: 35px;}
  
    .mem_name{width: 49.5%;height: 30px;margin-bottom: 20px;}
    .phone{width: 49.5%;height: 30px;}
    
.dress{width: 49.5%;height: 30px;margin-bottom: 20px;}
.area{width: 49.5%;height: 30px;}
.det_dress{width: 99.5%;height: 30px;margin-bottom: 20px;}
.e-mail{width: 99.5%;height: 30px;margin-bottom: 20px;}
p{margin-bottom: 10px;font-size: 0.8em;color: #333}

.line {width: 100%;height: 1px;background-color: #afafaf;margin: 30px 0 50px 0;}

.shop{width: 40%;height: 27px}

.cash{margin: 15px 0;}

.sel{width:30%;height: 30px;background-color: white}

.confirm{margin: 20px 0 0 0;font-size: 0.8em;color: #666}

.buts{display: flex;justify-content: space-between;}

.prev {width: 30%;height: 40px;margin: 30px 0;background-color: black;color: white;text-decoration: none;text-align: center;line-height: 40px}

.prev:hover {background-color: #fff100;color: black;text-decoration: none;margin-bottom: 70px}

.finish{width: 30%;height: 40px;margin: 30px 0 70px 0;background-color: black;color: white;text-decoration: none;text-align: center;line-height: 40px}

.finish:hover {background-color: #fff100;color: black;text-decoration: none;}


@media (max-width: 768px){
  
  .bigform{width: 80%;height: auto; margin: auto;}
  
  .mem_name,.dress,.phone,.area{width: 100%} 
  
  .det_dress{margin-top: 20px}
  
  p{margin-top: 10px}
  
 .finish,.prev{font-size: 0.8em}
  
  
}
  </style>
  
  </head>
<body>
  <header>
  </header>
   <div class="shopping_info" style="background-image: url(public/img_shop/info1.png)"></div>
  <div class="bigform">

  <form class="detform">
  
  <P>填寫訂購人資訊</P>
   <P>姓名</P><input class="mem_name" name="" placeholder="您的姓名" value=""> 
   <input class="phone" name="" placeholder="您的電話" value=""> 
   <P>地址</P>
    <select class="dress" name="">
    <option value="" selected>(台灣及離島)</option>
    <option value="台北市">台北市</option>
    <option value="新北市" >新北市</option>
    <option value="基隆市">基隆市</option>
    <option value="宜蘭縣">宜蘭縣</option>
    <option value="新竹市">新竹市</option>
    <option value="新竹縣">新竹縣</option>
    <option value="苗栗縣">苗栗縣</option>
    <option value="台中市">台中市</option>
    <option value="彰化縣">彰化縣</option>
    <option value="南投縣">南投縣</option>
    <option value="嘉義縣">嘉義縣</option>
    <option value="台南市">台南市</option>
    <option value="高雄市">高雄市</option>
     <option value="屏東市">屏東市</option>
     <option value="台東縣">台東縣</option>
     <option value="澎湖縣">澎湖縣</option>
     <option value="花蓮縣">花蓮縣</option>
     <option value="金門縣">金門縣</option>
     <option value="連江縣">連江縣</option>
</select>
   <select class="area" name="">
    <option value="台北市" selected></option>
    <option value="100 中正區">100 中正區</option>
    <option value="103 大同區">103 大同區</option>
    <option value="104 中山區">104 中山區</option>
    <option value="105 松山區">105 松山區</option>
    <option value="106 大安區">106 大安區</option>
    <option value="108 萬華區">108 萬華區</option>
    <option value="110 信義區">110 信義區</option>
    <option value="111 士林區">111 士林區</option>
    <option value="112 北投區">112 北投區</option>
    <option value="114 內湖區">114 內湖區</option>
    <option value="115 南港區">115 南港區</option>
    <option value="116 文山區">116 文山區</option>
    </select>
    <input class="det_dress" name="" placeholder="詳細地址" value=""> 
    
    <P>e-mail</P>
    <input class="e-mail" name="" placeholder="您的電子信箱" value=""> 
    <div class="line"></div>
    <p>付款方式</p>
    <input type="radio" name="money" value=""> 信用卡線上刷卡<br>
     <input class="cash"type="radio" name="money" value=""> 貨到付款（宅配）<br>
      <input type="radio" name="money" value="" checked="true"> 貨到付款（超商）
      
    <select class="shop" name="">
    <option value="">7-11取貨付款</option>
     <option value="">全家取貨付款</option>
      <option value="">萊爾富取貨付款</option>
       <option value="">ＯＫ超商取貨付款</option>
        </select>
       
       <button class="sel"type="button">選擇門市</button>
     <div class="confirm">※下單前請再次確認您的購買明細及配送資訊，訂單成立後無法異動訂單內容</div>
    </form>
    <div class="buts">
    <a href="?page=shop/shop" class="prev">重新選購</a>
    <a href="?page=shop/shop" class="finish">完成訂購！</a>
    </div>
    </div>
</body>
</html>
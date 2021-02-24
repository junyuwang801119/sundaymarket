<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sunday Market</title>

	<script src="public/js/jquery-3.4.1.min.js"></script>
	<script src="public/js/slick-1.8.1/slick/slick.js"></script>
	
	<!-- <link rel="stylesheet" href="public/css/reset.css"> -->
	<link rel="stylesheet" href="public/js/slick-1.8.1/slick/slick.css">
	<link rel="stylesheet" href="public/js/slick-1.8.1/slick/slick-theme.css">
	<link rel="stylesheet" href="public/css/shop.css">
	
	<script>
		$(document).ready(function(){

			// ---------- 首圖 Slider ----------

			$('.autoplay').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
				dots: true
			});

			// ---------- backTop 回到頂端 ----------

			$('.backTop').click(function(){
					$('html,body').animate({scrollTop: 0}, 1000);
			});

			// ---------- productBox 顯示/關閉 ----------

			$('.buy').click(function(){
				$('.productBox').removeClass('hideBox');
			});

			$('.closeBtn').click(function(){
			  $('.productBox').addClass('hideBox');
			});

			$('.addCart').click(function(){
				$('.productBox').addClass('hideBox');
			});

		});
	</script>

</head>

<body>

	<header>
		<nav></nav>
	</header>

	<section>

		<div class="sliderBlock">
			<div class="sliderShop autoplay">
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1558769132-cb1aea458c5e?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1334&q=80);"></div>
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1556905055-8f358a7a47b2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80);"></div>
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80);"></div>
			</div>
		</div>

		<div class="shopLogo"><img src="public/img_shop/shoptitle.png" alt=""></div>
		
		<div class="shopNav">
			<ul class="shopClass">
				<li class=""><a href="?page=shop/shop">服飾</a></li>
				<li class=""><a href="?page=shop/shop_book">書籍</a></li>
				<li class=""><a href="?page=shop/shop_jewelry">飾品</a></li>
				<li class=""><a href="javascript:;">電器</a></li>
				<li class=""><a href="javascript:;">鞋子</a></li>
				<li class=""><a href="javascript:;">其他</a></li>
			</ul>
			<div class="searchbar">
				<div class="frame">
					<img src="public/img_shop/search.svg" alt="">
					<input type="search" placeholder="search">
				</div>
			</div>
		</div>

		<div class="products">
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1530286910461-6a1960d1e83a?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjN8fHRzaGlydHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">動物農場 tshirt</div>
					<div class="price">NT. 300</div>
				</div>
			</div>
			
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1527719327859-c6ce80353573?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NHx8dHNoaXJ0fGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">Outcast tshirt</div>
					<div class="price">NT. 300</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1529374255404-311a2a4f1fd9?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mnx8dHNoaXJ0fGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">(HOTEL) tshirt</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1522706604291-210a56c3b376?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NXx8dHNoaXJ0fGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">設下標籤 tshirt</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1521498542256-5aeb47ba2b36?ixid=MXwxMjA3fDB8MHxzZWFyY2h8N3x8dHNoaXJ0fGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">tealer tshirt</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1484517186945-df8151a1a871?ixid=MXwxMjA3fDB8MHxzZWFyY2h8OHx8dHNoaXJ0fGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">骰子條紋 tshirt</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1519722417352-7d6959729417?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTJ8fHRzaGlydHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">龍印黑 tshirt</div>
					<div class="price">NT. 300</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1542594452-cd83273a8f20?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTd8fHRzaGlydHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">NYC tshirt</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1564584217132-2271feaeb3c5?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzN8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">灰色純棉 tshirt</div>
					<div class="price">NT. 100</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1532296075534-cc428d395281?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mzh8fHRzaGlydHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">我只想吃鬆餅 tshirt</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1523585298601-d46ae038d7d3?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTY2fHx0c2hpcnR8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">滑板人 tshirt</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1468283268201-f31115a19e2d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8OTZ8fHRzaGlydHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">粉色卡通死神 tshirt</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1527534156596-5ba1e6d5f017?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTAzfHx0c2hpcnR8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">你對什麼上癮呢 tshirt</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1528905895600-30137e04d936?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTA5fHx0c2hpcnR8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">選擇去愛 tshirt</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1533093956822-2d1e53d1340d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTIzfHx0c2hpcnR8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">夠有名了 tshirt</div>
					<div class="price">NT. 500</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1596033389783-d31ed0c54440?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTQ0fHx0c2hpcnR8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">HardRock tshirt</div>
					<div class="price">NT. 200</div>
				</div>
			</div>

		</div>
		<div class="pages">
			<a href="?page=shop/shop"><div class="page">1</div></a>
			<a href="?page=shop/shop_2"><div class="page">2</div></a>
			<!-- <a href="javascript:;"><div class="page">3</div></a> -->
			<a href="javascript:;"><div class="nextArrow">＞</div></a>
			<a href="javascript:;"><div class="nextBtn">NEXT</div></a>
		</div>
		<div class="backTop">
				<p>↑</p>
				<p>Top</p>
		</div>


		<div class="productBox hideBox">
			<div class="closeBtn"><img src="public/img_shop/close.svg" alt=""></div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1530286910461-6a1960d1e83a?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjN8fHRzaGlydHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
				</div>
				<div class="description">
					<div class="name"><p>動物農場 tshirt</p></div>
					<div class="price"><p>NT. 300</p></div>
					<hr>
					<div class="content">
						<p>
							俏皮的螢光粉色塗鴉，搭配中英日文的動物農場字樣的設計tshirt<br>
							<br>
							成分 | 棉 100%<br>
							產地 | 台灣<br>
						</p>
					</div>
					<input class="addCart" type="submit" class="btn submit" onclick="javascript:location.href='?page=shop/cart'" value="加入購物車">
				</div>
			</div>

		</div>

	</section>
	
</body>

</html>
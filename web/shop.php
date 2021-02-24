<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sunday Market</title>
	
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/slick-1.8.1/slick/slick.js"></script>

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="js/slick-1.8.1/slick/slick.css">
	<link rel="stylesheet" href="js/slick-1.8.1/slick/slick-theme.css">
	<link rel="stylesheet" href="public/css/shop.css">

	<script>
		$(document).ready(function(){

			// ---------- 首圖 Slider ----------

			$('.autoplay').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 4000,
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
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1503342452485-86b7f54527ef?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80);"></div>
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1558769132-cb1aea458c5e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1334&q=80);"></div>
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80);"></div>
			</div>
		</div>

		<div class="shopLogo"><img src="img/shoptitle.png" alt=""></div>
		
		<div class="shopNav">
			<ul class="shopClass">
				<li class=""><a href="shop.html">服飾</a></li>
				<li class=""><a href="shop_book.html">書籍</a></li>
				<li class=""><a href="shop_jewelry.html">飾品</a></li>
				<li class=""><a href="javascript:;">電器</a></li>
				<li class=""><a href="javascript:;">鞋子</a></li>
				<li class=""><a href="javascript:;">其他</a></li>
			</ul>
			<div class="searchbar">
				<div class="frame">
					<img src="img/search.svg" alt="">
					<input type="search" placeholder="search">
				</div>
			</div>
		</div>

		<div class="products">
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1543076447-215ad9ba6923?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTd8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">毛領牛仔外套</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1554568218-0f1715e72254?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mjd8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">森林白tshirt</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1573766713733-18f875c7892d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mjh8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">法藍絨格紋襯衫</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1503341504253-dff4815485f1?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDN8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">骷髏比Ya tshirt</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1571455786673-9d9d6c194f90?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Njl8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">純色純棉tshirt</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1564859228273-274232fdb516?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NzV8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">手繪海灘白tshirt</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1520591799316-6b30425429aa?ixid=MXwxMjA3fDB8MHxzZWFyY2h8ODB8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">愛會拯救我們長t</div>
					<div class="price">NT. 500</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1603217040830-34473db521a2?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjE0fHxjbG90aGVzfGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">一字領短版白tshirt</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1536992266094-82847e1fd431?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTF8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">蘋果綠編織毛衣</div>
					<div class="price">NT. 300</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1610659774000-a08ba21ffc95?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">單寧牛仔襯衫</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1589359096049-85292b87bf51?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=668&q=80);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">短版羅紋t</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1576259776048-9e02d3fa9417?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">海軍藍白條紋短褲</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1565567429580-b67e05bc0329?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDIxfHxjbG90aGluZ3xlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">GOLF彩字黑tshirt</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1596285698718-311a6e06bf2f?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDIyfHxjbG90aGluZ3xlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">絲質米色細肩帶背心</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTB8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">米色編織披肩</div>
					<div class="price">NT. 300</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1485230895905-ec40ba36b9bc?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzJ8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="img/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">番茄湯大學t</div>
					<div class="price">NT. 200</div>
				</div>
			</div>

		</div>
		<div class="pages">
			<a href="shop.html"><div class="page">1</div></a>
			<a href="shop_2.html"><div class="page">2</div></a>
			<!-- <a href="javascript:;"><div class="page">3</div></a> -->
			<a href="shop_2.html"><div class="nextArrow">＞</div></a>
			<a href="shop_2.html"><div class="nextBtn">NEXT</div></a>
		</div>
		<div class="backTop">
				<p>↑</p>
				<p>Top</p>
		</div>


		<div class="productBox hideBox">
			<div class="closeBtn"><img src="img/close.svg" alt=""></div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1543076447-215ad9ba6923?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTd8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
				</div>
				<div class="description">
					<div class="name"><p>毛領牛仔外套</p></div>
					<div class="price"><p>NT. 400</p></div>
					<hr>
					<div class="content">
						<p>
							復古毛領牛仔外套，水洗藍，內裡鋪毛，保短百搭。<br>
							<br>
							成分 | 人造絲 10% 棉 60% 尼龍 20%<br>
							產地 | 台灣<br>
						</p>
					</div>
					<input class="addCart" type="submit" class="btn submit" onclick="javascript:location.href='cart.html'" value="加入購物車">
				</div>
			</div>

		</div>

	</section>
	
</body>

</html>
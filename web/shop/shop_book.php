<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sunday Market</title>

	<script src="public/js/jquery-3.4.1.min.js"></script>
	<script src="public/js/slick-1.8.1/slick/slick.js"></script>
	
	<!-- <link rel="stylesheet" href="css/reset.css"> -->
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
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1509057199576-632a47484ece?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1502&q=80);"></div>
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1474366521946-c3d4b507abf2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80);"></div>
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1526243741027-444d633d7365?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1502&q=80);"></div>
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
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-1.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">沒有聲音的女人們</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-2.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">純潔國度</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-3.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">雖然想死但還是想吃辣炒年糕2</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-4.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">雖然想死但還是想吃辣炒年糕</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-5.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">正常人</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-6.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">沼澤女孩</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-7.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">也許你應該找人聊聊</div>
					<div class="price">NT. 500</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-8.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">女神自助餐</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-9.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">尋琴者</div>
					<div class="price">NT. 300</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-10.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">我所討厭過的大人們</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-11.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">正午惡魔</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-12.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">可是我偏偏不喜歡</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-13.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">愛的不久時</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">使女的故事（套書）</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-15.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">房思琪的初戀樂園</div>
					<div class="price">NT. 300</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-16.jpg);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">感覺有點奢侈的事</div>
					<div class="price">NT. 200</div>
				</div>
			</div>

		</div>
		<div class="pages">
			<a href="javascript:;"><div class="page">1</div></a>
			<!-- <a href="javascript:;"><div class="page">2</div></a> -->
			<!-- <a href="javascript:;"><div class="page">3</div></a> -->
			<!-- <a href="javascript:;"><div class="nextArrow">＞</div></a> -->
			<!-- <a href="javascript:;"><div class="nextBtn">NEXT</div></a> -->
		</div>
		<div class="backTop">
				<p>↑</p>
				<p>Top</p>
		</div>


		<div class="productBox hideBox">
			<div class="closeBtn"><img src="public/img_shop/close.svg" alt=""></div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(public/img_shop/book/getImage-1.jpg);"></div>
				</div>
				<div class="description">
					<div class="name"><p>沒有聲音的女人們</p></div>
					<div class="price"><p>NT. 200</p></div>
					<hr>
					<div class="content">
						<p>
							　「這根本是《使女的故事》在眼前發生。居然出自真實事件！別錯過這本小說！」──瑪格麗特‧愛特伍<br>
							<br>
							★「#MeToo」運動浪潮中最重要的一本小說。<br>
							★「意外」奧斯卡影后法蘭西絲‧麥朵曼買下電影版權，即將搬上大銀幕。<br>
						</p>
					</div>
					<input class="addCart" type="submit" class="btn submit" onclick="javascript:location.href='?page=shop/cart_book'" value="加入購物車">
				</div>
			</div>

		</div>

	</section>
	
</body>

</html>
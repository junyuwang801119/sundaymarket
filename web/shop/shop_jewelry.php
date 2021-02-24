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
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1531995811006-35cb42e1a022?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80);"></div>
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1490915785914-0af2806c22b6?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1500&q=80);"></div>
				<div class="sliderPic" style="background-image: url(https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80);"></div>
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
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1531995811006-35cb42e1a022?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8amV3ZWxyeXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">純鋼鎖骨鍊</div>
					<div class="price">NT. 800</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1584302179602-e4c3d3fd629d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mnx8amV3ZWxyeXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">三入組簡約k金戒指</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1599459183200-59c7687a0275?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NHx8amV3ZWxyeXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">永恆真愛雙入項鍊</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1543294001-f7cd5d7fb516?ixid=MXwxMjA3fDB8MHxzZWFyY2h8OHx8amV3ZWxyeXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">水鑽拇指戒</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1566977744263-79e677f4e7cf?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTR8fGpld2Vscnl8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">k金姓名戒</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1535556116002-6281ff3e9f36?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTh8fGpld2Vscnl8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">一雙四圓耳鉤</div>
					<div class="price">NT. 400</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1611652022419-a9419f74343d?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjB8fGpld2Vscnl8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">愛會拯救我們鎖骨鍊</div>
					<div class="price">NT. 500</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1514612497953-05d1e5e171fa?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mjh8fGpld2Vscnl8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">水鑽戒</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1603561596112-0a132b757442?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzJ8fGpld2Vscnl8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">粉紅水晶復古戒指</div>
					<div class="price">NT. 300</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1611085583191-a3b181a88401?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mzd8fGpld2Vscnl8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">簡約長款項鍊</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1610695049917-d21679d7d593?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDF8fGpld2Vscnl8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">鏈條造型項鍊</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1575863440543-93bd822f10f3?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Njl8fGpld2Vscnl8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">尖錐項鍊</div>
					<div class="price">NT. 200</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1601752520895-66e251a04353?ixid=MXwxMjA3fDB8MHxzZWFyY2h8OTd8fGpld2Vscnl8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">晚宴綠扇貝造型項鍊</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1613470121497-3909c0fa23f4?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTI3fHxqZXdlbHJ5fGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">簡約珍珠耳環</div>
					<div class="price">NT. 150</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1588575788949-dc6e8d9f76c9?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTY0fHxqZXdlbHJ5fGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">黃水晶復古項鍊</div>
					<div class="price">NT. 300</div>
				</div>
			</div>
			<div class="item">
				<div class="frame">
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1608543837489-0fab463c925e?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTczfHxqZXdlbHJ5fGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
					<a href="javascript:;">
						<div class="buy">
							<img src="public/img_shop/basket4.svg" alt="">
						</div>
					</a>
				</div>
				<div class="description">
					<div class="name">三入組簡約手環</div>
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
					<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1531995811006-35cb42e1a022?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8amV3ZWxyeXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
				</div>
				<div class="description">
					<div class="name"><p>純鋼鎖骨鍊</p></div>
					<div class="price"><p>NT. 800</p></div>
					<hr>
					<div class="content">
						<p>
							簡約純鋼鎖骨項鍊，雙項鍊式，層次豐富。<br>
							<br>
							成分 | 鋼100%<br>
							產地 | 台灣<br>
						</p>
					</div>
					<input class="addCart" type="submit" class="btn submit" onclick="javascript:location.href='?page=shop/cart_jewelry'" value="加入購物車">
				</div>
			</div>

		</div>

	</section>
	
</body>

</html>
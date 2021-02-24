<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sunday Market</title>
		<!-- <link rel="stylesheet" href="public/css/reset.css"> -->
		<link rel="stylesheet" href="public/css/cart.css">
		<script src="public/js/jquery-3.4.1.min.js"></script>

		<script>
			$(document).ready(function(){

				// ---------- 刪除購物車商品 ----------

				$('.delete_btn').click(function(){
					$(this).parent('.item').remove();

					var item = document.getElementsByClassName('item').length;
					console.log(item);
					if(item==0){
						$('.check_all_block').remove();
					};

				});

				// ---------- 購物車加減數量按鈕 方法1 ----------

				//獲得文字框物件
				var t = $('#countnum');
				// console.log(t.val());
				//初始化數量為1,並失效減
				$('.minus').attr('disabled',true);


				function amount_calc(){
					//----- 物品金額x數量=總金額-----
					// 按＋的時候 金額 與 總金額 變動
					var ap =  $('#amount_price');
						// console.log(ap.text());
					var amt = t.val()*ap.text();
					console.log(amt);

					$('#total_price').html(amt);
					$('#final_price').html(amt+70);
				};


				//數量增加操作
				$('.plus').click(function(){ 
					// 給獲取的val加上絕對值，避免出現負數
					t.val(Math.abs(parseInt(t.val()))+1);

					if (parseInt(t.val())!=1){
						$('.minus').attr('disabled',false);
					};

					amount_calc();

				}); 

				//數量減少操作
				$('.minus').click(function(){
					t.val(Math.abs(parseInt(t.val()))-1);

					if (parseInt(t.val())==1){
						$('.minus').attr('disabled',true);
						};

					amount_calc();

				});


			});

		</script>

	</head>
	<body>
			<header></header>
			<section>
				<div class="container">
					<div class="title">購物車</div>

					<div class="cart_content">

						<div class="itemGroup">

							<div class="item">
								<div class="delete_btn">
									<a href="javascript:;">
										<img class="closebtn" src="public/img_shop/close1.svg" alt="">
									</a>
								</div>
								<div class="item_left">
									<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1531995811006-35cb42e1a022?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8amV3ZWxyeXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
									<div class="product_name">純鋼鎖骨鍊</div>
								</div>
								<div class="item_right">
									<div class="count">
										<input class="btn minus" name="" type="button" value="－"/>
											<input id="countnum" name="" type="text" value="1"/>
										<input class="btn plus" name="" type="button" value="＋"/>
									</div>
									<div class="item_price"><p>$<span id="amount_price">800</span></p></div>
								</div>
							</div>

						</div>

						<div class="total_detail">
							<div class="total_frame">
								<div class="total_product">共 <span>1</span> 件商品</div>
								<div class="total_price"><span>金額</span><span>$<span id="total_price">800</span></span></div>
							</div>
							<div class="shipping"><span>運費</span><span>$70</span></div>
							<div class="discount"><span>折扣</span><span>$0</span></div>
							<hr>
							<div class="final_price"><span>小計</span><span class="price">$<span id="final_price">870</span></span></div>
							<div class="button">
								<input type="button" class="btn keepShooping" onclick="javascript:location.href='?page=shop/shop'" value="繼續購物">
								<input type="submit" class="btn submit" onclick="javascript:location.href='?page=shop/shopping'" value="填寫資訊">
						</div>
				</div>
				</div>
		</div>
		</section>
	<!-- <footer></footer> -->
</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/cart.css">
		<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=uAguKmfUxz4kQa7ljSlSzzkv8UqVtDOAvTaH_QvV0gHPrOD61uezUHkvIvsp-S4bNShZAwQ2IxfKOcWgEsXpY0Q-LXiPlUtsnEbJm2yBJKI4AhCFh_tnu-NJm0gHG54j2G0VMmVDXvas313V0kM4vrxnxfzTanpEm8TOqHaFcOtjuR1zSthY9htz9YCERrElguRNHsZHdj_-b-7kGeuK5MZ1SlwfHxpISvLcCSDWcuNJTsuo9ez25pZbTR1UWKWmLXWxPXfzn-Gu1kDEtW_FC-pzaXwR5qnwdDo6gpU8X7rfc8ASTAtNlgqjxRai7iHu-Rcu4tFG57BlpqKDDUHcxg" charset="UTF-8"></script><script src="js/jquery-3.4.1.min.js"></script>

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
				console.log(t.val());
				//初始化數量為1,並失效減
				$('.minus').attr('disabled',true);

				//數量增加操作
				$('.plus').click(function(){ 
					// 給獲取的val加上絕對值，避免出現負數
					t.val(Math.abs(parseInt(t.val()))+1);

					if (parseInt(t.val())!=1){
						$('.minus').attr('disabled',false);
					};
				}); 

				//數量減少操作
				$('.minus').click(function(){
					t.val(Math.abs(parseInt(t.val()))-1);

					if (parseInt(t.val())==1){
						$('.minus').attr('disabled',true);
						};
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
										<img src="img/close1.svg" alt="">
									</a>
								</div>
								<div class="item_left">
									<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1564859228273-274232fdb516?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NzV8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
									<div class="product_name">手繪海灘白 tshirt</div>
								</div>
								<div class="item_right">
									<div class="count">
										<input class="btn minus" name="" type="button" value="－"/>
											<input id="countnum" name="" type="text" value="1"/>
										<input class="btn plus" name="" type="button" value="＋"/>
									</div>
									<div class="item_price"><p>$400</p></div>
								</div>
							</div>

							<div class="item">
								<div class="delete_btn">
									<a href="javascript:;">
										<img src="img/close1.svg" alt="">
									</a>
								</div>
								<div class="item_left">
									<div class="pic" style="background-image: url(https://images.unsplash.com/photo-1564859228273-274232fdb516?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NzV8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60);"></div>
									<div class="product_name">手繪海灘白 tshirt</div>
								</div>
								<div class="item_right">
									<div class="count">
										<input class="btn minus" name="" type="button" value="－"/>
											<input id="countnum" name="" type="text" value="1"/>
										<input class="btn plus" name="" type="button" value="＋"/>
									</div>
									<div class="item_price"><p>$400</p></div>
								</div>
							</div>

						</div>

						<div class="total_detail">
							<div class="total_frame">
								<div class="total_product">共 <span>1</span> 件商品</div>
								<div class="total_price"><span>金額</span><span>$400</span></div>
							</div>
							<div class="shipping"><span>運費</span><span>$70</span></div>
							<div class="discount"><span>折扣</span><span>$0</span></div>
							<hr>
							<div class="final_price"><span>小計</span><span class="price">$470</span></div>
							<div class="button">
								<input type="button" class="btn keepShooping" onclick="javascript:location.href='shop.html'" value="繼續購物">
								<input type="submit" class="btn submit" onclick="javascript:location.href='shop.html'" value="提交訂單">
						</div>
				</div>
				</div>
		</div>
		</section>
	<footer></footer>
</body>
</html>
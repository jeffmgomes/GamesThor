<?php
	session_start();
	$cart = array();
	if(isset($_SESSION['cartItems'])){
		$cart = $_SESSION['cartItems'];
		if(count($cart) > 0){
			require("php/products.php");
			$list = "";
			foreach (array_keys($cart) as $key => $value) {
				$list = $list . $value .",";
			}
			$items = getProductsByList(substr_replace($list,"",-1));
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Games Thor project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">

</head>

<body>

<div class="super_container">

	<!-- Checkout Summary -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Checkout - Order</div>
						<div class="cart_items">
							<ul class="cart_list">
								<?php
									if(count($cart) > 0){										
											while ($row = mysqli_fetch_array($items, MYSQLI_ASSOC)){
												echo "<li class='cart_item clearfix'>
												<div class='cart_item_image'><img src='images/". $row['ProductID'] .".jpg' alt=''></div>
												<div class='cart_item_info d-flex flex-md-row flex-column justify-content-between'>
													<div class='cart_item_name cart_info_col'>
														<div class='cart_item_title'>Name</div>
														<div class='cart_item_text'>".$row['Name'] ."</div>
													</div>
													<div class='cart_item_quantity cart_info_col'>
														<div class='cart_item_title'>Quantity</div>
														<div class='cart_item_text'>".$cart[$row['ProductID']][0] ."</div>
													</div>
													<div class='cart_item_price cart_info_col'>
														<div class='cart_item_title'>Price</div>
														<div class='cart_item_text'>". $row['Price'] ."</div>
													</div>
													<div class='cart_item_total cart_info_col'>
														<div class='cart_item_title'>Total</div>
														<div class='cart_item_text'>". $cart[$row['ProductID']][0] * $cart[$row['ProductID']][1] ."</div>
													</div>
												</div>
											</li>";
											}
									}else{
										echo "No Items in the cart";
									}
								?>
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount"><?php echo "A$". (isset($_SESSION["cartTotal"]) ? $_SESSION["cartTotal"] : "0") ?></div>
							</div>
						</div>

						<div class="cart_buttons">
						<form action="php/submitOrder.php" style="display: inline-block">
							<button type="submit" class="button cart_button_checkout">Confirm Order</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="js/cart_custom.js"></script>
</body>

</html>
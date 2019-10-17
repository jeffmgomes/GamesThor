<?php
	session_start();
	$product = "";
	$rowProduct = "";
	require("php/products.php");
	if(isset($_GET['prod'])){
		$prod = $_GET['prod'];
		$product = getProduct($prod);
		$rowProduct = mysqli_fetch_array($product, MYSQLI_ASSOC);
	} else {
		header("Location: shop.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Games Thor project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<?php require("php/header.php"); ?>

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->

				<!-- Selected Image -->
				<div class="col-lg-6 order-lg-2 order-1">
					<div class="image_selected"><?php echo "<img src='images/". $rowProduct['ProductID'].".jpg' alt=''>" ?></div>
				</div>

				<!-- Description -->
				<div class="col-lg-6 order-3">
					<div class="product_description">
						<div class="product_category"><?php echo $rowProduct['cat_name'] ?></div>
						<div class="product_name"><?php echo $rowProduct['prod_name'] ?></div>
						<div class="product_text"><p><?php echo $rowProduct['Description'] ?></p></div>
						<div class="order_info d-flex flex-row">
							<form action="php/addCart.php" method="POST">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix" style="background-color: white;">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" name="quant" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>
								</div>

								<div class="product_price"><?php echo "A$". $rowProduct['Price'] ?></div>
								<div class="button_container">
									<button type="submit" class="button cart_button">Add to Cart</button>
									<?php echo (in_array($rowProduct['ProductID'], (isset($_SESSION["wishList"]) ? $_SESSION["wishList"] : array())) ? "<div class='product_fav active' name='".$rowProduct['ProductID']."'><i class='fas fa-heart'></i></div>" : "<div class='product_fav' name='".$rowProduct['ProductID']."'><i class='fas fa-heart'></i></div>")?>
								</div>
								<input type="hidden" name="price" value="<?php echo $rowProduct['Price'] ?>"/>
								<input type="hidden" name="prod" value="<?php echo $rowProduct['ProductID'] ?>"/>
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
<script src="js/product_custom.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
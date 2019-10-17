<?php
	session_start();
	$products = "";
	require("php/products.php");
	if(isset($_GET['cat'])){
		$cat = $_GET['cat'];
		$products = getProductsByCategory($cat);
	} elseif(isset($_GET['search'])){
		$search = $_GET['search'];
		$products = getProductsByNameOrDesc($search);
	}
	else{
		$products = getAllProducts();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Games Thor project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">

</head>

<body>

<div class="super_container">
	
	<!-- Header -->

	<?php require("php/header.php"); ?>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<?php
                            require_once("php/categories.php");
							$catResult = getCategories();
							$cat = "";
							if(isset($_GET['cat'])){
								$cat = $_GET['cat'];
							}
                            if(!$catResult){
                                echo "<ul class='sidebar_categories'></ul>";
                            } else {
                                echo "<ul class='sidebar_categories'>";
                                while ($row = mysqli_fetch_array($catResult, MYSQLI_ASSOC)){
                                    print "<li><a ". ($cat == $row['CategoryID'] ? " class='active' " : "") ." href='shop.php?cat=". $row['CategoryID']."'>". $row['Name'] . "</a></li>";
                                }
                                echo "</ul>";
                            }
                        ?>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span><?php echo $products->num_rows;?></span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							<?php
								if($products->num_rows > 0){
									while ($row = mysqli_fetch_array($products, MYSQLI_ASSOC)){
										echo "<div class='product_item'><div class='product_border'></div><div class='product_image d-flex flex-column align-items-center justify-content-center'>";
										echo "<img src='images/". $row['ProductID']. ".jpg' alt=''></div>";
										echo "<div class='product_content'>";
										echo "<div class='product_price'>A$". $row['Price'] . "</div>";
										echo "<div class='product_name'><div><a href='product.php?prod=".$row['ProductID']."' tabindex='0'>". $row['prod_name'] ."</a></div></div>";
										echo "</div><div class='product_fav " . (in_array($row['ProductID'], (isset($_SESSION["wishList"]) ? $_SESSION["wishList"] : array())) ? " active " : "") . "' name='".$row['ProductID']. "'><i class='fas fa-heart'></i></div><ul class='product_marks'><li class='product_mark product_discount'>-25%</li><li class='product_mark product_new'>new</li></ul></div>";
									}
								}else{
									print "No products";
								}
							?>
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
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/shop_custom.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
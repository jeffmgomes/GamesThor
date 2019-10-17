<header class="header">

<!-- Top Bar -->

<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+61 8 1234 1333</div>
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Italian</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Japanese</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">$ AUD dollar<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">EUR Euro</a></li>
                                    <li><a href="#">GBP British Pound</a></li>
                                    <li><a href="#">JPY Japanese Yen</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="top_bar_user">
                        <div class="user_icon"><img src="images/user.svg" alt=""></div>
                        <div><a href="register.php">Register</a></div>
                        <div><a href="signin.php"><?php echo (isset($_SESSION['customerName']) ? $_SESSION['customerName'] ." - Sign Out" : "Sign In" ) ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>		
</div>

<!-- Header Main -->

<div class="header_main">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="col-lg-3 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><a href="index.php">Games Thor</a></div>
                </div>
            </div>

            <!-- Search -->
            <div class="col-lg-5 col-12 order-lg-2 order-3 text-lg-left text-right">
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            <form action="shop.php" class="header_search_form clearfix">
                                <input type="search" name="search" required="required" class="header_search_input" placeholder="Search for products...">
                                <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wishlist -->
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">

                    <?php include("php/wishlistHeader.php"); ?>

                    <!-- Cart -->
                    <?php include("php/cartHeader.php")?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Navigation -->

<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories</div>
                        </div>

                        <?php
                            require_once("php/categories.php");
                            $catResult = getCategories();
                            if(!$catResult){
                                echo "<ul class='cat_menu'></ul>";
                            } else {
                                echo "<ul class='cat_menu'>";
                                while ($row = mysqli_fetch_array($catResult, MYSQLI_ASSOC)){
                                    print "<li><a href='shop.php?cat=". $row['CategoryID']."'>". $row['Name'] . "</a></li>";
                                }
                                echo "</ul>";
                            }
                        ?>								
                    </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>									
                            <li><a href="shop.php">Products<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="contact.php">Contact<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Menu -->

<div class="page_menu">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="page_menu_content">
                    
                    <div class="page_menu_search">
                        <form action="shop.php">
                            <input type="search" name="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                        </form>
                    </div>
                    <ul class="page_menu_nav">
                        <li class="page_menu_item has-children">
                            <a href="#">Language<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection">
                                <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                        </li>
                        <li class="page_menu_item has-children">
                            <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection">
                                <li><a href="#">AUD Dollar<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                        </li>
                        <li class="page_menu_item"><a href="index.php">Home</a></li>									
                        <li class="page_menu_item"><a href="shop.php">Products</a></li>																	
                        <li class="page_menu_item"><a href="contact.php">Contact</a></li>
                    </ul>
                    
                    <div class="menu_contact">
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+61 8 1234 1333</div>
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</header>
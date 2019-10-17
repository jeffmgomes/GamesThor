
<div class="banner">
    <div class="banner_background" style="background-image:url(images/banner_background1.jpg)"></div>
    <div class="container fill_height">
        <div class="row fill_height">
            <?php
                $num = rand(1,10);
                require("products.php");
                $product = getProduct($num);
                if($product){
                    while ($row = mysqli_fetch_array($product, MYSQLI_ASSOC)){
                        echo "<div class='banner_product_image'><img src='images/". $row['ProductID']. ".jpg' alt=''></div>";
                        echo "<div class='col-lg-5 offset-lg-4 fill_height'>";
                        echo "<div class='banner_content'>";
                        echo "<h1 class='banner_text'>". $row['prod_name'] ."</h1>";
                        echo "<div class='banner_price'>A$" . $row['Price'] ."</div>";
                        echo "<div class='banner_product_name'>" . $row['prod_name'] . "</div> ";
                        echo "<div class='button banner_button'><a href='product.php?prod=". $row['ProductID'] ."'>Shop Now</a></div>";
                        echo "</div></div>";
                    }
                }
            ?>
        </div>
    </div>
</div>
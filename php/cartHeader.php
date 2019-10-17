<div class="cart">
    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
        <div class="cart_icon">
            <img src="images/cart.png" alt="">
            <div class="cart_count"><span>
            <?php echo (isset($_SESSION["cartItems"]) ? count($_SESSION["cartItems"]) : "0") ?>
            </span></div>
        </div>
        <div class="cart_content">
            <div class="cart_text"><a href="cart.php">Cart</a></div>
            <div class="cart_price"><?php echo "A$". (isset($_SESSION["cartTotal"]) ? $_SESSION["cartTotal"] : "0") ?></div>
        </div>
    </div>
</div>
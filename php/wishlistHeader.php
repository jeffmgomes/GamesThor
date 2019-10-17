<div class="wishlist d-flex flex-row align-items-center justify-content-end">
    <div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
    <div class="wishlist_content">
        <div class="wishlist_text"><a href="#">Wishlist</a></div>
        <div class="wishlist_count">
            <?php echo (isset($_SESSION["wishList"]) ? count($_SESSION["wishList"]) : "0") ?>
        </div>
    </div>
</div>
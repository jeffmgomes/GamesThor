<?php
    if(isset($_GET['prod'])){
        $prod = $_GET['prod'];
        require("wishListClass.php");
        $wishList = new WishList();
        $wishList->toggleProduct($prod);
    }
?>
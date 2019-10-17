<?php
    if(isset($_POST['prod']) && isset($_POST['quant']) && isset($_POST["price"])){
        $prod = $_POST['prod'];
        $quant = $_POST['quant'];
        $price = $_POST['price'];
        require("cartClass.php");
        $cart = new Cart();
        $cart->addToCart($prod,$quant,$price);
        header("Location: ../cart.php");
    }
?>
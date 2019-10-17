<?php
    require("cartClass.php");
    $c = new Cart();
    $c->clearCart();
    header("Location: ../index.php");
?>
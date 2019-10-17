<?php
    if(isset($_GET['prod'])){
        require("cartClass.php");
        $c = new Cart();
        $c->removeItem($_GET['prod']);
        header("Location: ../cart.php");
    }
?>
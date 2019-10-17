<?php
    session_start();
    if(isset($_SESSION["customerId"]) && isset($_SESSION["cartItems"]))
    {
        require("orderClass.php");
        $order = new Order();
        $order->customerId = $_SESSION["customerId"];
        $order->items = $_SESSION["cartItems"];
        $result = $order->submitOrder();
        if($result){
            echo "Thanks " . $result;
        }else{
            echo " Failed!";
        }
    } else {
        header("Location: ../index.php");
    }
?>
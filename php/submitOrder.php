<?php
    session_start();
    if(isset($_SESSION["customerId"]) && isset($_SESSION["cartItems"]))
    {
        require("orderClass.php");
        $order = new Order();
        $order->customerId = $_SESSION["customerId"];
        $order->items = $_SESSION["cartItems"];
        $orderId = $order->submitOrder();
        if($orderId){
            $_SESSION["orderId"] = $orderId;
            header("Location: ../payment.php");
            echo "Thanks " . $result;
        }else{
            echo " Failed!";
        }
    } else {
        header("Location: ../index.php");
    }
?>
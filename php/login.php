<?php
    if(isset($_POST['email']) && isset($_POST['password'])){
        require("customerClass.php");
        $customer = new Customer();
        $result = $customer->login($_POST['email'],$_POST['password']);
        if($result){
            require("wishListClass.php");
            $_SESSION['customerId'] = $result['CustomerID'];
            $_SESSION['customerName'] = $result['FirstName'];
            $wishList = new WishList(); // Get the wishlist
            $wishList->saveWishList();
            header("Location: ../index.php");
        }else{
            header("Location: ../signin.php?wrongpass=true");
        }
    }
?>
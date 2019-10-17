<?php
    require("customerClass.php");
    $customer = new Customer();
    $customer->FirstName = (isset($_POST['fname']) ? $_POST['fname'] : "fname");
    $customer->LastName = (isset($_POST['lname']) ? $_POST['lname'] : "lname");
    $customer->Email = (isset($_POST['email']) ? $_POST['email'] : "email");
    $customer->Street = (isset($_POST['street']) ? $_POST['street'] : "street");
    $customer->Suburb = (isset($_POST['suburb']) ? $_POST['suburb'] : "suburb");
    $customer->City = (isset($_POST['city']) ? $_POST['city'] : "city");
    $customer->State = (isset($_POST['state']) ? $_POST['state'] : "state");
    $customer->Password = (isset($_POST['password']) ? $_POST['password'] : "password");

    $result = $customer->createCustomer();
    if($result){
        //$_SESSION['customerId'] = $result;
        header("Location: ../signin.php?created=true");
    }
?>
<?php    
    function getAllProducts(){ 
        require("conn_db.php");      
        $query = "SELECT *, P.Name as prod_name, C.Name as cat_name FROM `Product` P INNER JOIN `Category` C ON P.CategoryID = C.CategoryID LIMIT 0, 30 ";
        $result = mysqli_query($conn,$query) or die("");
        mysqli_close($conn);
        return $result;
    }

    function getProduct($id){  
        require("conn_db.php");     
        $query = "SELECT *, P.Name as prod_name, C.Name as cat_name FROM `Product` P INNER JOIN `Category` C ON P.CategoryID = C.CategoryID WHERE P.ProductID = $id ";
        $result = mysqli_query($conn,$query) or die("");
        mysqli_close($conn);
        return $result;
    }

    function getProductsByCategory($cat){
        require("conn_db.php");
        $whereCategory = " P.CategoryID = " . $cat;
        $query = "SELECT *, P.Name as prod_name, C.Name as cat_name FROM `Product` P INNER JOIN `Category` C ON P.CategoryID = C.CategoryID WHERE ";
        $query = $query . $whereCategory;
        $result = mysqli_query($conn,$query) or die("");
        mysqli_close($conn);
        return $result;
    }

    function getProductsByNameOrDesc($search){
        require("conn_db.php");
        $whereNameOrDesc = " P.Name LIKE '%". $search . "%' OR P.Description LIKE '%". $search . "%' ";      
        $query = "SELECT *, P.Name as prod_name, C.Name as cat_name FROM `Product` P INNER JOIN `Category` C ON P.CategoryID = C.CategoryID WHERE ";
        $query = $query . $whereNameOrDesc;
        $result = mysqli_query($conn,$query) or die("");
        mysqli_close($conn);
        return $result;
    }

    function getProductsByList($list){
        require("conn_db.php");    
        $query = "SELECT * FROM `Product` WHERE ProductID IN (". $list .") ";
        $result = mysqli_query($conn,$query) or die("");
        mysqli_close($conn);
        return $result;
    }
?>
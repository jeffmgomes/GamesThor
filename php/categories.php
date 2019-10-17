<?php
    function getCategories(){
        require("conn_db.php");
        $query = "SELECT * FROM `category` LIMIT 0, 30 ";
        $result = mysqli_query($conn,$query) or die("");
        mysqli_close($conn);
        return $result;
    }
?>
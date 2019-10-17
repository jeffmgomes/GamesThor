<?php
class WishList{
    // Properties
    private $customerId;
    private $wishList = array();
    private $stmt;

    // Constructor
    function __construct(){
        // Check if there is a customer logged in
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(isset($_SESSION["customerId"])){
            require("conn_db.php"); // Get the connection
            $this->stmt = $conn;

            $this->customerId = $_SESSION["customerId"]; // Set the customerId

            $this->updateWishList(); // Update the WishList
            $_SESSION['wishList'] = array_unique(array_merge((isset($_SESSION['wishList']) ? $_SESSION['wishList'] : array()) , $this->wishList));
        }
        // If the session exists use it
        if(isset($_SESSION["wishList"])){
            $this->wishList = $_SESSION["wishList"];
        }else{
            // If not create it
            $_SESSION["wishList"] = array();
            $this->wishList = $_SESSION["wishList"];
        }

    }

    // Get the quantity of items in the wishlist (if it is a Guest return the quantity of wishlist to Save)
    public function quantity(){
        return count($this->wishList);
    }

    // Get the wishlist array (if a Guest return the wishlist to Save)
    public function getWishList(){
        return $this->wishList;
    }

    // Adds a product to the wishlist and save it (if a guest just adds to the wishlist to Save)
    public function toggleProduct($productId){
        // If the product is already in the list doesn't add
        if(($key = array_search($productId, $this->wishList)) !== FALSE){
            // If found remove it
            unset($this->wishList[$key]);
        } else{
            // Add productId to the wishList to Save
            array_push($this->wishList,$productId);          
        }
        
        // If there is customer save it
        if($this->customerId){
            //$this->removeFromWishList($productId);
            $this->saveWishList(); // Save the list    
        }

        $_SESSION["wishList"] = $this->wishList; // Updates the session
        echo $this->quantity();
    }

    // Remove a product from the wishList
    public function removeFromWishList($productId){
        $query = "DELETE FROM `wishlist` WHERE `CustomerID` = ". $this->customerId . ";" ; // Create the querry
        $result = (!mysqli_query($this->stmt,$query) ? false : true); // Get the result
        mysqli_close($this->stmt);        
        return $result; // Return the result 
    }

    // Save the wishlist
    public function saveWishList(){
        // First delete all the records
        $query = "DELETE FROM `wishlist` WHERE `CustomerID` = ". $this->customerId . ";";

        // Then insert the updated list
        $query .= "INSERT INTO `wishlist` VALUES "; // Create the querry

        $values = "";
        // Add the multiple values to the insert
        foreach ($this->wishList as $key => $value) {
            $values .= "('$this->customerId','$value'),";
        }
        // Concat query with values and remove the last comma that the foreach puts
        $query .= substr_replace($values,"",-1);

        $query = $this->stmt->multi_query($query);
    }

    // Update the wishlist with information from the database
    private function updateWishList(){
        // Create the query
        $query = "SELECT * FROM `wishlist` WHERE `CustomerID` = " . $this->customerId;
        $query = $this->stmt->prepare($query);
        $query->execute();
        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
        // Add the products to the wishlist
        foreach ($result as $key => $value) {
            array_push($this->wishList,strval($value['ProductID']));
        }
        $query->close();
    } 
}
?>
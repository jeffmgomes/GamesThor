<?php
class Customer{
    // Properties
    public $customerId;
    public $FirstName;
    public $LastName;
    public $Email;
    public $Street;
    public $Suburb;
    public $City;
    public $State;
    public $Password;

    private $stmt;

    // Constructor
    function __construct(){
        // Check if there is a customer logged in
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        require("conn_db.php"); // Get the connection
        $this->stmt = $conn;

        if(isset($_SESSION["customerId"])){
            $this->customerId = $_SESSION["customerId"]; // Set the customerId
        }
    }

    // Get the wishlist array (if a Guest return the wishlist to Save)
    public function getCustomerId(){
        return $this->customerId;
    }


    // Remove a product from the wishList
    public function createCustomer(){
        //require_once("conn_db.php"); // Connect to the database
        try {
            $query = "INSERT INTO `customer`
                    (`FirstName`, `LastName`, `Email`, `Pwd`, `Street`, `Suburb`, `City`, `State`, `Country`) 
                    VALUES (?,?,?,SHA2(?, 224),?,?,?,?,?)"; // Create the query
            $query = $this->stmt->prepare($query);
            $types = "sssssssss";
            $Country = "Australia";
            $query->bind_param($types,$this->FirstName,$this->LastName,$this->Email,$this->Password,$this->Street,$this->Suburb,$this->City,$this->State,$Country);
            $query->execute();
            $result = $query->insert_id;
            $query->close();
            return $result;
        } catch (Exception $th) {
            exit($th->getMessage());
        }
    }

    public function login($email, $password){
        //require_once("conn_db.php");
        try {
            $query = "SELECT * FROM `customer`                    
                        WHERE email = ? and pwd = SHA2(?, 224)"; // Create the query
            $query = $this->stmt->prepare($query);
            $query->bind_param("ss",$email, $password);
            $query->execute();
            $result = $query->get_result()->fetch_assoc(); // Get a single row
            $query->close();
            return ($result ? $result : false);
        } catch (Exception $th) {
            exit($th->getMessage());
        }
    }
}
?>
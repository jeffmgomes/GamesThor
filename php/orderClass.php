<?php
class Order{
    // Properties
    public $orderId;
    public $customerId;
    public $date;
    public $items;
    public $total;
    public $paymentType;
    public $paid;

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

        if(isset($_SESSION["cartItems"])){
            $this->items = $_SESSION["cartItems"]; // Get the items from the session
        }

        if(isset($_SESSION["cartTotal"])){
            $this->total = $_SESSION["cartTotal"];
        }
    }

    // Get the orderId
    public function getOrderId(){
        return $this->orderId;
    }


    // Remove a product from the wishList
    public function submitOrder(){
        try {
            $query = "INSERT INTO `order`
                    (`CustomerID`, `Date`, `Status`,`Total`) 
                    VALUES (?,?,'Pending',?)"; // Create the query
            $query = $this->stmt->prepare($query);
            $date = date('Y-m-d H:i:s');
            $query->bind_param("ssd",$this->customerId, $date, $this->total);
            $query->execute();
            $orderId = $query->insert_id;
            $result = null;
            if($orderId){
                $this->orderId = $orderId; // Set the orderId property
                $result = $this->insertItems($this->orderId);
            }
            $query->close();
            return $result;
        } catch (Exception $th) {
            exit($th->getMessage());
        }
    }

    public function insertItems($orderId){
        try {
            $query = "INSERT INTO `orderproduct` VALUES ";

            $values = "";
            // Add the multiple values to the insert
            foreach ($this->items as $key => $value) {
                $values .= "('$this->customerId','$key','$value[0]',$value[1]),";
            }
            // Concat query with values and remove the last comma that the foreach puts
            $query .= substr_replace($values,"",-1);

            $query = $this->stmt->prepare($query);
            $query->execute();
            $result = $query->affected_rows; // Get rows inserted
            $query->close();
            return ($result ? $result : false);
        } catch (Exception $th) {
            exit($th->getMessage());
        }
    }

    public function updateOrder(){
        try {
            $query = "UPDATE `order`
                      SET `PaymentType` = ?,
                         `Paid` = ? 
                    WHERE orderId = ? "; // Create the query
            $query = $this->stmt->prepare($query);
            $query->bind_param("sss",$this->paymentType,$this->paid,$this->orderId);
            $query->execute();
            $result = $query->affected_rows;
            $query->close();
            return $result;
        } catch (Exception $th) {
            exit($th->getMessage());
        }
    }
}
?>
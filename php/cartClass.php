<?php
class Cart{
    private $customerId;
    private $cart = array();
    private $total;

    function __construct(){
        session_start(); // Star the session
        // If the session exists use it
        if(isset($_SESSION["cartItems"]) && isset($_SESSION["cartTotal"])){
            $this->cart = $_SESSION["cartItems"];
            $this->total = $_SESSION["cartTotal"];
        }else{
            // If not create it
            $_SESSION["cartItems"] = array();
            $_SESSION["cartTotal"] = 0;
            $this->cart = $_SESSION["cartItems"];
            $this->total = $_SESSION["cartTotal"];
        } 
    }

    // Return the quantity of items in the cart
    public function quantity(){
        return count($this->cart);
    }

    // Return the cart object, with product ID and quantity seleted
    public function getCart(){
        return $this->cart;
    }

    public function getTotal(){
        return $this->total;
    }

    public function addToCart($productId, $quantity, $price){
        // If the product is already in the list this will just update the quantity
        // If not this will add
        $oldQuantity = 0;
        $updateDiff = 0;        
        $price = floatval($price); // Convert the price to double/float

        if(array_key_exists($productId,$this->cart)){
            $oldQuantity = $this->cart[$productId][0]; // Get the old quantity if any
            $updateDiff = $price * $oldQuantity;
        }
        
        $this->cart[$productId] = array($quantity, $price); // Add and array of quantity and price of the product to the cart array
        $this->total += ($price * $quantity) - $updateDiff; // Calculate the new Total (If the product quantity is update substract the difference)     
        
        $_SESSION["cartItems"] = $this->cart; // Updates the session
        $_SESSION["cartTotal"] = $this->total;
    }

    public function removeItem($productId){
        if(array_key_exists($productId,$this->cart)){
            $this->total -= ($this->cart[$productId][0] * $this->cart[$productId][1]);
            unset($this->cart[$productId]);
        }
        // Updates the session
        $_SESSION["cartItems"] = $this->cart; 
        $_SESSION["cartTotal"] = $this->total;
    }

    public function clearCart(){
        $_SESSION["cartItems"] = array();
        $_SESSION["cartTotal"] = 0;
        $this->cart = $_SESSION["cartItems"];
        $this->total = $_SESSION["cartTotal"];
    }
}    
?>
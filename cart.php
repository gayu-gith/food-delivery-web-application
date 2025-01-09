<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Cart - Food Delivery System</title> 
    <link rel="stylesheet" type="text/css" href="styles/common.css"> 
</head> 
<body> 
    <header> 
        <h1>Your Cart</h1> 
    </header> 
<div class="container"> 
        <?php         session_start(); 
        if (!isset($_SESSION['cart'])) { 
            $_SESSION['cart'] = []; 
        } 
 
        if (isset($_GET['add'])) {             $food_item_id = $_GET['add']; 
            $_SESSION['cart'][$food_item_id] = ($_SESSION['cart'][$food_item_id] ?? 0) + 1; 
        } 
 
       
        if (empty($_SESSION['cart'])) { 
            echo "<p>Your cart is empty.</p>"; 
        } else { 
            foreach ($_SESSION['cart'] as $item => $quantity) {                 echo "Item ID: $item - Quantity: $quantity<br>"; 
            } 
            echo '<a href="checkout.php">Proceed to Checkout</a>'; 
        } 
        ?> 
    </div> 
</body> 
</html> 

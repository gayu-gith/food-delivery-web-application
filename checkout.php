<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Checkout - Food Delivery System</title> 
    <link rel="stylesheet" type="text/css" href="styles/common.css"> 
</head> 
<body> 
    <header> 
        <h1>Checkout</h1> 
    </header> 
    <div class="container"> 
        <?php         include 'db.php'; 
        session_start(); 
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $user_id = $_SESSION['user_id']; 
            $restaurant_id = $_POST['restaurant_id']; 
            $total_amount = $_POST['total_amount']; 
 
            $sql = "INSERT INTO orders (user_id, restaurant_id, total_amount) VALUES 
('$user_id', '$restaurant_id', '$total_amount')";             if ($conn->query($sql) === TRUE) { 
                $order_id = $conn->insert_id; 
 
                foreach ($_SESSION['cart'] as $item => $quantity) { 
                    $sql = "INSERT INTO order_items (order_id, food_item_id, quantity) VALUES ('$order_id', '$item', '$quantity')"; 
                  $conn->query($sql); 
               } 
                
    unset($_SESSION['cart']); 
                echo "<p>Order placed successfully!</p>"; 
            } else { 
                echo "<p>Error: " . $conn->error . "</p>"; 
            } 
        } 
        ?> 
        <form method="POST"> 
            <input type="hidden" name="restaurant_id" value="1"> <!-- Replace with dynamic restaurant ID --> 
            <input type="hidden" name="total_amount" value="100.00"> <!-- Replace with dynamic total --> 
            <button type="submit">Place Order</button> 
        </form> 
    </div> 
</body> 
</html> 

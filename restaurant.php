<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Restaurant Menu - Food Delivery System</title> 
    <link rel="stylesheet" type="text/css" href="styles/common.css"> 
</head> 
<body> 
    <header> 
       <h1>Restaurant Menu</h1> 
   </header> 
   <div class="container"> 
       
     <?php 
        include 'db.php'; 
        $restaurant_id = $_GET['id']; 
        $sql = "SELECT * FROM food_items WHERE restaurant_id = $restaurant_id";         $result = $conn->query($sql); 
        ?> 
        <h2>Menu</h2> 
        <ul> 
            <?php while ($row = $result->fetch_assoc()): ?> 
                <li> 
                    <?php echo $row['name']; ?> - $<?php echo $row['price']; ?> 
                    <a href="cart.php?add=<?php echo $row['id']; ?>">Add to Cart</a> 
                </li> 
            <?php endwhile; ?> 
        </ul> 
    </div> 
</body> 
</html> 

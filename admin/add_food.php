<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Add Food Item - Food Delivery System</title> 
    <link rel="stylesheet" type="text/css" href="../styles/common.css"> 
</head> 
<body> 
    <header> 
        <h1>Add Food Item</h1> 
    </header> 
    <div class="container"> 
        <?php 
        include '../db.php'; 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $restaurant_id = $_POST['restaurant_id']; 
            $name = $_POST['name']; 
            $description = $_POST['description']; 
            $price = $_POST['price']; 
 
            $sql = "INSERT INTO food_items (restaurant_id, name, description, price) VALUES ('$restaurant_id', '$name', '$description', '$price')";             if ($conn->query($sql) === TRUE) { 
                echo "<p>Food item added successfully!</p>"; 
            } else { 
                echo "<p>Error: " . $conn->error . "</p>"; 
            } 
        } 
        ?> 
        <form method="POST"> 
            <input type="text" name="restaurant_id" placeholder="Restaurant ID" required> 
            <input type="text" name="name" placeholder="Food Name" required> 
            <textarea name="description" placeholder="Description"></textarea> 
            <input type="number" name="price" step="0.01" placeholder="Price" required>             
            <button type="submit">Add Food Item</button> 
        </form> 
    </div> 
</body> 
</html> 

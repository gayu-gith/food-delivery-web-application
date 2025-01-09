<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Add Restaurant - Food Delivery System</title> 
    <link rel="stylesheet" type="text/css" href="../styles/common.css"> 
</head> 
<body> 
    <header> 
        <h1>Add Restaurant</h1> 
    </header> 
    <div class="container"> 
        <?php 
        include '../db.php'; 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $name = $_POST['name']; 
            $address = $_POST['address'];             
            $contact = $_POST['contact']; 
            $sql = "INSERT INTO restaurants (name, address, contact) VALUES ('$name','$address','$contact')"; 
            if ($conn->query($sql) === TRUE) { 
                echo "<p>Restaurant added successfully!</p>"; 
            } else {                 echo "<p>Error: " . $conn->error . "</p>"; 
          } 
       } 
       ?> 
        
    <form method="POST"> 
        <input type="text" name="name" placeholder="Restaurant Name" required> 
        <textarea name="address" placeholder="Address" required></textarea> 
        <input type="text" name="contact" placeholder="Contact Number" required>            
        <button type="submit">Add Restaurant</button> 
    </form> 
    </div> 
</body> 
</html> 
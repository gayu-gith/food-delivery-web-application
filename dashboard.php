<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Dashboard - Food Delivery System</title> 
    <link rel="stylesheet" type="text/css" href="styles/common.css"> 
</head> 
<body> 
    <header> 
        <h1>Dashboard</h1> 
    </header> 
    <div class="container"> 
        <?php 
        include 'db.php'; 
        $sql = "SELECT * FROM restaurants"; 
        $result = $conn->query($sql); 
        ?> 
        <h2>Available Restaurants</h2> 
        <ul> 
            <?php while ($row = $result->fetch_assoc()): ?> 
                <li> 
                    <a href="restaurant.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; 
?></a> 
                </li> 
            <?php endwhile; ?> 
        </ul> 
    </div> 
</body> 
</html> 

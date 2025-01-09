<?php
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the username or email already exists
    $sql_check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        $error = "Username or email already exists!";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            $success = "Registration successful! You can now log in.";
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Register - Food Delivery System</title> 
    <link rel="stylesheet" type="text/css" href="styles/common.css"> 
</head> 
<body> 
    <header> 
        <h1>Register</h1> 
    </header> 
    <div class="container"> 
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?> 
        <?php if (isset($success)) echo "<p style='color: green;'>$success</p>"; ?> 
        <form method="POST" action=""> 
            <input type="text" name="username" placeholder="Username" required> 
            <input type="email" name="email" placeholder="Email" required> 
            <input type="password" name="password" placeholder="Password" required> 
            <button type="submit">Register</button> 
        </form> 
        <p>Already have an account? <a href="login.php">Login here</a>.</p> 
    </div> 
</body> 
</html> 

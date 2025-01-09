<?php
session_start(); // Start session to store user data
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user details in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header('Location: dashboard.php');
            exit;
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Username not found!";
    }
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Login - Food Delivery System</title> 
    <link rel="stylesheet" type="text/css" href="styles/common.css"> 
</head> 
<body> 
    <header> 
        <h1>Login</h1> 
    </header> 
    <div class="container"> 
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?> 
        <form method="POST" action=""> 
            <input type="text" name="username" placeholder="Username" required> 
            <input type="password" name="password" placeholder="Password" required> 
            <button type="submit">Login</button> 
        </form> 
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>     </div> 
</body> 
</html> 

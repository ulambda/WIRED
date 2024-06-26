<?php 
    session_start();
    include '../includes/head.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>

<form method="POST">
    <label>Username</label>
    <input type="text" name="username" id="username" required>

    <label>Password</label>
    <input type="password" name="password" id="password" required>

    <button name="signup" >Create Account</button>
</form>

<?php
    if(ISSET($_POST['signup'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO `users` VALUES('', '$username', 'default.png', '$password')") or die(mysqli_error());
        header('location: signin.php');
    }
?>
    
</body>
</html>
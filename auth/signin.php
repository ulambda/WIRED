<?php 
    session_start();
    include '../includes/head.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in page</title>
</head>
<body>


    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" id="username" required>

        <label>Password</label>
        <input type="password" name="password" id="password" required>

        <button name="signin">sign in</button>
    </form>

    <?php 
            if(ISSET($_POST['signin'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user){
                    if(password_verify($password, $user['password'])){
                        $_SESSION['user'] = $user['username'];
                        header('location: ../index.php');
                        die();
                    }
                    else {
                        echo "invalid password";
                    }

                }
                else{
                    echo "invalid username";
                }
            }
    ?>
    
</body>
</html>
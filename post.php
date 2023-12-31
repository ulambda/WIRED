<?php 
    session_start();
    include 'includes/head.php';

    if(!ISSET($_SESSION['user'])){
        header('location: auth/signin.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <h1>Create Post</h1>

<form method="POST">
    <div>
        <label>Title</label>
        <input type="text" name="title" id="title">
        <label>Body</label>
        <textarea rows="4" cols="50" name="body" id="body" required> </textarea>
        <button name="post">Post</button>
    </div>
</form>

<?php
    $username = $_SESSION['user'];
    if (isset($_POST['post'])) {
        $title = filter_input(INPUT_POST, $_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
        $body = filter_input(INPUT_POST, $_POST['body'], FILTER_SANITIZE_SPECIAL_CHARS);
        mysqli_query($conn, "INSERT INTO `posts` VALUES('', '$title', '$body', '$username', UTC_TIMESTAMP())") or die(mysqli_error());
    }
?>

</body>
</html>
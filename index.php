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
    <title>Social</title>
</head>
<body>
    <?php
        echo "<p>Hello, " . $_SESSION['user'] . "</p>";
  
    ?>

    <h1>latest posts global</h1>
    <?php
    
        $query = mysqli_query($conn, "SELECT * FROM `posts` WHERE `id` ORDER BY `id` DESC LIMIT 10") or die(mysqli_error());
        while($fetch = mysqli_fetch_array($query)){


    ?>
       
        <div style="background-color:gray;">
            <div>
                <img src="images/profile-icons/default.png" alt="" style="width:50px; border-radius:100px;">


                <a href="profile.php?user=<?php echo $fetch['user']?>">by <?php echo $fetch['user']?></a> at <?php echo $fetch['date']?>

            </div>
            <a href="thread.php?id=<?php echo $fetch['id']?>"><h3><?php echo $fetch['title']?> </h3> </a>
            <p><?php echo $fetch['body']?></p> 
         </div>
         

    <?php
        }
    ?>

</body>
</html>
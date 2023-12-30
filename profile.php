<?php 
    session_start();
    include 'includes/head.php';
?>

<?php
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '" . $_GET["user"] . "'") or die(mysqli_error());
    if($fetch = mysqli_fetch_array($query)){
        $thisUsername = $fetch['username'];
        $thisUserpfp = $fetch['pfp'];
    }

    else{
        echo "404: This user does not exist.";
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo ucfirst($thisUsername) ?>'s profile </title>
</head>
<body>




<img src="./images/profile-icons/<?php echo $thisUserpfp ?>" alt="profile-icon" style="border-radius:100px; width:150px; height:150px; ">
<p>Username: <?php echo $thisUsername?></p>


<?php  

    $thisUserFollowers = 0;

    $query = mysqli_query($conn, "SELECT * FROM `followers` WHERE `following` =  '$thisUsername'") or die(mysqli_error());
    $following = false;

    while($fetch = mysqli_fetch_array($query)){
        $thisUserFollowers++;
        if($fetch['follower'] == $_SESSION['user']){
            $following = true;
        }
    }
?>

<?php
if ($thisUsername != $_SESSION['user']) {

    if ($following) { ?>
        <form method="POST">
            <button type="submit" name="unfollow-btn">Unfollow</button>
        </form>
<?php 
    } 
    else{
?>
        <form method="POST">
            <button type="submit" name="follow-btn">Follow</button>
        </form>
<?php 
    } 
}



//follow and unfollow functions
if (isset($_POST['unfollow-btn'])) {
    $follower = $_SESSION['user'];
    $following = $_GET['user'];
    $deleteQuery = mysqli_query($conn, "DELETE FROM `followers` WHERE `follower` = '$follower' AND `following` = '$following'") or die(mysqli_error());
    if ($deleteQuery) header("Location: profile.php?user=" . $_GET["user"]);
    else echo "Failed to unfollow.";
}


if (isset($_POST['follow-btn'])) {
    $follower = $_SESSION['user'];
    $following = $thisUsername;
    $insertQuery = mysqli_query($conn, "INSERT INTO `followers` (`follower`, `following`) VALUES ('$follower', '$following')") or die(mysqli_error());
    if ($insertQuery) header("Location: profile.php?user=" . $_GET["user"]);
    else echo "Failed to follow.";
    
}
?>

<p>Followers: <?php echo $thisUserFollowers ?></p>


<p>Posts:</p>

<?php
    $query = mysqli_query($conn, "SELECT * FROM `posts` WHERE `user` = '$thisUsername'") or die(mysqli_error());
    while($fetch = mysqli_fetch_array($query)){
?>
    <div style="background-color:red;" href="thread.php?id=<?php echo $fetch['id']?>">
        <a href="thread.php?id=<?php echo $fetch['id']?>"><h3><?php echo $fetch['title']?> </h3> </a>
        <p><?php echo $fetch['body']?></p>

    </div>
<?php
    }
?>




</body>
</html>
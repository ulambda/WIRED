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
    
        $postsQuery = mysqli_query($conn, "SELECT * FROM `posts` WHERE `id` ORDER BY `id` DESC LIMIT 10") or die(mysqli_error());
        while($fetch = mysqli_fetch_array($postsQuery)){
        
            $postUser = $fetch['user'];
            $postTitle = $fetch['title'];
            $postBody = $fetch['body'];
            $postDate = $fetch['date'];
            $postID = $fetch['id'];
    ?>
       
        <div style="background-color:gray; margin-bottom:10px;">
            <div>
                
                <?php
                    $userQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$postUser'") or die(mysqli_error());
                    if($fetch = mysqli_fetch_array($userQuery)){
                        $postUserpfp = $fetch['pfp'];
                    }
                ?>

                <img src="images/profile-icons/<?php echo $postUserpfp?>" alt="" style="width:50px; height:50px; border-radius:100px;">


            <a href="profile.php?user=<?php echo $postUser?>">by <?php echo $postUser?></a> at <?php echo $postDate?>

            </div>
            <a href="thread.php?id=<?php echo $postID?>"><h3><?php echo $postTitle?> </h3> </a>
            <p><?php echo $postBody?></p> 

            <?php  
                $thisPostLikes = 0;

                $likesQuery = mysqli_query($conn, "SELECT * FROM `likes` WHERE `postid` =  '$postID'") or die(mysqli_error());
                $liked = false;

                while($fetch = mysqli_fetch_array($likesQuery)){
                    $thisPostLikes++;
                    if($fetch['user'] == $_SESSION['user']){
                        $liked = true;
                    }
                }
            ?>


            <div>
                <button>Like <?php echo $thisPostLikes?></button>
                <a href="thread.php?id=<?php echo $postID?>"><button>Open post</button> </a>
            </div>
         </div>

         <kbr>
         

    <?php
        }
    ?>

</body>
</html>
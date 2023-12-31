<?php 
    session_start();
    include 'includes/head.php';

    if(!isset($_SESSION['user'])){
        header('location: auth/signin.php');
        die();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="searchbar" value="<?php echo $_GET['result']?>">
        <button name="querySearch">Search</button>
    </form>

    <?php 
    if(isset($_GET['querySearch']) || isset($_GET['searchbar'])){
        $searchbarValue = $_GET['searchbar'];
        header('location: search.php?result=' . $searchbarValue);
    }
    ?>
    <p>Results for: "<?php echo $_GET['result'] ?>"</p>

    <?php
        $searchTerm = $_GET['result'];
        $query = mysqli_query($conn, "SELECT * FROM `posts` WHERE `body` LIKE '%" . $searchTerm . "%'") or die(mysqli_error());
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
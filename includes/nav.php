<div style="display:flex;">
    <a href="/mother/index.php" style="padding:10px;">home</a>
    <a href="/mother/search.php" style="padding:10px;">search</a>


    <a href="/mother/profile.php?user=<?php echo $_SESSION['user']?>" style="padding:10px;">users</a>
    <a href="/mother/post.php" style="padding:10px;">post</a>

    <div style="position:absolute; right:10px; top:-5px; display:flex;">
        <?php 
            if($_SESSION['user']){
        ?>
            <a href="/mother/auth/logout.php" style="padding:15px;">Logout</a>
            <p>Signed in as: <a href="/mother/profile.php?user=<?php echo $_SESSION['user']?>"> <?php echo $_SESSION['user']?> </a></p>

        <?php 
            } 
            else{ 
        ?>
            <a href="/mother/auth/signin.php" style="padding:10px;">signIn</a>
            <a href="/mother/auth/signup.php" style="padding:10px;">signUp</a>

        <?php 
            } 
        ?>


    </div>
</div>
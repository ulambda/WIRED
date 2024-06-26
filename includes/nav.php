<div style="display:flex;">
    <a href="/WIRED/index.php" style="padding:10px;">home</a>
    <a href="/WIRED/search.php?result=" style="padding:10px;">search</a>


    <a href="/WIRED/profile.php?user=<?php echo $_SESSION['user']?>" style="padding:10px;">users</a>
    <a href="/WIRED/post.php" style="padding:10px;">post</a>

    <div style="position:absolute; right:10px; top:-5px; display:flex;">
        <?php 
            if($_SESSION['user']){
        ?>
            <a href="/WIRED/auth/logout.php" style="padding:15px;">Logout</a>
            <p>Signed in as: <a href="/WIRED/profile.php?user=<?php echo $_SESSION['user']?>"> <?php echo $_SESSION['user']?> </a></p>

        <?php 
            } 
            else{ 
        ?>
            <a href="/WIRED/auth/signin.php" style="padding:10px;">signIn</a>
            <a href="/WIRED/auth/signup.php" style="padding:10px;">signUp</a>

        <?php 
            } 
        ?>


    </div>
</div>
<?php
	$conn = mysqli_connect('localhost', 'root', '', 'wireddb') or die(mysqli_error());
	if(!$conn)die("Error: Failed to connect to database");

?>

<nav class="nav">
    <?php 
        include 'nav.php';
    ?>
</nav>
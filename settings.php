<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>
<body>
<h1>Change username</h1>
<form method="POST">
    <label>New username</label>
    <input type="text" name="newUsername">
    <label>Current Password</label>
    <input type="password" name="currentPassword">
    <button name="changeUsername">update</button>
</form>

<?php
    if(ISSET($_POST['changeUsername'])){
        $newUsername = $_POST['newUsername'];
        $currentPassword = $_POST['currentPassword'];

    }
?>

<h1>Change password</h1>
<form method="POST">
    <label>Old Password</label>
    <input type="text">
    <label>New Password</label>
    <input type="password">
    <button name="changePassword">update</button>

</form>

<?php
    if(ISSET($_POST['changePassword'])){
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];

    }
?>

<h1>Change profile picture</h1>

</body>
</html>
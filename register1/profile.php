<?php 
    session_start();
    require_once("functions.php");
    if(!isset($_SESSION["success"])) {
        header("location: login.php");
        die();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile page</title>
</head>
<body>
    <h3>welcome to profile page</h3>
    <a href="logout.php">logout</a>
</body>
</html>
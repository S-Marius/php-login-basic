<?php
    session_start();
    $sessionid = $_SESSION['id'];
    if ($sessionid == "") {
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h1>Your Profile (logged in)</h1>
    <img src="https://judymoon.com/wp-content/uploads/Yay-01-1024x578.png" alt="yay happy image">
    <br>
    <a href="./out.php">logout</a>
</body>
</html>
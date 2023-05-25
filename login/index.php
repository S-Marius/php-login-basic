<?php
session_start();
$sessionid = isset($_SESSION['id']) ? $_SESSION['id'] : "";
if (!empty($sessionid)) {
    header('Location: welcome.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">


</head>

<body>
    <h1>Login</h1>

    <form action="utility/login.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email">

        <label for="password">Password</label>
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>
</body>

</html>
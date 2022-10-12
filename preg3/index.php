<?php 
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php include("./partials/header.php");?>
    <?php if(isset($_SESSION['id'])){?>
        <h1>Bienvenido <?=  $_SESSION['usuario'];?></h1>
        <a href="logout.php">Log out</a>
    <?php } else {?>
        <h1>Please Login or Sign Up</h1>
        <a href="login.php">Login</a> or
        <a href="signup.php">Sign Up</a>
    <?php } ?>
</body>
</html>
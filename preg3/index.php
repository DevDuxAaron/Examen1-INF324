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
        <div class="main">
            <div class="container2">
                <div class="form">
                    <h4 class="brand">SISTEMA INF-324</h4>
                    <h2 class="subtitle">
                        Bienvenido <?=  $_SESSION['usuario'];?>
                    </h2>
                    <hr>
                    <a class="button" href="logout.php">Log out</a>
                    
                    </div>
                <div class="image">
                    <img src="./assets/team.svg" alt="team">
                </div>
            </div>
        </div>
    <?php } else {?>
        <div class="main">
            <div class="container">
                <form action="login.php" method="post" class="form">
                    <h4 class="brand">SISTEMA INF-324</h4>
                    <h2 class="subtitle">
                        Bienvenido de vuelta
                    </h2>
                    <hr>
                    <a class="button" href="login.php">Login</a>
                    <a class="button" href="signup.php">Sign Up</a>
                </form>    
                <div class="image">
                    <img src="./assets/team.svg" alt="team">
                </div>
            </div>
        </div>
    <?php } ?>
</body>
</html>
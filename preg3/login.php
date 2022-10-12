<?php
    include("database.php");

    if(isset($_POST['user']) && isset($_POST['password'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $query = "SELECT * FROM acceso WHERE usuario LIKE '$user' AND password LIKE '$password'";
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query Failed");
        }
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            session_start();
            $_SESSION["id"]=$row['id'];
            $_SESSION["usuario"]=$user;
            $_SESSION["password"]=$password;
            // $_SESSION["nombre"]=$row['nombre_completo'];
            $_SESSION["rol"]=$row['rol'];
            
            header("Location: /preg3/index.php");
        }

        // echo "Saved";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php include("./partials/header.php");?>
<div class="main">
    <div class="container">
        <form action="login.php" method="post" class="form">
            <h4 class="brand">SISTEMA INF-324</h4>
            <h2 class="subtitle">
                Bienvenido de vuelta
            </h2>
            <hr>
            <label for="user">
                <span>Usuario</span>
                <input class="field" type="text" id="user" name="user" placeholder="Escribe tu usuario">
            </label>
            <label for="pwd">
                <span>Contraseña</span>
                <input class="field" type="password" name="password" id="pwd" placeholder="Ingresa tu contraseña">
            </label>
            <input class="btn" type="submit" value="Login">
            <p class="register">Aún no estás registrado? <a href="signup.php">Regístrate</a></p>
        </form>
        <div class="image">
            <img src="./assets/team.svg" alt="team">
        </div>
    </div>
</div>
</body>
</html>
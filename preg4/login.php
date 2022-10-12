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
            
            header("Location: /preg4/index.php");
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
    <h1>Login</h1>
    <span>or <a href="signup.php">Sign Up</a></span>
    <form action="login.php" method="post">
        <input type="text" name="user" placeholder="Ingresa tu usuario">
        <input type="password" name="password" id="pwd" placeholder="Ingresa tu contraseña">
        <input type="submit" value="Send">
    </form>
</body>
</html>
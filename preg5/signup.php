<?php
    include("database.php");

    $existe_password = isset($_POST['password']) && isset($_POST['confirm_password']);
    $igual_password = false;
    if ($existe_password){
        $igual_password = $_POST['password'] == $_POST['confirm_password'];
    }
    $existe_usuario = isset($_POST['user']);
    $existe_ci = isset($_POST['ci']);
    if($igual_password && $existe_usuario && $existe_ci){
        $usuario = $_POST['user'];
        $ci = $_POST['ci'];
        $password = $_POST['password'];
        $rol = "estudiante";
        $query = "INSERT INTO acceso(ci, usuario, password, rol) VALUES ('$ci', '$usuario', '$password', '$rol')";
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query Failed");
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
    <title>Registro</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php include("./partials/header.php");?>

    <h1>Regístrate</h1>
    <span>o <a href="login.php">Inicia sesión</a></span>
    <form action="signup.php" method="post">
        <input type="text" name="user" placeholder="Ingresa tu nombre">
        <input type="number" name="ci" placeholder="Ingresa tu ci">
        <input type="password" name="password" id="pwd1" placeholder="Ingresa tu contraseña">
        <input type="password" name="confirm_password" id="pwd2" placeholder="Confirma tu contraseña">
        <input type="submit" value="Send">
    </form>
</body>
</html>
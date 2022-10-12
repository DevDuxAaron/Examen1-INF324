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

<div class="main">
        <div class="container">
            <form action="signup.php" method="post" class="form">
                <h4 class="brand">SISTEMA INF-324</h4>
                <h2 class="subtitle">
                    Bienvenido de vuelta
                </h2>
                <hr>
                <label for="user">
                    <span>Usuario</span>
                    <input class="field" type="text" id="user" name="user" placeholder="Escribe tu usuario">
                </label>
                <label for="ci">
                    <span>CI</span>
                    <input class="field" type="number" id="ci" name="ci" placeholder="Escribe tu CI">
                </label>
                <label for="pwd1">
                    <span>Contraseña</span>
                    <input class="field" type="password" name="password" id="pwd1" placeholder="Ingresa tu contraseña">
                </label>
                <label for="pwd2">
                    <span>Confirma tu ontraseña</span>
                    <input class="field" type="password" name="confirm_password" id="pwd2" placeholder="Confirma tu contraseña">
                </label>
                <input class="btn" type="submit" value="Sign Up">
                <p class="register">Ya estás registrado? <a href="login.php">Inicia sesión</a></p>
            </form>
            <div class="image">
                <img src="./assets/team.svg" alt="team">
            </div>
        </div>
    </div>
</body>
</html>
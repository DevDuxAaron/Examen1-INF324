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
        
        <?php 
            if($_SESSION['rol'] == "director"){
                $query = "SELECT * FROM inscripcion ins, persona per WHERE per.ci=ins.ci_estudiante;";
                $result = mysqli_query($conn, $query);
                if (!$result){
                    die("Query Failed");
                }
                
                $promedios = array(0,0,0,0,0,0,0,0,0);
                $numEstudiantesDept = array(0,0,0,0,0,0,0,0,0);
                $deptos = array('Chuquisaca', 'La Paz', 'Cochabamba', 'Oruro', 'Potosí', 'Tarija', 'Santa Cruz', 'Beni', 'Pando');
                $numEstudiantes = 0;

                while ($row = mysqli_fetch_array($result)) {
                    $dep = $row['departamento'];
                    $promedios[$dep-1] += $row['nota_final'];
                    $numEstudiantesDept[$dep-1] ++;
                    $numEstudiantes ++;
                }
                for ($i=0; $i < 9; $i++) { 
                    if($numEstudiantesDept[$i] != 0){
                        $promedios[$i] = $promedios[$i]/$numEstudiantesDept[$i];
                    }
                }
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Departamento</th>
                            <th>Nota promedio</th>
                            <th>Numero de estudiantes</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                for ($i=0; $i < 9; $i++) { ?>
                    <tr>
                        <td><?php 
                            echo $i+1;
                        ?></td>
                        <td><?php 
                            echo $deptos[$i];
                        ?></td>
                        <td><?php echo $promedios[$i];?></td>
                        <td><?php echo $numEstudiantesDept[$i];?></td>
                    </tr>
                <?php }
                ?>
                </tbody>
                <?php
            } 
        ?>
        </table>
    <?php } else {?>
        <h1>Please Login or Sign Up</h1>
        <a href="login.php">Login</a> or
        <a href="signup.php">Sign Up</a>
    <?php } ?>
</body>
</html>
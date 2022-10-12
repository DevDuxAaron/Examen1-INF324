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
                    <div class="table">
                        <label for="codigo">
                            <span>Code</span>
                        </label>
                        <label for="dept">
                            <span>Departamento</span>
                        </label>
                        <label for="prom">
                            <span>Promedio</span>
                        </label>
                        <label for="nro">
                            <span>Nro Estudiantes</span>
                        </label>
                        <?php
                        for ($i=0; $i < 9; $i++) { ?>
                            <div class="field"><?php echo $i+1; ?></div>
                            <div class="field"><?php echo $deptos[$i]; ?></div>
                            <div class="field"><?php echo $promedios[$i];?></div>
                            <div class="field"><?php echo $numEstudiantesDept[$i];?></div>
                        <?php }
                        ?>
                    <?php  ?></div><?php
                        } 
                    ?>
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
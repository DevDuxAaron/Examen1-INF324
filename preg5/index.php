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
                            $query = "select departamento codigo, CASE per.departamento 
                            WHEN '01'then 'Chuquisaca'
                            WHEN '02'then 'La Paz'
                            WHEN '03'then 'Cochabamba'
                            WHEN '04'then 'Oruro'
                            WHEN '05'then 'Potosí'
                            WHEN '06'then 'Tarija'
                            WHEN '07'then 'Santa Cruz'
                            WHEN '08'then 'Beni'
                            WHEN '09'then 'Pando'
                            else 'otro'
                            END
                            departamento,AVG(ins.nota_final) promedio, Count(ins.nota_final) estudiantes
                            from persona per, inscripcion ins where per.ci=ins.ci_estudiante GROUP BY per.departamento;";
                            $result = mysqli_query($conn, $query);
                            if (!$result){
                                die("Query Failed");
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
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <div class="field"><?php echo $row['codigo']; ?></div>
                                <div class="field"><?php echo $row['departamento']; ?></div>
                                <div class="field"><?php echo $row['promedio'];?></div>
                                <div class="field"><?php echo $row['estudiantes'];?></div>    
                    <?php
                            }
                            ?></div><?php
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
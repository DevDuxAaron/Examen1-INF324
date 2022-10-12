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
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php 
                                echo $row['codigo'];
                            ?></td>
                            <td><?php 
                                echo $row['departamento'];
                            ?></td>
                            <td><?php echo $row['promedio'];?></td>
                            <td><?php echo $row['estudiantes'];?></td>
                        </tr>
                    <?php
                }
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
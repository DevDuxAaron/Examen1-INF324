<?php include('header.php') ?>

<body>
    <div class="container text-uppercase">
        <br><br>
        <h3 class="text-center"> <b>Formulario</b></h3>
        <br>
        <form action=<?= $link ?> method="POST">
            <div class="form-group">
                <label>Ci</label>
                <input type="text" class="form-control" value="<?php echo (isset($persona)) ? $persona['0']->ci : ""; ?>" name="ci" placeholder="9999999">
            </div>
            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" class="form-control" value="<?php echo (isset($persona)) ? $persona['0']->nombre : ""; ?>" name="nombre_completo" placeholder="Nombres Apellido Paterno Apellido Materno ">
            </div>
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input type="text" class="form-control" value="<?php echo (isset($persona)) ? $persona['0']->fecha_nac : ""; ?>" name="fecha_nacimiento" placeholder="dd/mm/yyyy">
            </div>
            <div class="form-group">
                <label>Departamento</label>
                <input type="text" class="form-control" value="<?php echo (isset($persona)) ? $persona['0']->departamento : ""; ?>" name="departamento" placeholder="01 or 02 or 03....">
            </div><br>
            <button type="submit" class="btn btn-dark text-uppercase"><?php echo $action; ?></button>

    </div>
    </form>
</body>

</html>
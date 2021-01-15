<?php
session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Clases Castellano</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
    <script type="text/javascript" src="../js/scripts.js"></script>
</head>
<body>
<section>
    <a href="http://www.lagun-artean.org/"><img src="../img/logotipo_lagunartean.jpg" height="53" width="200"></a>
    <header>
        <h1 class="title"> <a href="..">Administración - Servicio de Atención Diurna IREKIA</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a href="registroAdmin.php">Registro Usuario </a></li>
            <li><a href="comprobarSolicitudes.php">Comprobar Solicitudes</a></li>
            <li><a href="verUsuarios.php">Ver Usuarios</a></li>
            <li><a href="verCitasDuchasAdmin.php">Ver Citas Ducha</a></li>
            <li><a href="mantenimientoDuchas.php">Mantenimiento Duchas</a></li>
            <li><a href="verCitasLavanderiaAdmin.php">Ver Citas Lavandería</a></li>
            <li><a href="verRopaAdmin.php">Ver Ropa Lavandería</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Gestionar Clases Castellano</a>
                <div class="dropdown-content">
                    <a href="matricularAlumnoAdmin.php">Matricular Alumno</a>
                    <a href="desmatricularAlumnoAdmin.php">Desmatricular Alumno</a>
                    <a href="anyadirClasesAdmin.php">Añadir Nueva Clase</a>
                    <a class="active" href="eliminarClasesAdmin.php">Eliminar Clase</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Estadísticas</a>
                <div class="dropdown-content">
                    <a href="usuariosNacionalidad.php">Usuarios por nacionalidad</a>
                    <a href="usoDuchasPorDia.php">Uso de las duchas</a>
                    <a href="usoLavanderiaPorDia.php">Uso de la lavandería</a>
                    <a href="usoCafePorDía.php">Uso del servicio del café</a>
                </div>
            </li>
            <li style="float:right"><a href="logout.php">Salir</a></li>
        </ul>
    </nav>
</section>
<br>
<br>
<section>
    <?php
    include 'conexion.php';
    $sql = "SELECT * FROM Clases;";
    $result = $conexion->query($sql);
    if($_SESSION["usu_id"]=="admin"){
        if ($result->num_rows > 0) {
            echo "<table id='citasDucha'><tr><th>Grupo</th><th>Dias</th><th>Hora</th><th>Nivel</th><th>Capacidad</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["idClase"]."</td><td>".$row["fecha"]."</td><td>".$row["hora"]."</td><td>".$row["nivel"]."</td><td>".$row["capacidad"]."</td></tr>";
            }
            echo "</table>";
        }else if($result->num_rows < 0){
            echo"<p>No hay clases en el sistema.</p>";
        }
    }else {
        $message = "Error, por favor inicia sesion.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location='index.php';</script>";
    }

    ?>
    <form id="formBorrarClase" method="post" action="eliminarClase.php">
        <h3>Borrar Clase</h3>
        <p>Seleccione la clase a eliminar</p>
        <hr>
        <label ><b>Grupo</b></label>
        <br>
        <br>
        <?php
        //$sql = "SELECT idClase from Clases;";
        if ($_SESSION["usu_id"]=="admin"){
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
                echo "<select id= \"combo\" name=\"combo\">";
                while($row = $result->fetch_assoc()) {
                    echo "<option id =".$row["idClase"]." value=".$row["idClase"].">".$row["idClase"]."</option>";
                }
                echo"<br>";
                echo"<br>";
                echo"</select>";
                echo"<br>";
                echo"<br>";
                echo"<div class=\"clearfix\">";
                echo"<button type =\"submit\">Borrar</button>";
                echo"</div>";
            }else if($result->num_rows < 0){
                echo"<p>No hay clases en el sistema.</p>";
            }
        }else {
            $message = "Error, por favor inicia sesion.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script type='text/javascript'>window.location='index.php';</script>";
        }
        ?>
    </form>
</section>
</body>
</html>

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
                    <a class ="active"href="desmatricularAlumnoAdmin.php">Desmatricular Alumno</a>
                    <a href="anyadirClasesAdmin.php">Añadir Nueva Clase</a>
                    <a href="eliminarClasesAdmin.php">Eliminar Clase</a>
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
    $grupo= $_POST["combo1"];
    $_SESSION["grupoDesmatricular"]=$grupo;
    $sql = "Select Usuario.nick, Usuario.nombre, Usuario.apellido1, Usuario.apellido2,Clases.idClase from Usuario inner join Matricula on Usuario.idUsuario=Matricula.idUsuario inner join Clases on Matricula.idClase = Clases.idClase where Clases.idClase= '$grupo';";
    $result = $conexion->query($sql);
    if(isset($_SESSION["usu_id"])=="admin"){
        if ($result->num_rows > 0) {
            echo "<table id='citasDucha'><tr><th>Nick</th><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th><th>Grupo</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["nick"]."</td><td>".$row["nombre"]."</td><td>".$row["apellido1"]."</td><td>".$row["apellido2"]."</td><td>".$row["idClase"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p><b>No hay usuarios matriculados en esta clase.</b></p>";
        }
    }
    ?>
    <form id="borrarAlumnoGrupo" method="post" action="borrarAlumnoGrupo.php">
        <h3>Desmatricular Alummno</h3>
        <hr>
        <p>Seleccione el grupo que deseas buscar</p>
        <?php
        include 'conexion.php';
        $sql = "Select Usuario.nick, Usuario.nombre, Usuario.apellido1, Usuario.apellido2,Clases.idClase, Clases.fecha, Clases.hora, Clases.nivel from Usuario inner join Matricula on Usuario.idUsuario=Matricula.idUsuario inner join Clases on Matricula.idClase = Clases.idClase where Clases.idClase= '$grupo';";
        if ($_SESSION["usu_id"]=="admin"){
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
                echo "<select id= \"combo1\" name=\"combo1\">";
                while($row = $result->fetch_assoc()) {
                    echo "<option id =".$row["nick"]." value=".$row["nick"].">".$row["nick"]."</option>";
                }
                echo"<br>";
                echo"<br>";
                echo"</select>";
                echo"<br>";
                echo"<br>";
                echo"<div class=\"clearfix\">";
                echo"<button type =\"submit\">Eliminar</button>";
                echo"</div>";
            }else if($result->num_rows <= 0){
                echo"<p>No hay usuarios matriculados en esta clase.</p>";
            }
        }
        ?>
    </form>
</section>
</body>
</html>

<?php
session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mantenimiento Duchas</title>
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
            <li><a class ="active" href="mantenimientoDuchas.php">Mantenimiento Duchas</a></li>
            <li><a href="verCitasLavanderiaAdmin.php">Ver Citas Lavandería</a></li>
            <li><a href="verRopaAdmin.php">Ver Ropa Lavandería</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Gestionar Clases Castellano</a>
                <div class="dropdown-content">
                    <a href="matricularAlumnoAdmin.php">Matricular Alumno</a>
                    <a href="desmatricularAlumnoAdmin.php">Desmatricular Alumno</a>
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
    $usu_id=$_SESSION["usu_id"];
    $fecha = $_POST["fecha"];
    $sql = "Select Ducha.duchaFisica,Ducha.averiada ,Ducha.hora from Ducha inner join Duchan on Ducha.idDucha = Duchan.idDucha where Duchan.fecha='$fecha';";
    $result = $conexion->query($sql);
    if(isset($_SESSION["usu_id"])=="admin"){
        if ($result->num_rows > 0) {
            echo "<table id='citasDucha'><tr><th>Ducha</th><th>Estado de la ducha</th><th>Hora</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row["averiada"]==0){
                    $averiada ="En funcionamiento.";
                }else if($row["averiada"]==1){
                    $averiada ="Averiada";
                }
                echo "<tr><td>".$row["duchaFisica"]."</td><td>$averiada</td><td>".$row["hora"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p><b>No hay citas para la ducha en el dia de hoy.</b></p>";
        }
    }
    ?>
    <form id="duchasAveriadas" value="duchasAveriadas"  method="POST" action="cancelarDuchasAdmin.php">
        <div class="container">
        <br>
        <label><b>Ducha averiada</b></label>
        <hr>
        <select id="ducha" name="ducha">
            <option value="" selected="selected">Selecciona una ducha</option>
            <option value="1">Ducha 1</option>
            <option value="2">Ducha 2</option>
            <option value="3">Ducha 3</option>
        </select>
        <div class="clearfix">
            <button type ="submit">Ducha Averiada</button>
        </div>
        </div>
    </form>
    <form id="todasArregladas" value="todasArregladas" method="post" action="arreglarDuchasAdmin.php">
        <div class="container">
        <br>
        <label><b>Ducha arreglada</b></label>
        <hr>
        <select id="ducha" name="ducha">
            <option value="" selected="selected">Selecciona una ducha</option>
            <option value="1">Ducha 1</option>
            <option value="2">Ducha 2</option>
            <option value="3">Ducha 3</option>
        </select>
            <div class="clearfix">
                <button type ="submit">Duchas Arreglada</button>
            </div>
        </div>
    </form>
</section>
<section>
</section>

</body>
</html>

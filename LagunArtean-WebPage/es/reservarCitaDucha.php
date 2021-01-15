<?php
session_start();
include 'conexion.php';
$usu_id=$_SESSION["usu_id"];
$idDucha = $_POST["combo"];
$fecha= $_SESSION["fecha"];
$sql= "insert into Duchan(idUsuario,idDucha,fecha) values ('$usu_id','$idDucha','$fecha')";
//$sql= "insert into Duchan(idUsuario,idDucha,fecha) values ('2,'2','2020-02-01')";
mysqli_query($conexion,$sql);
//mysqli_close($conexion);
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cita Ducha</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
    <script src="../js/scripts.js"></script>
</head>
<body>
<section>
    <a href="http://www.lagun-artean.org/"><img src="../img/logotipo_lagunartean.jpg" height="53" width="200"></a>
    <header>
        <h1 class="title"> <a href="..">Servicio de Atención Diurna IREKIA</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a class ="active" href="citaDucha.php">Cita Ducha</a></li>
            <li><a href="verCitasDuchas.php">Ver Citas Ducha</a></li>
            <li><a href="citaLavanderia.php">Cita Lavandería</a></li>
            <li><a href="verCitasLavanderia.php">Ver Citas Lavanderia</a></li>
            <li><a href="clasesCastellano.php">Clases de Castellano</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Notificaciones</a>
                <div class="dropdown-content">
                    <?php
                    include 'conexion.php';
                    $sql ="SELECT Duchan.fecha, Ducha.duchaFisica ,Ducha.averiada, Ducha.hora FROM Duchan inner join Ducha on Duchan.idDucha = Ducha.idDucha where Duchan.idUsuario='$usu_id' and Duchan.fecha = CURDATE();";
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        echo"<a>Tienes reservada una ducha para hoy.</a>";
                    }else if($result->num_rows <= 0) {
                        echo "<a>No tienes ninguna reserva de ducha para hoy.</a>";
                    }
                    ?>
                </div>
            </li>
            <li style="float:right"><a href="logout.php">Salir</a></li>
        </ul>
    </nav>
</section>
<section>
    <p>Tienes una cita para la ducha: </p>
    <?php
    include 'conexion.php';
    $sql2="Select hora from Ducha where idDucha='$idDucha';";
    echo"<p><b>Dia: $fecha</b></p>";
    $result = $conexion->query($sql2);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo"<p><b>Hora: ".$row["hora"]."</b></p>";
        }
    }
    ?>
</section>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<footer>
    <div class="footer">
        <p><b>¿Donde estamos?<b></b></p>
        <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="373" id="gmap_canvas" src="https://maps.google.com/maps?q=lagun%20artean%20asociacion&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://speed-test-internet.com">speed-test-internet.com</a></div><style>.mapouter{position:relative;text-align:right;height:373px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:373px;width:1080px;}</style></div>
        <p>Correo electrónico: <a href="mailto:lagun-artean@lagun-artean.org">lagun-artean@lagun-artean.org</a>.</p>
        <p>Teléfono: <a href="tel:+34944472487">94 447 24 87</a>.</p>
    </div>
</footer>
</body>
</html>

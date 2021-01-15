<?php
session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cita Lavandería</title>
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
            <li><a href="citaDucha.php">Cita Ducha</a></li>
            <li><a href="verCitasDuchas.php">Ver Citas Ducha</a></li>
            <li><a class="active"href="citaLavanderia.php">Cita Lavandería</a></li>
            <li><a href="verCitasLavanderia.php">Ver Citas Lavanderia</a></li>
            <li><a href="clasesCastellano.php">Clases de Castellano</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Notificaciones</a>
                <div class="dropdown-content">
                    <?php
                    include 'conexion.php';
                    $sql ="SELECT Duchan.fecha, Ducha.duchaFisica ,Ducha.averiada, Ducha.hora FROM Duchan inner join Ducha on Duchan.idDucha = Ducha.idDucha where Duchan.idUsuario='$usu_id' and Duchan.fecha = CURDATE();";
                    $sql1 ="SELECT fecha, fechaRecogida, entregada, recogida from InfoLavanderia where InfoLavanderia.idUsuario = $usu_id and fecha = CURDATE() and recogida is false order by fecha;";
                    $sql2 ="SELECT fecha, fechaRecogida, entregada, recogida from InfoLavanderia where InfoLavanderia.idUsuario = $usu_id and fechaRecogida >= CURDATE() and recogida is true and entregada is false order by fecha;";
                    $result1 = $conexion->query($sql1);
                    $result2 = $conexion->query($sql2);
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        echo"<a>Tienes reservada una ducha para hoy.</a>";
                    }else if($result->num_rows <= 0){
                        echo"<a>No tienes ninguna reserva de ducha para hoy.</a>";
                    }
                    if($result1->num_rows > 0){
                        echo"<a>Tienes una cita en la lavanderia para hoy</a>";
                    }else if($result1->num_rows <= 0){
                        echo"<a>No tienes ninguna reserva de lavanderia para hoy.</a>";
                    }
                    if($result2->num_rows > 0){
                        echo"<a>Tienes ropa en la lavanderia por recoger.</a>";
                    }else if($result2->num_rows <= 0){
                        echo"<a>No tienes ropa en la lavanderia</a>";
                    }
                    ?>
                </div>
            </li>
            <li style="float:right"><a href="logout.php">Salir</a></li>
        </ul>
    </nav>
</section>
<section>
    <?php
    include 'conexion.php';
    $usu_id=$_SESSION["usu_id"];
    $fecha= $_POST["fecha"];
    $_SESSION["fechaEntrega"]=$fecha;
    $sql= "insert into InfoLavanderia(idUsuario,fecha, entregada) values ('$usu_id','$fecha',false)";
    $sql1="Select idUsuario from Usuario where '$usu_id' in (Select idUsuario from InfoLavanderia where fecha ='$fecha');";
    if($usu_id!="admin"){
        $result = $conexion->query($sql1);
        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                 if ($usu_id==$row["idUsuario"]){
                     echo "<p><b>Ya has elegido este dia para entregar la ropa.</b></p>";
                     echo"<p><b>Fecha: $fecha</b></p>";
                 }
             }
        }else if ($result->num_rows <= 0) {
            echo "<p><b>Tienes una cita para entregar la ropa en la lavanderia: </b></p>";
            mysqli_query($conexion,$sql);
            echo"<p><b>Fecha: $fecha</b></p>";
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

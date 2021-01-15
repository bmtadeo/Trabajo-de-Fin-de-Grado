<?php
session_start();
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
                    $sql1 ="SELECT fecha, fechaRecogida, entregada, recogida from InfoLavanderia where InfoLavanderia.idUsuario = $usu_id and fecha = CURDATE() and recogida is false order by fecha;";
                    $sql2 ="SELECT fecha, fechaRecogida, entregada, recogida from InfoLavanderia where InfoLavanderia.idUsuario = $usu_id and fechaRecogida => CURDATE() and recogida is true and entregada is false order by fecha;";
                    $result1 = $conexion->query($sql1);
                    $result2 = $conexion->query($sql2);
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        echo"<a>Tienes reservada una ducha para hoy.</a>";
                    }else if($result1->num_rows > 0){
                        echo"<a>Tienes una cita en la lavanderia para hoy<./a>";
                    }else if($result2->num_rows > 0){
                        echo"<a>Tienes ropa en la lavanderia por recoger.</a>";
                    }else{
                        echo"<a>No tienes ninguna notificación.</a>";
                    }
                    ?>
                </div>
            </li>
            <li style="float:right"><a href="logout.php">Salir</a></li>
        </ul>
    </nav>
</section>
<section>
    <form id="elegirDia" name="elegirDia" method="post" onsubmit="return obtenerDia()" action="elegirDiaDucha.php">
        <div class="container">
            <br>
            <br>
            <label ><b>Elige una fecha</b></label>
            <br>
            <br>
            <input type="date" id="fecha" name="fecha" required>
            <br>
            <br>
            <div class="clearfix">
                <button type ="submit">Mostrar horas</button>
            </div>
        </div>
    </form>
    <p id = "error"></p>
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
<script>
    function obtenerDia() {
        var dia = document.elegirDia.fecha;
        var dias = ["Domingo","Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
        var dt = new Date(dia.value);
        if (dias[dt.getUTCDay()] == "Sabado"||dias[dt.getUTCDay()] == "Domingo"){
            var error = document.getElementById('error');
            error.innerHTML ="Lo sentimos, nuestras instalaciones no abren los sabados y domingos."
            return false;
        }else{
            document.elegirDia.submit();
        }
    }
</script>
</html>
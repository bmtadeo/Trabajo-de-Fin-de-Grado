<?php
session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Citas Duchas</title>
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
            <li><a class ="active" href="verCitasDuchasAdmin.php">Ver Citas Ducha</a></li>
            <li><a href="mantenimientoDuchas.php">Mantenimiento Duchas</a></li>
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
    <form id="elegirDia" name="elegirDia" method="post" onsubmit="return obtenerDia()" action="mostrarCitasDuchasAdmin.php">
        <div class="container">
            <label ><b>Elige una fecha</b></label>
            <br>
            <br>
            <input type="date" id="fecha" name="fecha" required>
            <br>
            <br>
            <div class="clearfix">
                <button type ="submit">Mostrar citas</button>
            </div>
        </div>
    </form>
    <p id = "error"></p>
</section>
<section>
</section>
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
</body>
</html>

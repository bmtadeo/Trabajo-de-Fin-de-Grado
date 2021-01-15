<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Usuario</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
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
            <li><a class ="active" href="registroAdmin.php">Registro Usuario </a></li>
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
<section>
    <form id="registroAdmin" name ="registroAdmin" method="post" action="registrarAdmin.php">
        <div class="container">
            <h3>Registro</h3>
            <p>Por favor, rellene los siguientes campos.</p>
            <hr>
            <label ><b>Nombre</b></label>
            <input type="text" placeholder="Nombre" name="nombre" id="nombre" required>

            <label ><b>Apellido 1</b></label>
            <input type="text" placeholder="Apellido 1" name="apellido1" id="apellido1"required>

            <label ><b>Apellido 2</b></label>
            <input type="text" placeholder="Apellido 2" name="apellido2" id="apellido2">

            <label ><b>Documentación </b></label>
            <input type="text" placeholder="Documentación" name="doc" id="doc">

            <label><b>Sexo</b></label>
            <select id="sexo" name="sexo">
                <option value="" selected="selected">Selecciona un sexo</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Otro">Otro</option>
            </select>
            <br>
            <br>
            <label><b>Nacionalidad </b></label>
            <input type="text" placeholder="Documentación" id="nacionalidad" name="nacionalidad">

            <label ><b>E-mail </b></label>
            <input type="text" placeholder="E-mail" name="email" id="email">

            <label ><b>Teléfono</b></label>
            <input type="text" placeholder="Teléfono" name="telf" id="telf">

            <label ><b>Fecha de nacimiento</b></label>
            <input type="date" name="nacimiento" id="nacimiento" required>

            <div class="clearfix">
                <button type="submit" onclick="registroUsuarioAdmin()">Registrar</button>
            </div>
        </div>
    </form>
</section>
</body>
</html>
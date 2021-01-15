<?php
session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Usuarios</title>
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
            <li><a class ="active" href="verUsuarios.php">Ver Usuarios</a></li>
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
<br>
<br>
<section>
    <?php
    include 'conexion.php';
    if(isset( $_SESSION["usu_id"])){
        $sql = "SELECT * FROM Usuario WHERE registroCompleto is true;";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) {
            echo "<table id='usuarios'><tr><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th><th>Nacimiento</th><th>Documentación</th><th>Telefono</th><th>Email</th><th>Nick</th><th>Contraseña</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["nombre"]."</td><td>".$row["apellido1"]."</td><td>".$row["apellido2"]."</td><td>".$row["nacimiento"]."</td><td>".$row["documentacion"]."</td><td>".$row["telefono"]."</td><td>".$row["email"]."</td><td>".$row["nick"]."</td><td>".$row["contrasenya"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No hay usuarios para completar el registro.";
        }
    }
    ?>
    <form id="editarUsuario" name ="editarUsuario" method="post" action="../es/editarUsuarioBD.php" >
        <div class="container">
            <h3>Editar Usuario</h3>
            <hr>
            <label><b>Usuario</b></label>
            <input type="text" placeholder="Usuario" id="user" name="user">
            <hr>
            <p>Edita los campos que desees.</p>
            <label><b>Nombre</b></label>
            <input type="text" placeholder="Nombre" id="nombre" name="nombre">

            <label><b>Apellido 1</b></label>
            <input type="text" placeholder="Apellido 1" id="apellido1" name="apellido1">

            <label><b>Apellido 2</b></label>
            <input type="text" placeholder="Apellido 2" id="apellido2" name="apellido2">

            <label><b>Documentacion</b></label>
            <input type="text" placeholder="Documentación" id="doc" name="doc" >

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

            <label><b>Telefono</b></label>
            <input type="text" placeholder="Teléfono" id="telf" name="telf" >

            <label><b>Email</b></label>
            <input type="text" placeholder="Email" id="email" name="email">

            <label><b>Contraseña</b></label>
            <input type="text" placeholder="Contraseña" id="contra" name="contra">

            <label ><b>Fecha de nacimiento</b></label>
            <input type="date" name="nacimiento" id="nacimiento">

            <div class="clearfix">
                <button type="submit" onclick="editarUsuario()">Editar Usuario</button>
            </div>
        </div>
    </form>

</section>
<script type="text/javascript">
    window.onload = addRowHandlers();
    function addRowHandlers() {
        var usuario =document.getElementById("user");
        var contra = document.getElementById("contrasenya");
        var table = document.getElementById("usuarios");
        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createClickHandler =
                function(row)
                {
                    return function() {
                        var cell = row.getElementsByTagName("td")[7];
                        var user = cell.innerHTML;
                        usuario.value=user;
                    };
                };

            currentRow.onclick = createClickHandler(currentRow);
        }
    }
    function editarUsuario() {
        document.editarUsuario.submit();
    }

</script>
</body>
</html>
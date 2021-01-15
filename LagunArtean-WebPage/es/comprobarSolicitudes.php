<?php
session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobar Solicitudes</title>
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
            <li><a class ="active" href="comprobarSolicitudes.php">Comprobar Solicitudes</a></li>
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
<br>
<br>
<section>
    <?php
        include 'conexion.php';
        if($_SESSION["usu_id"]=="admin"){
            $sql = "SELECT * FROM Usuario WHERE registroCompleto is false;";
            $result = $conexion->query($sql);
            if ($result->num_rows > 0) {
                echo "<table id='usuarios'><tr><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th><th>Nacimiento</th><th>Sexo</th><th>Nacionalidad</th><th>Documentación</th><th>Telefono</th><th>Email</th><th>Nick</th><th>Contraseña</th><th>Código QR</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($row["qr"]!=""){
                        $qr=$row["qr"];
                    }else{
                        $qr= "No dispone de codigo QR";
                    }
                    echo "<tr><td>".$row["nombre"]."</td><td>".$row["apellido1"]."</td><td>".$row["apellido2"]."</td><td>".$row["nacimiento"]."</td><td>".$row["sexo"]."</td><td>".$row["nacionalidad"]."</td><td>".$row["documentacion"]."</td><td>".$row["telefono"]."</td><td>".$row["email"]."</td><td>".$row["nick"]."</td><td>".$row["contrasenya"]."</td><td><img src=\"http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=$qr\"/></td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p><b>No hay usuarios para completar el registro.</b></p>";
            }
        }
    ?>
    <form id="completarRegistro" name ="completarRegistro" method="post" action="completarRegistro.php" >
        <div class="container">
            <h3>Completar Registro</h3>
            <hr>
            <label><b>Usuario</b></label>
            <input type="text" placeholder="Usuario" id="usuario" name="usuario">

            <label><b>Contraseña</b></label>
            <input type="text" placeholder="Contraseña" id="contrasenya" name="contrasenya">

            <label><b>Telefono</b></label>
            <input type="text" placeholder="Teléfono" id="telf" name="telf" >

            <label><b>Email</b></label>
            <input type="text" placeholder="Email" id="email" name="email">

            <div class="clearfix">
                <button type="submit" onclick="completarRegistro()">Completar Registro</button>
            </div>
        </div>
    </form>

</section>
<script type="text/javascript">
    window.onload = addRowHandlers();
    function addRowHandlers() {
        var usuario =document.getElementById("usuario");
        var contra = document.getElementById("contrasenya");
        var table = document.getElementById("usuarios");
        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createClickHandler =
                function(row)
                {
                    return function() {
                        var cell = row.getElementsByTagName("td")[9];
                        var cell2 = row.getElementsByTagName("td")[10];
                        var user = cell.innerHTML;
                        var pass = cell2.innerHTML;
                        usuario.value=user;
                        contra.value=pass;
                    };
                };

            currentRow.onclick = createClickHandler(currentRow);
        }
    }
    function completarRegistro() {
        document.completarRegistro.submit();
    }

</script>
</body>
</html>
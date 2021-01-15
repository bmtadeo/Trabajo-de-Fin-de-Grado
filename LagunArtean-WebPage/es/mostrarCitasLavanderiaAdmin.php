<?php
session_start();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Citas Lavandería</title>
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
            <li><a class ="active" href="verCitasLavanderiaAdmin.php">Ver Citas Lavandería</a></li>
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
    if(isset($_SESSION["fechaEntrega"])==""){
        $fecha=$_POST["fecha"];
        $_SESSION["fechaEntrega"]=$fecha;
    }else{
        $fecha=$_SESSION["fechaEntrega"];
    }
    $sql = "Select Usuario.nick, Usuario.nombre, Usuario.apellido1,Usuario.apellido2, Usuario.qr,InfoLavanderia.fecha, InfoLavanderia.entregada from Usuario inner join InfoLavanderia on Usuario.idUsuario=InfoLavanderia.idUsuario where InfoLavanderia.fecha='$fecha' and entregada is false;";
    $result = $conexion->query($sql);
    if(isset($_SESSION["usu_id"])){
        if ($result->num_rows > 0) {
            echo "<table id='citasLavanderia'><tr><th>Nick</th><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th><th>Fecha</th><th>Entregada</th><th>Código QR</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($row["entregada"]==0){
                    $entregada ="Todavia no se ha entregado.";
                }else if ($row["entregada"]!=0){
                    $entregada ="Entregada.";
                }
                if($row["qr"]!=""){
                    $qr=$row["qr"];
                }else{
                    $qr= "No dispone de codigo QR";
                }
                echo "<tr><td>".$row["nick"]."</td><td>".$row["nombre"]."</td><td>".$row["apellido1"]."</td><td>".$row["apellido2"]."</td><td id='fechaEntregada'>".$row["fecha"]."</td><td>$entregada</td><td><img src=\"http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=$qr\"/></td></tr>";
            }
            echo "</table>";
            echo "<button onclick=\"exportTableToExcel('citasLavanderia', 'citasLavanderia')\">Exportar a Excel</button>";
            ?>
            <section>
                <h3>Usuario seleccionado</h3>
                <h3 id="usuario"></h3>
                <form id="entregarRopa" name ="entregarRopa" method="post" action="entregarRopaAdmin.php">
                    <h3>Ropa entregada</h3>
                    <p>Por favor, rellene los siguientes campos.</p>
                    <hr>
                    <label ><b>Usuario</b></label>
                    <input type="text" placeholder="Usuario" name="user" id="user" required>
                    <div class="clearfix">
                        <button id="entregar" type="submit">Entregar</button>
                    </div>
                </form>
            </section>
    <?php
        } else {
            echo "<p><b>No hay citas para la lavandería en el dia de hoy.</b></p>";
        }
    }
    ?>
</section>
<script type="text/javascript">
    window.onload = addRowHandlers();
    function addRowHandlers() {
        var usuario =document.getElementById("usuario");
        var userForm =document.getElementById("user");
        var table = document.getElementById("citasLavanderia");
        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createClickHandler =
                function(row)
                {
                    return function() {
                        var cell = row.getElementsByTagName("td")[0];
                        var user = cell.innerHTML;
                        usuario.innerHTML="Usuario: " + user;
                        userForm.value=user;
                    };
                };

            currentRow.onclick = createClickHandler(currentRow);
        }
    }
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }

</script>
</body>
</html>









<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Servicio de Atención Diurna IREKIA</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<section>
    <a href="http://www.lagun-artean.org/"><img src="../img/logotipo_lagunartean.jpg" height="53" width="200"></a>
    <nav>
        <ul>
            <li><a class="active" href="../es/"> Castellano</a></li>
            <li><a href="../fr/">Français</a></li>
            <li><a href="../arab/">العربي</a></li>
        </ul>
    </nav>
    <header>
        <h1 class="title"><a href="..">Servicio de Atención Diurna IREKIA</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a href="inicioSesion.php">Iniciar Sesión </a></li>
            <li><a class="active" href="registro.php">Registro</a></li>
            <li><a href="cambioContrasena.php">Cambio Contraseña </a></li>
            <li style="float:right"><a href="ayuda.php">Ayuds</a></li>
        </ul>
    </nav>
</section>
<section>
    <h2>Para registrarte en el sistema, introduce tu nombre, tus apellidos, tu fecha de nacimiento y si dispones,
        documentacion. <br>
        Para completar el registro y asi poder hacer uso de las instalaciones, tendras que acudir a nuestro centro.</h2>
    <form id="registro" name ="registro" method="post" action="registrar.php" >
        <fieldset>
        <div class="container">
            <legend><b>Rellene los siguientes datos:</b></legend>
            <hr>
            <label><b>Nombre</b></label>
            <input type="text" placeholder="Nombre" id="nombre" name="nombre"  required>

            <label><b>Apellido1</b></label>
            <input type="text" placeholder="Apellido 1" id="apellido1" name="apellido1" required>

            <label><b>Apellido2</b></label>
            <input type="text" placeholder="Apellido 2" id="apellido2" name="apellido2">

            <label><b>Documentación</b></label>
            <input type="text" placeholder="Documentación" id="doc" name="doc">

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
            <input type="text" placeholder="Nacionalidad" id="nacionalidad" name="nacionalidad">

            <label><b>Fecha de nacimiento</b></label>
            <input type="date" id="nacimiento" name="nacimiento"  required>
        </fieldset>
            <div class="clearfix">
                <button type="submit" onclick="registroUsuario()">Registrar</button>
            </div>
        </div>
    </form>
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
<script>
    function registroUsuario() {
        var nombre = document.registro.nombre;
        var apellido1 = document.registro.apellido1;
        var apellido2 = document.registro.apellido2;
        var nacimiento = document.registro.nacimiento;
        if(nombre.value==""||apellido1.value==""||apellido2.value==""||nacimiento.value==""){
            alert("Por favor, rellena todos los campos obligatorios. El campo de Documentación no es obligatorio");
        }else if(nombre.length>50){
            alert("El nombre es demasiado largo.");
        }else if(apellido1.length>50){
            alert("El apellido 1 es demasiado largo.");
        }else if(apellido2.length>50){
            alert("El apellido 2 es demasiado largo.");
        }else{
            document.registro.submit();
        }
    }
</script>
</body>
</html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambio Contraseña- Servicio de Atención Diurna IREKIA</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
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
            <li><a href="inicioSesion.php">Iniciar Sesión</a></li>
            <li><a href="registro.php">Registro</a></li>
            <li><a class="active" href="cambioContrasena.php">Cambio Contraseña  </a></li>
            <li style="float:right"><a href="ayuda.php">Ayuda</a></li>
        </ul>
    </nav>
</section>
<section>
    <h3>Si se te ha olvidado la contraseña, ven a nuestras instalaciones y te la recordaremos.</h3>
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
<form name ="cambioContra" id="cambioContra" method="post" action="cambioContrasenya.php">
    <fieldset>
    <div class="container">
        <legend><b>Rellene los siguientes datos:</b></legend><br>
        <label ><b>Usuario</b></label>
        <input type="text" placeholder="Introduce el usuario" name="usuario" id="usuario"required>

        <label><b>Antigua Contraseña</b></label>
        <input type="password" placeholder="Introduce la antigua contraseña" name="contraAnt" id="contraAnt"required>

        <label><b>Nueva Contraseña</b></label>
        <input type="password" placeholder="Introduce la nueva contraseña" name="contraNue" id="contraNue"required>
    </fieldset>
        <button type="submit" onclick="cambioContrasenya()">Cambiar</button>
    </div>
</form>
<script>
    function cambioContrasenya(){
        var usuario = document.cambioContra.usuario;
        var contraAnt = document.cambioContra.contraAnt;
        var contraNue = document.cambioContra.contraNue;
        if (contraNue.value == "" ||contraAnt.value == "" || usuario.value == "") {
            alert("Por favor, rellena todos los campos.");
        }else if(contraNue.length<8){
            alert("La contraseña es demasiado corta.");
        }else{
            document.cambioContra.submit();
        }
    }
</script>
</body>
</html>
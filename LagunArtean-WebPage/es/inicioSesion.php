<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Servicio de Atención Diurna IREKIA</title>
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
        <h1 class="title"><a href="./">Servicio de Atención Diurna IREKIA</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a class="active" href="inicioSesion.php">Iniciar Sesión</a></li>
            <li><a href="registro.php">Registro</a></li>
            <li><a href="cambioContrasena.php">Cambio Contraseña</a></li>
            <li style="float:right"><a href="ayuda.php">Ayuda</a></li>
        </ul>
    </nav>
</section>
<section>
        <h3>Para Iniciar Sesión en el sistema, introduce tu usuario y contraseña.</h3>
</section>
<section>
<form name ="login" id="login" method="post" action="iniciarSesion.php">
    <div class="container">
        <label ><b>Usuario</b></label>
        <input type="text" placeholder="Introduce el usuario" id="usuario" name="usuario" required>

        <label><b>Contraseña </b></label>
        <input type="password" placeholder="Introduce la contraseña" id="contra" name="contra" required>

        <div class="clearfix">
            <button type="submit" onclick="loginUsuarios()">Iniciar Sesión</button>
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
    function loginUsuarios() {
        var usuario = document.login.usuario;
        var contra = document.login.contra;
        if (contra.value == "" || usuario.value == "") {
            alert("Por favor, rellena todos los campos");
        }else if(usuario.length>50){
            alert("El usuario es demasiado largo.");
        } else if(contra.length>50){
            alert("La contraseña es demasiado larga.");
        }else{
            document.login.submit();
        }
    }
</script>
</body>
</html>
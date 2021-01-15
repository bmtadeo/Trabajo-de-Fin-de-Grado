<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - IREKIA Day Care Service</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
</head>
<body>
<section>
    <a href="http://www.lagun-artean.org/"><img src="../img/logotipo_lagunartean.jpg" height="53" width="200"></a>
    <nav>
        <ul>
            <li><a  href="../es/"> Castellano</a></li>
            <li><a class="active" href="../fr/">Français</a></li>
            <li><a href="../arab/">العربي</a></li>
        </ul>
    </nav>
    <header>
        <h1 class="title"><a href="./">Service de garde d'enfants IREKIA</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a class="active" href="inicioSesion.php">Connexion</a></li>
            <li><a href="registro.php">Inscription</a></li>
            <li><a href="cambioContrasena.php">Changer le mot de passe</a></li>
            <li style="float:right"><a href="ayuda.php">Aide</a></li>
        </ul>
    </nav>
</section>
<section>
        <h3>Pour vous connecter au système, entrez votre nom d'utilisateur et votre mot de passe.</h3>
</section>
<form name ="login" id="login" method="post" action="iniciarSesion.php">
    <div class="container">
        <label ><b>Utilisateur</b></label>
        <input type="text" placeholder="Entrez l'utilisateur" id="usuario" name="usuario" required>

        <label><b>Passe </b></label>
        <input type="password" placeholder="Entrez le mot de passe" id="contra" name="contra" required>

        <div class="clearfix">
            <button type="submit" onclick="loginUsuarios()">Connexion</button>
        </div>
    </div>
</form>
<script>
    function loginUsuarios() {
        var usuario = document.login.usuario;
        var contra = document.login.contra;
        if (contra.value == "" || usuario.value == "") {
            alert("Veuillez remplir tous les champs");
        }else if(usuario.length>50){
            alert("L'utilisateur est trop long.");
        } else if(contra.length>50){
            alert("Le mot de passe est trop long.");
        }else{
            document.login.submit();
        }
    }
</script>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<footer>
    <div class="footer">
        <p><b>Où sommes-nous?<b></b></p>
        <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="373" id="gmap_canvas" src="https://maps.google.com/maps?q=lagun%20artean%20asociacion&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://speed-test-internet.com">speed-test-internet.com</a></div><style>.mapouter{position:relative;text-align:right;height:373px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:373px;width:1080px;}</style></div>
        <p>Courrier électronique: <a href="mailto:lagun-artean@lagun-artean.org">lagun-artean@lagun-artean.org</a>.</p>
        <p>Téléphone: <a href="tel:+34944472487">94 447 24 87</a>.</p>
    </div>
</footer>
</body>
</html>
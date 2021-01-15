<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Changer le mot de passe - Service de garde d'enfants IREKIA</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
</head>
<body>
<section>
    <a href="http://www.lagun-artean.org/"><img src="../img/logotipo_lagunartean.jpg" height="53" width="200"></a>
    <nav>
        <ul>
            <li><a  href="../es/"> Castellano</a></li>
            <li><a href="../fr/">Français</a></li>
            <li><a class="active" href="../arab/">العربي</a></li>
        </ul>
    </nav>
    <header>
        <h1 class="title"><a href="..">Service de garde d'enfants IREKIA</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a  href="inicioSesion.php">Connexion</a></li>
            <li><a  href="registro.php">Inscription</a></li>
            <li><a class="active" href="cambioContrasena.php">Changer le mot de passe</a></li>
            <li style="float:right"><a href="ayuda.php">Aide</a></li>
        </ul>
    </nav>
</section>
<section>
    <h3>Si vous avez oublié votre mot de passe, venez dans nos locaux et nous vous le rappellerons.</h3>
</section>
<form name ="cambioContra" id="cambioContra" method="post" action="cambioContrasenya.php">
    <fieldset>
    <div class="container">
        <legend><b>Veuillez remplir les informations suivantes :</b></legend><br>
        <label ><b>Utilisateur</b></label>
        <input type="text" placeholder="Entrez l'utilisateur" name="usuario" id="usuario"required>

        <label><b>Ancien mot de passe</b></label>
        <input type="password" placeholder="Ancien mot de passe" name="contraAnt" id="contraAnt"required>

        <label><b>Nouveau mot de passe</b></label>
        <input type="password" placeholder="Nouveau mot de passe" name="contraNue" id="contraNue"required>
    </fieldset>
        <button type="submit" onclick="cambioContrasenya()">Changer</button>
    </div>
</form>
<script>
    function cambioContrasenya(){
        var usuario = document.cambioContra.usuario;
        var contraAnt = document.cambioContra.contraAnt;
        var contraNue = document.cambioContra.contraNue;
        if (contraNue.value == "" ||contraAnt.value == "" || usuario.value == "") {
            alert("Veuillez remplir tous les champs.");
        }else if(contraNue.length<8){
            alert("Le mot de passe est trop court.");
        }else{
            document.cambioContra.submit();
        }
    }
</script>
</body>
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
</html>
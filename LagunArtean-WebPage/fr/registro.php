<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Service de garde d'enfants IREKIA</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<section>
    <a href="http://www.lagun-artean.org/"><img src="../img/logotipo_lagunartean.jpg" height="53" width="200"></a>
    <nav>
        <ul>
            <li><a  href="../es/">Castellano</a></li>
            <li><a class="active" href="../fr/">Français</a></li>
            <li><a href="../arab/">العربي</a></li>
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
            <li><a class="active" href="registro.php">Inscription</a></li>
            <li><a href="cambioContrasena.php">Changer le mot de passe</a></li>
            <li style="float:right"><a href="ayuda.php">Aide</a></li>
    </nav>
</section>
<section>
    <h2>Pour vous inscrire dans le système, entrez votre nom, votre prénom, votre date de naissance et, si possible, votre numéro de téléphone,
        documentation. <br>
        Pour compléter l'inscription et utiliser les installations, vous devrez vous présenter à notre centre.</h2>
    <form id="registro" name ="registro" method="post" action="registrar.php" >
        <fieldset>
        <div class="container">
            <legend><b>Veuillez remplir les informations suivantes :</b></legend>
            <hr>
            <label><b>Nom</b></label>
            <input type="text" placeholder="Nom" id="nombre" name="nombre"  required>

            <label><b>Nom de famille 1</b></label>
            <input type="text" placeholder="Nom de famille 1" id="apellido1" name="apellido1" required>

            <label><b>Nom de famille 2</b></label>
            <input type="text" placeholder="Nom de famille 2" id="apellido2" name="apellido2">

            <label><b>Documentation</b></label>
            <input type="text" placeholder="Documentation" id="doc" name="doc">

            <label><b>Sexe</b></label>
            <select id="sexo" name="sexo">
                <option value="" selected="selected">Sélectionnez un sexe</option>
                <option value="Hombre">Homme</option>
                <option value="Mujer">Femme</option>
                <option value="Otro">Autres</option>
            </select>
            <br>
            <br>
            <label><b>Nationalité </b></label>
            <input type="text" placeholder="Nationalité" id="nacionalidad" name="nacionalidad">

            <label><b>Date de naissance</b></label>
            <input type="date" id="nacimiento" name="nacimiento"  required>
        </fieldset>
            <div class="clearfix">
                <button type="submit" onclick="registroUsuario()">S'inscrire</button>
            </div>
        </div>
    </form>
</section>
<script>
    function registroUsuario() {
        var nombre = document.registro.nombre;
        var apellido1 = document.registro.apellido1;
        var apellido2 = document.registro.apellido2;
        var nacimiento = document.registro.nacimiento;
        if(nombre.value==""||apellido1.value==""||apellido2.value==""||nacimiento.value==""){
            alert("Veuillez remplir tous les champs obligatoires. Le champ \"Documentation\" n'est pas obligatoire");
        }else if(nombre.length>50){
            alert("Le nom est trop long.");
        }else if(apellido1.length>50){
            alert("Le nom de famille 1 est trop long.");
        }else if(apellido2.length>50){
            alert("Le nom de famille 2 est trop long.");
        }else{
            document.registro.submit();
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
<?php
session_start();
$usu_id = $_SESSION["usu_id"];
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cours d'espagnol</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
    <script src="../js/scripts.js"></script>
</head>
<body>
<section>
    <a href="http://www.lagun-artean.org/"><img src="../img/logotipo_lagunartean.jpg" height="53" width="200"></a>
    <header>
        <h1 class="title"> <a href="..">Service de garde d'enfants IREKIA</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a href="citaDucha.php">Rendez-vous à la douche</a></li>
            <li><a href="verCitasDuchas.php">Voir Rendez-vous à la douche</a></li>
            <li><a href="citaLavanderia.php">Rendez-vous pour la blanchisserie</a></li>
            <li><a href="verCitasLavanderia.php">Voir le site Laundry Dating</a></li>
            <li><a class="active" href="clasesCastellano.php">Cours d'espagnol</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Notifications</a>
                <div class="dropdown-content">
                    <?php
                    include 'conexion.php';
                    $sql ="SELECT Duchan.fecha, Ducha.duchaFisica ,Ducha.averiada, Ducha.hora FROM Duchan inner join Ducha on Duchan.idDucha = Ducha.idDucha where Duchan.idUsuario='$usu_id' and Duchan.fecha = CURDATE();";
                    $sql1 ="SELECT fecha, fechaRecogida, entregada, recogida from InfoLavanderia where InfoLavanderia.idUsuario = $usu_id and fecha = CURDATE() and recogida is false order by fecha;";
                    $sql2 ="SELECT fecha, fechaRecogida, entregada, recogida from InfoLavanderia where InfoLavanderia.idUsuario = $usu_id and fechaRecogida >= CURDATE() and recogida is true and entregada is false order by fecha;";
                    $result1 = $conexion->query($sql1);
                    $result2 = $conexion->query($sql2);
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        echo"<a>Vous avez une douche réservée pour aujourd'hui.</a>";
                    }else if($result->num_rows <= 0){
                        echo"<a>Vous n'avez pas de réservation de douche pour aujourd'hui.</a>";
                    }
                    if($result1->num_rows > 0){
                        echo"<a>Vous avez un rendez-vous à la laverie automatique pour aujourd'hui</a>";
                    }else if($result1->num_rows <= 0){
                        echo"<a>Vous n'avez pas de réservation de blanchisserie pour aujourd'hui.</a>";
                    }
                    if($result2->num_rows > 0){
                        echo"<a>Vous avez des vêtements à récupérer dans la buanderie.</a>";
                    }else if($result2->num_rows <= 0){
                        echo"<a>Vous n'avez pas de vêtements dans la blanchisserie</a>";
                    }
                    ?>
                </div>
            </li>
            <li style="float:right"><a href="logout.php">Sortie</a></li>
        </ul>
    </nav>
</section>
<br>
<br>
<section>
    <?php
    include 'conexion.php';
    $sql = "SELECT * FROM Clases;";
    $result = $conexion->query($sql);
    if($_SESSION["usu_id"]!="admin"){
        if ($result->num_rows > 0) {
            echo "<table id='usuarios'><tr><th>Groupe</th><th>Journées</th><th>Heure</th><th>Niveau</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["idClase"]."</td><td>".$row["fecha"]."</td><td>".$row["hora"]."</td><td>".$row["nivel"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p><b>Il n'y a pas de classes dans le système.</b></p>";
        }
    }
    ?>
    <form id="formApuntarClase" method="post" action="apuntarClase.php">
        <h3>S'inscrire à un cours</h3>
        <p>Sélectionnez le groupe à inscrire</p>
        <hr>
        <label ><b>Groupe</b></label>
        <br>
        <br>
        <?php
        $sql = "SELECT idClase from Clases;";
        if ($_SESSION["usu_id"]!="admin"){
            $result = $conexion->query($sql);
            if ($result->num_rows >= 0) {
                echo "<select id= \"combo\" name=\"combo\">";
                while($row = $result->fetch_assoc()) {
                    echo "<option id =".$row["idClase"]." value=".$row["idClase"].">".$row["idClase"]."</option>";
                }
                echo"<br>";
                echo"<br>";
                echo"</select>";
                echo"<br>";
                echo"<br>";
                echo"<div class=\"clearfix\">";
                echo"<button type =\"submit\">S'inscrire</button>";
                echo"</div>";
            }else if($result->num_rows < 0){
                echo"<p>Il n'y a pas de classes dans le système.</p>";
            }
        }
        ?>
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
        <p><b>Où sommes-nous?<b></b></p>
        <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="373" id="gmap_canvas" src="https://maps.google.com/maps?q=lagun%20artean%20asociacion&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://speed-test-internet.com">speed-test-internet.com</a></div><style>.mapouter{position:relative;text-align:right;height:373px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:373px;width:1080px;}</style></div>
        <p>Courrier électronique: <a href="mailto:lagun-artean@lagun-artean.org">lagun-artean@lagun-artean.org</a>.</p>
        <p>Téléphone: <a href="tel:+34944472487">94 447 24 87</a>.</p>
    </div>
</footer>
</body>
</html>
<?php
session_start();
$usu_id = $_SESSION["usu_id"];
?>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>دروس اسبانية</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
    <script src="../js/scripts.js"></script>
    <style>
        body {

            direction:rtl;
            scrollbar-arrow-color: #ffffff;
            scrollbar-base-color: #9966ff;
            scrollbar-dark-shadow-color: #9966ff;
            scrollbar-track-color: #ff66cc;

        }
    </style>
</head>
<body>
<section>
    <a href="http://www.lagun-artean.org/"><img src="../img/logotipo_lagunartean.jpg" height="53" width="200"></a>
    <header>
        <h1 class="title"> <a href="..">خدمة IREKIA لرعاية الأطفال</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a href="citaDucha.php">أراك في الحمام</a></li>
            <li><a href="verCitasDuchas.php">انظر أراك في الحمام</a></li>
            <li><a  href="citaLavanderia.php">موعد للغسيل</a></li>
            <li><a href="verCitasLavanderia.php">راجع موقع التعارف عن طريق غسيل الملابس</a></li>
            <li><a class="active" href="clasesCastellano.php">دروس اسبانية</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">إشعارات</a>
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
                        echo"<a>لديك دش محفوظة لهذا اليوم.</a>";
                    }else if($result->num_rows <= 0){
                        echo"<a>ليس لديك حجز دش لهذا اليوم.</a>";
                    }
                    if($result1->num_rows > 0){
                        echo"<a>لديك موعد في مغسلة اليوم</a>";
                    }else if($result1->num_rows <= 0){
                        echo"<a>Vليس لديك حجز لغسيل الملابس لهذا اليوم.</a>";
                    }
                    if($result2->num_rows > 0){
                        echo"<a>لديك ملابس لتجمعها في غرفة الغسيل.</a>";
                    }else if($result2->num_rows <= 0){
                        echo"<a>ليس لديك ملابس في المغسلة</a>";
                    }
                    ?>
                </div>
            </li>
            <li style="float:right"><a href="logout.php">خروج</a></li>
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
            echo "<table id='usuarios'><tr><th>مجموعة</th><th>أيام</th><th>ساعة</th><th>مستوى</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["idClase"]."</td><td>".$row["fecha"]."</td><td>".$row["hora"]."</td><td>".$row["nivel"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p><b>لا توجد فصول في النظام.</b></p>";
        }
    }
    ?>
    <form id="formApuntarClase" method="post" action="apuntarClase.php">
        <h3>سجل للدورة</h3>
        <p>حدد المجموعة للتسجيل</p>
        <hr>
        <label ><b>حدد المجموعة للتسجيل</b></label>
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
                echo"<button type =\"submit\">تسجيل</button>";
                echo"</div>";
            }else if($result->num_rows < 0){
                echo"<p>لا توجد فصول في النظام.</p>";
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
        <p><b>اين نحن؟<b></b></p>
        <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="373" id="gmap_canvas" src="https://maps.google.com/maps?q=lagun%20artean%20asociacion&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://speed-test-internet.com">speed-test-internet.com</a></div><style>.mapouter{position:relative;text-align:right;height:373px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:373px;width:1080px;}</style></div>
        <p>بريد إلكتروني: <a href="mailto:lagun-artean@lagun-artean.org">lagun-artean@lagun-artean.org</a>.</p>
        <p>تليفون: <a href="tel:+34944472487">94 447 24 87</a>.</p>
    </div>
</footer>
</body>
</html>
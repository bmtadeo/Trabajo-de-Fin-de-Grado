<?php
session_start();
$usu_id = $_SESSION["usu_id"];
?>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>موعد للغسيل</title>
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
            <li><a class="active" href="citaLavanderia.php">موعد للغسيل</a></li>
            <li><a href="verCitasLavanderia.php">راجع موقع التعارف عن طريق غسيل الملابس</a></li>
            <li><a href="clasesCastellano.php">دروس اسبانية</a></li>
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
<section>
    <form id="elegirDia" name="elegirDia" method="post" onsubmit="return obtenerDia()" action="reservarCitaLavanderia.php">
        <div class="container">
            <br>
            <br>
            <label ><b>اختر موعدًا لتسليم الملابس</b></label>
            <br>
            <label ><b>اختر موعدًا لتسليم الملابس</b></label>
            <br>
            <label ><b>يمكنك أيضًا معرفة ما إذا كانت جاهزة في القائمة تحت عنوان "عرض موعد الغسيل"</b></label>
            <br>
            <br>
            <input type="date" id="fecha" name="fecha" required>
            <br>
            <br>
            <div class="clearfix">
                <button type ="submit">انظر الاقتباسات</button>
            </div>
        </div>
    </form>
    <p id = "error"></p>
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
<script>
    function obtenerDia() {
        var dia = document.elegirDia.fecha;
        var dias = ["Domingo","Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
        var dt = new Date(dia.value);
        if (dias[dt.getUTCDay()] == "Sabado"||dias[dt.getUTCDay()] == "Domingo"){
            var error = document.getElementById('error');
            error.innerHTML ="عذرًا ، منشآتنا ليست مفتوحة أيام السبت والأحد."
            return false;
        }else{
            document.elegirDia.submit();
        }
    }
</script>
</body>
</html>
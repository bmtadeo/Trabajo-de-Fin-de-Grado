<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تغيير كلمة المرور - IREKIA خدمة رعاية الطفل</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
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
    <nav>
        <ul>
            <li><a  href="../es/"> Castellano</a></li>
            <li><a href="../fr/">Français</a></li>
            <li><a class="active" href="../arab/">العربي</a></li>
        </ul>
    </nav>
    <header>
        <h1 class="title"><a href="..">خدمة IREKIA لرعاية الأطفال</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a  href="inicioSesion.php">تسجيل الدخول</a></li>
            <li><a href="registro.php">تسجيل</a></li>
            <li><a class ="active"href="cambioContrasena.php"> تغيير كلمة المرور</a></li>
            <li style="float:right"><a href="ayuda.php"> مساعدة</a></li>
        </ul>
    </nav>
</section>
<section>
    <h3>إذا نسيت كلمة المرور الخاصة بك ، تعال إلى مقرنا وسنعاود الاتصال بك.</h3>
</section>
<form name ="cambioContra" id="cambioContra" method="post" action="cambioContrasenya.php">
    <fieldset>
    <div class="container">
        <legend><b>يرجى ملء المعلومات التالية:</b></legend><br>
        <label ><b>المستعمل</b></label>
        <input type="text" placeholder="المستعمل" name="usuario" id="usuario"required>

        <label><b>كلمة سر قديمة</b></label>
        <input type="password" placeholder="كلمة سر قديمة" name="contraAnt" id="contraAnt"required>

        <label><b>كلمة مرور جديدة</b></label>
        <input type="password" placeholder="كلمة مرور جديدة" name="contraNue" id="contraNue"required>
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
            alert("رجاءا اكمل جميع الحقول.");
        }else if(contraNue.length<8){
            alert("كلمة المرور قصيرة جدًا.");
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
        <p><b>اين نحن؟<b></b></p>
        <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="373" id="gmap_canvas" src="https://maps.google.com/maps?q=lagun%20artean%20asociacion&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://speed-test-internet.com">speed-test-internet.com</a></div><style>.mapouter{position:relative;text-align:right;height:373px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:373px;width:1080px;}</style></div>
        <p>بريد إلكتروني: <a href="mailto:lagun-artean@lagun-artean.org">lagun-artean@lagun-artean.org</a>.</p>
        <p>تليفون: <a href="tel:+34944472487">94 447 24 87</a>.</p>
    </div>
</footer>
</html>
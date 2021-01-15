<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
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
            <li><a href="../es/index.php">Castellano</a></li>
            <li><a href="../fr/index.php">Français</a></li>
            <li><a class="active" href="../arab/index.php">العربي</a></li>
        </ul>
    </nav>
    <header>
        <h1 class="title"><a href="./">خدمة IREKIA لرعاية الأطفال</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <li><a class ="active" href="inicioSesion.php">تسجيل الدخول</a></li>
            <li><a href="registro.php">تسجيل</a></li>
            <li><a href="cambioContrasena.php"> تغيير كلمة المرور</a></li>
            <li style="float:right"><a href="ayuda.php"> مساعدة</a></li>
        </ul>
    </nav>
</section>
<section>
        <h3>لتسجيل الدخول إلى النظام ، أدخل اسم المستخدم وكلمة المرور.</h3>
</section>
<form name ="login" id="login" method="post" action="iniciarSesion.php">
    <div class="container">
        <label ><b>المستخدم</b></label>
        <input type="text" placeholder="أدخل المستخدم" id="usuario" name="usuario" required>

        <label><b>ممر </b></label>
        <input type="password" placeholder="أدخل كلمة المرور" id="contra" name="contra" required>

        <div class="clearfix">
            <button type="submit" onclick="loginUsuarios()">تسجيل الدخول</button>
        </div>
    </div>
</form>
<script>
    function loginUsuarios() {
        var usuario = document.login.usuario;
        var contra = document.login.contra;
        if (contra.value == "" || usuario.value == "") {
            alert("يرجى ملء جميع الحقول");
        }else if(usuario.length>50){
            alert("المستخدم طويل جدًا.");
        } else if(contra.length>50){
            alert("كلمة المرور طويلة جدًا.");
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
        <p><b>اين نحن؟<b></b></p>
        <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="373" id="gmap_canvas" src="https://maps.google.com/maps?q=lagun%20artean%20asociacion&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://speed-test-internet.com">speed-test-internet.com</a></div><style>.mapouter{position:relative;text-align:right;height:373px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:373px;width:1080px;}</style></div>
        <p>بريد إلكتروني: <a href="mailto:lagun-artean@lagun-artean.org">lagun-artean@lagun-artean.org</a>.</p>
        <p>تليفون: <a href="tel:+34944472487">94 447 24 87</a>.</p>
    </div>
</footer>
</body>
</html>
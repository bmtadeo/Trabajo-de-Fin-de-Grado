<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>التسجيل - IREKIA خدمة رعاية الأطفال</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
            <li><a  href="../es/index.php">Castellano</a></li>
            <li><a  href="../fr/index.php">Français</a></li>
            <li><a class="active" href="../arab/index.php">العربي</a></li>
        </ul>
    </nav>
    <header>
        <h1 class="title"><a href="..">خدمة IREKIA لرعاية الأطفال</a></h1>
    </header>
</section>
<section>
    <nav>
        <ul>
            <ul>
                <li><a href="inicioSesion.php">تسجيل الدخول</a></li>
                <li><a class ="active" href="registro.php">تسجيل</a></li>
                <li><a href="cambioContrasena.php"> تغيير كلمة المرور</a></li>
                <li style="float:right"><a href="ayuda.php"> مساعدة</a></li>
            </ul>
    </nav>
</section>
<section>
    <h2>للتسجيل في النظام ، أدخل اسمك الأخير واسمك الأول وتاريخ الميلاد ورقم الهاتف والوثائق إن أمكن.<br>
        لإكمال التسجيل واستخدام التسهيلات ، يجب عليك تقديم نفسك في مركزنا.</h2>
    <form id="registro" name ="registro" method="post" action="registrar.php" >
        <fieldset>
        <div class="container">
            <legend><b>يرجى تعبئة المعلومات التالية:</b></legend>
            <hr>
            <label><b>الاسم الأخير</b></label>
            <input type="text" placeholder="الاسم الأخير" id="nombre" name="nombre"  required>

            <label><b>Nom de famille 1</b></label>
            <input type="text" placeholder="اسم العائلة 1" id="apellido1" name="apellido1" required>

            <label><b>Nom de famille 2</b></label>
            <input type="text" placeholder="اسم العائلة 2" id="apellido2" name="apellido2">

            <label><b>توثيق</b></label>
            <input type="text" placeholder="توثيق" id="doc" name="doc">

            <label><b>الجنس</b></label>
            <select id="sexo" name="sexo">
                <option value="" selected="selected">حدد نوع الجنس</option>
                <option value="Hombre">ذكر</option>
                <option value="Mujer">امرأة</option>
                <option value="Otro">آخرون</option>
            </select>
            <br>
            <br>
            <label><b>الجنسية </b></label>
            <input type="text" placeholder="الجنسية" id="nacionalidad" name="nacionalidad">

            <label><b>تاريخ الميلاد</b></label>
            <input type="date" id="nacimiento" name="nacimiento"  required>
        </fieldset>
            <div class="clearfix">
                <button type="submit" onclick="registroUsuario()">سجل</button>
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
            alert("يرجى إكمال جميع الحقول الإلزامية. حقل التوثيق ليس إلزاميا");
        }else if(nombre.length>50){
            alert("الاسم طويل جدًا");
        }else if(apellido1.length>50){
            alert("اسم العائلة 1 طويل جدًا.");
        }else if(apellido2.length>50){
            alert("اسم العائلة 2 طويل جدًا.");
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
        <p><b>اين نحن؟<b></b></p>
        <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="373" id="gmap_canvas" src="https://maps.google.com/maps?q=lagun%20artean%20asociacion&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://speed-test-internet.com">speed-test-internet.com</a></div><style>.mapouter{position:relative;text-align:right;height:373px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:373px;width:1080px;}</style></div>
        <p>بريد إلكتروني: <a href="mailto:lagun-artean@lagun-artean.org">lagun-artean@lagun-artean.org</a>.</p>
        <p>تليفون: <a href="tel:+34944472487">94 447 24 87</a>.</p>
    </div>
</footer>
</body>
</html>
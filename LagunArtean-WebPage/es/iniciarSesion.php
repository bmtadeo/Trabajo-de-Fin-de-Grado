<?php
session_start();
include 'conexion.php';
$usuario = $_POST["usuario"];
$contrasenya = $_POST["contra"];

if ($usuario=="admin" && $usuario!="" && strlen($usuario)<=50 && strlen($contrasenya)<=50){
    loginAdmin($usuario, $contrasenya, $conexion);
}else if($usuario!="admin" && $usuario!=""&& strlen($usuario)<=50 && strlen($contrasenya)<=50){
    loginUser($usuario, $contrasenya, $conexion);
}else{
    $message = "Error en el inicio de sesion, el usuario o contraseña no pueden estar vacio.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.location='inicioSesion.php';</script>";
}

function loginAdmin($usuario, $contrasenya, $conexion){
    $sql = "SELECT * FROM Administrador WHERE nick='$usuario' and contrasenya='$contrasenya';";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $usu_id=$row["idUsuario"];
        $_SESSION["usu_id"]=$usuario;
        header("Location: ../es/panelAdmin.php");
    }else {
        $message = "Contraseña incorrecta.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location='inicioSesion.php';</script>";
        //header("Location: ../es/inicioSesion.php");
    }
}
function loginUser($usuario, $contrasenya, $conexion){
    $sql = "SELECT * FROM Usuario WHERE nick='$usuario' and contrasenya='$contrasenya' and registroCompleto is true;";
    $result = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $usu_id=$row["idUsuario"];
        $_SESSION["usu_id"]=$usu_id;
        header("Location: ../es/panelUsuario.php");
    }else {
        $message = "Contraseña incorrecta.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location='inicioSesion.php';</script>";
        //header("Location: ../es/inicioSesion.php");
    }
}
?>


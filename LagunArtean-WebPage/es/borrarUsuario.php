<?php
session_start();
include 'conexion.php';
$user= $_POST["user"];
if ($_SESSION["usu_id"]=="admin"){
    $sql= "delete from Usuario where nick='$user'";
    mysqli_query($conexion,$sql);
//mysqli_close($conexion);
    header("Location: ../es/verUsuarios.php");
}else{
    $message = "Error, por favor inicia sesion.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.location='index.php';</script>";
}

?>
<?php
session_start();
include 'conexion.php';
$usuario = $_SESSION["usu_id"];
$fecha= $_POST["combo"];
if ($_SESSION["usu_id"]!="admin"){
    $sql= "delete from InfoLavanderia where fecha='$fecha' and idUsuario = '$usuario'";
    mysqli_query($conexion,$sql);
    header("Location: ../fr/verCitasLavanderia.php");
}
?>
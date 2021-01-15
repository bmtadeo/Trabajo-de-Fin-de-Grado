<?php
session_start();
include 'conexion.php';
$user = $_POST["user"];
$fecha= $_POST["fecha"];
$fecha=date("Y-m-d",strtotime($fecha));
$sql="UPDATE InfoLavanderia SET fechaRecogida='$fecha' WHERE idUsuario = (Select idUsuario from Usuario where nick ='$user') and entregada is true";
if($_SESSION["usu_id"]=="admin"){
    mysqli_query($conexion,$sql);
    header("Location: ../es/verRopaAdmin.php");
}
?>
<?php
session_start();
include 'conexion.php';
$user = $_POST["user"];
$fecha= $_SESSION["fechaEntrega"];
$sql="UPDATE InfoLavanderia SET entregada = true WHERE idUsuario = (Select idUsuario from Usuario where nick ='$user') and fecha ='$fecha'";
if($_SESSION["usu_id"]=="admin"){
    mysqli_query($conexion,$sql);
    header("Location: ../es/mostrarCitasLavanderiaAdmin.php");
}
?>

<?php
session_start();
include 'conexion.php';
$id = $_POST["combo"];
$sql= "Delete from Clases where idClase ='$id'";
if($_SESSION["usu_id"]=="admin"){
    mysqli_query($conexion,$sql);
    header("Location: ../es/eliminarClasesAdmin.php");
}
?>
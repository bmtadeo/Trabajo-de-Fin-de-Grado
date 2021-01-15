<?php
session_start();
include 'conexion.php';
$fecha = $_POST["fecha"];
$hora= $_POST["hora"];
$nivel= $_POST["nivel"];
$capacidad= $_POST["capacidad"];
$sql="Insert into Clases (nivel, hora, fecha, capacidad) values('$nivel','$hora','$fecha','$capacidad')";
if($_SESSION["usu_id"]=="admin"){
    mysqli_query($conexion,$sql);
    header("Location: ../es/anyadidaClase.php");
}else{
    $message = "Error, por favor inicia sesion.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.location='index.php';</script>";
}
?>
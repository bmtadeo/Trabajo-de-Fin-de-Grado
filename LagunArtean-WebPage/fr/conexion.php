<?php
$db_host = "20.50.125.26:3306";
$db_usuario = "root";
$db_password = "lagunartean";
$db_nombre = "LagunArtean";
$conexion= mysqli_connect($db_host,$db_usuario,$db_password);
if(mysqli_connect_errno()){
    echo"Fallo al conectar";
    exit();
}
mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BD");
mysqli_set_charset($conexion, 'utf8');
?>
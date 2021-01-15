<?php
session_start();
include 'conexion.php';
$numDucha = $_POST["ducha"];
if ($numDucha!="" && ($numDucha==1)){
    ducha1($conexion);
}else if ($numDucha!="" && ($numDucha==2)){
    ducha2($conexion);
}else if ($numDucha!="" && ($numDucha==3)){
    ducha3($conexion);
}

function ducha1($conexion){
    $id1=1;
    $id4=4;
    $id7=7;
    $id10=10;
    $id13=13;
    $id16=16;
    $sql1 = "Update Ducha set averiada = true where idDucha = '$id1'";
    $sql4 = "Update Ducha set averiada = true where idDucha = '$id4'";
    $sql7 = "Update Ducha set averiada = true where idDucha = '$id7'";
    $sql10 = "Update Ducha set averiada = true where idDucha = '$id10'";
    $sql13 = "Update Ducha set averiada = true where idDucha = '$id13'";
    $sql16 = "Update Ducha set averiada = true where idDucha = '$id16'";
    mysqli_query($conexion,$sql1);
    mysqli_query($conexion,$sql4);
    mysqli_query($conexion,$sql7);
    mysqli_query($conexion,$sql10);
    mysqli_query($conexion,$sql13);
    mysqli_query($conexion,$sql16);
    header("Location: ../es/mantenimientoDuchas.php");
}
function ducha2($conexion){
    $id2=2;
    $id5=5;
    $id8=8;
    $id11=11;
    $id14=14;
    $id17=17;
    $sql2 = "Update Ducha set averiada = true where idDucha = '$id2'";
    $sql5 = "Update Ducha set averiada = true where idDucha = '$id5'";
    $sql8 = "Update Ducha set averiada = true where idDucha = '$id8'";
    $sql11 = "Update Ducha set averiada = true where idDucha = '$id11'";
    $sql14 = "Update Ducha set averiada = true where idDucha = '$id14'";
    $sql17 = "Update Ducha set averiada = true where idDucha = '$id17'";
    mysqli_query($conexion,$sql2);
    mysqli_query($conexion,$sql5);
    mysqli_query($conexion,$sql8);
    mysqli_query($conexion,$sql11);
    mysqli_query($conexion,$sql14);
    mysqli_query($conexion,$sql17);
    header("Location: ../es/mantenimientoDuchas.php");
}
function ducha3($conexion){
    $id3=3;
    $id6=6;
    $id9=9;
    $id12=12;
    $id15=15;
    $id18=18;
    $sql3 = "Update Ducha set averiada = true where idDucha = '$id3'";
    $sql6 = "Update Ducha set averiada = true where idDucha = '$id6'";
    $sql9 = "Update Ducha set averiada = true where idDucha = '$id9'";
    $sql12 = "Update Ducha set averiada = true where idDucha = '$id12'";
    $sql15 = "Update Ducha set averiada = true where idDucha = '$id15'";
    $sql18 = "Update Ducha set averiada = true where idDucha = '$id18'";
    mysqli_query($conexion,$sql3);
    mysqli_query($conexion,$sql6);
    mysqli_query($conexion,$sql9);
    mysqli_query($conexion,$sql12);
    mysqli_query($conexion,$sql15);
    mysqli_query($conexion,$sql18);
    header("Location: ../es/mantenimientoDuchas.php");
}

?>
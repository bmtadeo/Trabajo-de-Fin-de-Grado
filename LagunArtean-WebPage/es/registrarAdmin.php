<?php
session_start();
include 'conexion.php';
$nombre= $_POST["nombre"];
$apellido1= $_POST["apellido1"];
$apellido2= $_POST["apellido2"];
$documentacion= $_POST["doc"];
$email= $_POST["email"];
$telf= $_POST["telf"];
$nacimientoHTML= $_POST["nacimiento"];
$nacimiento=date("Y-m-d",strtotime($nacimientoHTML));
$nacionalidad= $_POST["nacionalidad"];
$sexo= $_POST["sexo"];
$user = randomUser();
$pass = randomPass();
$qrcode = $user;
$sql= "insert into Usuario( nacimiento, documentacion,nick, contrasenya, nombre, apellido1, apellido2,email,telefono, registroCompleto, nacionalidad, sexo,qr) values ('$nacimiento', '$documentacion','$user', '$pass','$nombre', '$apellido1', '$apellido2','$email','$telf',true,'$nacionalidad','$sexo','$qrcode')";
echo $sql;
//$sql = "INSERT INTO prueba (id, nombre, apellido1) VALUES (11, '$nombre', '$apellido1')";
mysqli_query($conexion,$sql);
//mysqli_close($conexion);
session_start();
$_SESSION["usuRegistro"]=$user;
$_SESSION["contraRegistro"]=$pass;
$_SESSION["qr"]=$qrcode;
header("Location: ../es/registroCompleto.php");

//user
function randomUser(){
    $numeros = "012346789";
    $nick=array();
    $nick[0]="U";
    for ($i=1; $i<7; $i++){
        $n = rand(0, 9);
        $nick[] = $numeros[$n];
    }
    return implode($nick);
}
//pass
function randomPass(){
    $caracteres = 'abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ1234567890';
    $contrasenya = array();
    $alphaLength = strlen($caracteres) - 1;
    for ($j=0; $j<8; $j++){
        $n = rand(0, 50);
        $contrasenya[] = $caracteres[$n];
    }
    return implode($contrasenya);
}
?>
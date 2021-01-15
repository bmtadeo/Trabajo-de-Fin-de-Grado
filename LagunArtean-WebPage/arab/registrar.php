<?php
session_start();
include 'conexion.php';
$nombre= $_POST["nombre"];
$apellido1= $_POST["apellido1"];
$apellido2= $_POST["apellido2"];
$documentacion= $_POST["doc"];
$nacimientoHTML= $_POST["nacimiento"];
$nacimiento=date("Y-m-d",strtotime($nacimientoHTML));
$nacionalidad= $_POST["nacionalidad"];
$sexo= $_POST["sexo"];
$user = randomUser();
$pass = randomPass();
$qrcode = $user;

/*
 * if($nombre=="" ||$apellido1==""||$apellido2==""||$nacimiento=""){
    $message = "Erreur d'enregistrement, le prénom, le nom de famille 1, le nom de famille 2 ou la naissance ne peuvent pas être vides.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.location='registro.php';</script>";
}else if(strlen($nombre)>=50 ||strlen($apellido1)>=50||strlen($apellido2)>=50){
    $message = "Erreur d'enregistrement, le prénom, le nom de famille 1, le nom de famille 2 ou la naissance ne peuvent pas être vides.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.location='registro.php';</script>";
}else{
    existeUsuario($conexion,$nacimiento,$documentacion,$user,$pass,$nombre,$apellido1,$apellido2,$nacionalidad,$sexo,$qrcode);
}
 */

existeUsuario($conexion,$nacimiento,$documentacion,$user,$pass,$nombre,$apellido1,$apellido2,$nacionalidad,$sexo,$qrcode);
function existeUsuario($conexion,$nacimiento,$documentacion,$user,$pass,$nombre,$apellido1,$apellido2,$nacionalidad,$sexo,$qrcode){
    $sqlExisteUsuario="SELECT * FROM Usuario WHERE nick ='$user';";
    $result = $conexion->query($sqlExisteUsuario);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row["nick"]==$user){
                $user = randomUser();
                registrar($conexion,$nacimiento,$documentacion,$user,$pass,$nombre,$apellido1,$apellido2,$nacionalidad,$sexo,$qrcode);
            }
        }
    }else{
        registrar($conexion,$nacimiento,$documentacion,$user,$pass,$nombre,$apellido1,$apellido2,$nacionalidad,$sexo,$qrcode);
    }
}
function registrar($conexion,$nacimiento,$documentacion,$user,$pass,$nombre,$apellido1,$apellido2,$nacionalidad,$sexo,$qrcode){
    $sql= "insert into Usuario( nacimiento, documentacion,nick, contrasenya, nombre, apellido1, apellido2,nacionalidad,sexo,qr) values ('$nacimiento', '$documentacion','$user', '$pass','$nombre', '$apellido1', '$apellido2','$nacionalidad','$sexo','$qrcode')";
    mysqli_query($conexion,$sql);
    header("Location: ../fr/index.php");

}
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
        $n = rand(0, 62);
        $contrasenya[] = $caracteres[$n];
    }
    return implode($contrasenya);
}

?>
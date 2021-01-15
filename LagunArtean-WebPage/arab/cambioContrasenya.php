<?php
include 'conexion.php';
$usuario = $_POST["usuario"];
$contrasenyaAnt = $_POST["contraAnt"];
$contrasenyaNue = $_POST["contraNue"];
if($usuario=="admin"){
    actualizarContraAdmin($conexion, $usuario, $contrasenyaAnt, $contrasenyaNue);
}else{
    actualizarContraUsuario($conexion, $usuario, $contrasenyaAnt, $contrasenyaNue);
}
function actualizarContraAdmin($conexion, $usuario, $contrasenyaAnt, $contrasenyaNue){
    $sql="UPDATE Administrador SET contrasenya='$contrasenyaNue' WHERE nick='$usuario' AND contrasenya='$contrasenyaAnt'";
    mysqli_query($conexion,$sql);
    header("Location: ../arab/index.php");
}

function actualizarContraUsuario($conexion, $usuario, $contrasenyaAnt, $contrasenyaNue){
    $sql="UPDATE Usuario SET contrasenya='$contrasenyaNue' WHERE nick='$usuario' AND contrasenya='$contrasenyaAnt'";
    mysqli_query($conexion,$sql);
    header("Location: ../arab/index.php");
}
?>

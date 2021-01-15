<?php
session_start();
include 'conexion.php';
$nick = $_POST["user"];
$nombre = $_POST["nombre"];
$ape1 = $_POST["apellido1"];
$ape2 = $_POST["apellido2"];
$doc = $_POST["doc"];
$nacimientoHTML= $_POST["nacimiento"];
$nacimiento=date("Y-m-d",strtotime($nacimientoHTML));
$telefono= $_POST["telefono"];
$sexo= $_POST["sexo"];
$nacionalidad= $_POST["nacionalidad"];
$email= $_POST["email"];
$contra= $_POST["contra"];
if ($nick==null && $_SESSION["usu_id"]=="admin"){
    $message = "Por favor, escribe el usuario a editar.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.location='verUsuarios.php';</script>";

}else if ($nick==null && $_SESSION["usu_id"]!="admin"){
    $message = "Error, por favor inicia sesion.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>window.location='panelAdmin.php';</script>";
    //header("Location: ../es/verUsuarios.php");
}else{
        /*
         * actNombre($nombre, $conexion,$nick);
        actApellido1($ape1,$conexion,$nick);
        actApellido2($ape2,$conexion,$nick);
        actDocumentacion($doc,$conexion,$nick);
        actNacimiento($nacimiento,$conexion,$nick);
        actTelefono($telefono,$conexion,$nick);
        actSexo($sexo,$conexion,$nick);
        actNacionalidad($nacionalidad,$conexion,$nick);
        actEmail($email,$conexion,$nick);
        actContra($contra,$conexion,$nick);
         */
        actualizarDatos($conexion,$nick,$nombre,$ape1,$ape2,$doc,$nacimiento,$telefono,$sexo,$nacionalidad, $email,$contra);
        header("Location: ../es/verUsuarios.php");
}
function actualizarDatos($conexion,$nick,$nombre,$ape1,$ape2,$doc,$nacimiento,$telefono,$sexo,$nacionalidad, $email,$contra){
    if ($nombre != null) {
        $sql1 = "UPDATE Usuario SET nombre ='$nombre' WHERE nick= '$nick'";
        mysqli_query($conexion, $sql1);
    }
    if ($ape1 != null) {
        $sql2 = "UPDATE Usuario SET apellido1 ='$ape1' WHERE nick= '$nick'";
        mysqli_query($conexion, $sql2);
    }
    if ($ape2 != null) {
        $sql3 = "UPDATE Usuario SET apellido2 ='$ape2' WHERE nick= '$nick'";
        mysqli_query($conexion, $sql3);
    }
    if ($doc != null) {
        $sql4 = "UPDATE Usuario SET documentacion ='$doc' WHERE nick= '$nick'";
        mysqli_query($conexion, $sql4);
    }
    if ($nacimiento != null) {
        $sql5 = "UPDATE Usuario SET nacimiento ='$nacimiento' WHERE nick= '$nick'";
        mysqli_query($conexion, $sql5);
    }
    if ($telefono != null) {
        $sql6 = "UPDATE Usuario SET telefono ='$telefono' WHERE nick= '$nick'";
        mysqli_query($conexion, $sql6);
    }
    if ($sexo != null) {
        $sql7 = "UPDATE Usuario SET sexo ='$sexo' WHERE nick= '$nick'";
        mysqli_query($conexion, $sql7);
    }
    if ($nacionalidad != null) {
        $sql9 = "UPDATE Usuario SET nacionalidad ='$nacionalidad' WHERE nick= '$nick'";
        mysqli_query($conexion, $sql9);
    }
    if($email!=null){
        $sql10="UPDATE Usuario SET email ='$email'WHERE nick= '$nick'";
        mysqli_query($conexion,$sql10);
    }
    if($contra!=null){
        $sql11="UPDATE Usuario SET contrasenya ='$contra' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql11);
    }
}
function actNombre($nombre,$conexion,$nick){
    if ($nombre!=null){
        $sql1="UPDATE Usuario SET nombre ='$nombre' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql1);
    }
}
function actApellido1($ape1,$conexion,$nick){
    if ($ape1!=null){
        $sql2="UPDATE Usuario SET apellido1 ='$ape1' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql2);
    }
}
function actApellido2($ape2,$conexion,$nick){
    if ($ape2!=null){
        $sql3="UPDATE Usuario SET apellido2 ='$ape2' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql3);
    }
}
function actDocumentacion($doc,$conexion,$nick){
    if($doc!=null){
        $sql4="UPDATE Usuario SET documentacion ='$doc' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql4);
    }

}
function actNacimiento($nacimiento,$conexion,$nick){
    if($nacimiento!=null){
        $sql5="UPDATE Usuario SET nacimiento ='$nacimiento' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql5);
    }
}
function actTelefono($telefono,$conexion,$nick){
    if($telefono!=null){
        $sql6="UPDATE Usuario SET telefono ='$telefono' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql6);
    }
}
function actSexo($sexo,$conexion,$nick){
    if($sexo!=null){
        $sql6="UPDATE Usuario SET sexo ='$sexo' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql6);
    }
}
function actNacionalidad($nacionalidad,$conexion,$nick){
    if($nacionalidad!=null){
        $sql6="UPDATE Usuario SET nacionalidad ='$nacionalidad' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql6);
    }
}
function actEmail($email,$conexion,$nick){
    if($email!=null){
        $sql7="UPDATE Usuario SET email ='$email'WHERE nick= '$nick'";
        mysqli_query($conexion,$sql7);
    }

}
function actContra($contra,$conexion,$nick){
    if($contra!=null){
        $sql8="UPDATE Usuario SET contrasenya ='$contra' WHERE nick= '$nick'";
        mysqli_query($conexion,$sql8);
    }

}
?>

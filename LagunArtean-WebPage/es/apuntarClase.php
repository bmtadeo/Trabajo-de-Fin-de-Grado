<?php
session_start();
include 'conexion.php';
$idGrupo = $_POST["combo"];
$usuario = $_SESSION["usu_id"];
$sqlUsuarioApuntado= "SELECT idUsuario FROM Apuntado WHERE Apuntado.idClase ='$idGrupo' AND idUsuario = '$usuario';";
$sqlCapacidad= "SELECT capacidad FROM Clases WHERE idClase ='$idGrupo';";
$result1 = $conexion->query($sqlUsuarioApuntado);
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        if ($row["idUsuario"]==$usuario) {
            header("Location: ../es/alumnoApuntadoAnteriormente.php");
        }
    }
}else if($result1->num_rows <= 0){
    $result2 = $conexion->query($sqlCapacidad);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            if ($row["capacidad"] <= 0) {
                $listaEspera = true;
                insertApuntados($listaEspera, $usuario,$idGrupo,$conexion);
            } else if ($row["capacidad"] > 0) {
                $listaEspera = false;
                insertApuntados($listaEspera, $usuario,$idGrupo,$conexion);
            }
        }
    }
}

function insertApuntados($listaEspera, $usuario,$idGrupo,$conexion){
    if($listaEspera == true){
        $sqlApunt = "Insert into Apuntado (idUsuario, idClase, listaEspera) values ('$usuario','$idGrupo',true)";
        mysqli_query($conexion, $sqlApunt);
        header("Location: ../es/anyadidoListaEspera.php");
    }else {
        $sqlApunt = "Insert into Apuntado (idUsuario, idClase, listaEspera) values ('$usuario','$idGrupo',false)";
        mysqli_query($conexion, $sqlApunt);
        header("Location: ../es/apuntadoClase.php");
        //actualizarCapacidadClases($conexion,$idGrupo);
    }
}

function actualizarCapacidadClases($conexion,$idGrupo){
    $sqlAct="UPDATE Clases set capacidad = capacidad - 1 where idClase ='$idGrupo'";
    mysqli_query($conexion,$sqlAct);
}
?>
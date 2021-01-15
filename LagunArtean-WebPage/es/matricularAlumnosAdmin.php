<?php
session_start();
include 'conexion.php';
$usuario = $_POST["combo"];
$grupo = $_POST["combo1"];
$sqlUsuarioMatriculado= "SELECT * from Matricula where idUsuario=(Select idUsuario from Usuario where nick ='$usuario')and idClase ='$grupo';";
$result1 = $conexion->query($sqlUsuarioMatriculado);
if ($result1->num_rows > 0) {
    header("Location: ../es/alumnoMatriculadoAnteriormente.php");
}else if($result1->num_rows <= 0){
    $sqlIdUsuario = "Select idUsuario from Usuario where nick ='$usuario'";
    $result2 = $conexion->query($sqlIdUsuario);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $idUsuario = $row["idUsuario"];
        }
        insertMatriculado($idUsuario,$grupo,$conexion);
        eliminarApuntados($conexion,$idUsuario, $grupo);
        actualizarCapacidadClases($conexion,$grupo);
        header("Location: ../es/alumnoMatriculado.php");
    }
}
function eliminarApuntados($conexion,$idUsuario, $grupo){
    $sqlDelApuntados ="DELETE FROM Apuntado where idUsuario = '$idUsuario'";
    mysqli_query($conexion, $sqlDelApuntados);
}
function insertMatriculado($idUsuario,$grupo,$conexion){
    $sqlMatricula = "INSERT INTO Matricula (idUsuario, idClase, fecha) values ('$idUsuario','$grupo',CURDATE())";
    mysqli_query($conexion, $sqlMatricula);
}
function actualizarCapacidadClases($conexion,$idGrupo){
    $sqlAct="UPDATE Clases set capacidad = capacidad - 1 where idClase ='$idGrupo'";
    mysqli_query($conexion,$sqlAct);
}
?>
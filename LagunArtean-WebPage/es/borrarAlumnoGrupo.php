<?php
session_start();
include 'conexion.php';
$usuario = $_POST["combo1"];
$grupo = $_SESSION["grupoDesmatricular"];
$sqlIdUsuario = "Select idUsuario from Usuario where nick ='$usuario'";
$result1 = $conexion->query($sqlIdUsuario);
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $idUsuario = $row["idUsuario"];
    }
}
$sqlDesmatricular="DELETE FROM Matricula where idUsuario ='$idUsuario' and idClase='$grupo'";
mysqli_query($conexion,$sqlDesmatricular);
$sqlAct="UPDATE Clases set capacidad = capacidad + 1 where idClase ='$grupo'";
mysqli_query($conexion,$sqlAct);
header("Location: ../es/desmatricularAlumnoAdmin.php");

?>
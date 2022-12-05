<?php
$id = $_POST['id'];
$passwoord = $_POST['passwoord'];
require_once('../mysql/conexion.php');
$cn = conectar();
$sqlSelect = "SELECT * FROM OPERADORES WHERE ID = '$id' and PASSWOORD = '$passwoord'";
$resultSet = $cn->query($sqlSelect);

if ($resultSet->num_rows === 1) {
    $sqlUpdate = "UPDATE OPERADORES SET STATUS = 1 WHERE ID = $id";
    $cn->query($sqlUpdate);
    $datos = mysqli_fetch_assoc($resultSet);
    echo json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} else {
    echo 0;
}

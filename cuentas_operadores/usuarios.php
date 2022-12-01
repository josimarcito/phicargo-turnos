<?php

require_once '../mysql/conexion.php';
$cn = conectar();
$sqlSelect = "SELECT * FROM OPERADORES";
$resultSet = $cn->query($sqlSelect);

$userData = array();

while ($row = $resultSet->fetch_assoc()) {
    $userData['Usuarios'][] = $row;
}

$json = json_encode($userData);
$bytes = file_put_contents("usuarios.json", $json);

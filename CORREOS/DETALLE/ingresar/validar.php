<?php

require_once "../../../mysql/conexion.php";

$cn = conectar();

$id = $_POST['id'];
$sqlSelect = "SELECT ESTADO FROM VIAJES WHERE ID = $id";
$resultSet = $cn->query($sqlSelect);
$row = $resultSet->fetch_assoc();

if ($row['ESTADO'] == 'Finalizado') {
    echo 1;
} else if ($row['ESTADO'] == 'Activo') {
    echo 2;
} else {
    echo 0;
}

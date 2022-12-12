<?php

require_once "../../../mysql/conexion.php";

$cn = conectar();

$id = $_POST['id'];
$sqlSelect = "SELECT * FROM VIAJES WHERE ID = $id";
$resultSet = $cn->query($sqlSelect);

if ($resultSet->num_rows == 1) {
    echo 1;
} else {
    echo 0;
}

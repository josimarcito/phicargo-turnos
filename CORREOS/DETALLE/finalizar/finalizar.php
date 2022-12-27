<?php

require_once "../../../mysql/conexion.php";

$cn = conectar();
$id = $_POST['idelete'];

$sqlInsert = "UPDATE VIAJES SET ESTADO = 'Finalizado' WHERE ID = '$id'";
if ($cn->query($sqlInsert)) {
    echo 1;
} else {
    echo 0;
}

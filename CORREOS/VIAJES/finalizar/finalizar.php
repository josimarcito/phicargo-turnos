<?php

require_once "../../../mysql/conexion.php";

$cn = conectar();
$id              = $_POST['id'];
$referencia      = $_POST['referencia'];
$placas          = $_POST['placas'];
$id_cliente      = $_POST['id_cliente'];

$sqlInsert = "DELETE FROM VIAJES WHERE ID = '$id'";
if ($cn->query($sqlInsert)) {
    echo 1;
} else {
    echo 0;
}

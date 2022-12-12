<?php
$id = $_POST['id'];
require_once('../../mysql/conexion.php');
$cn = conectar();
$sqlSelect = "UPDATE OPERADORES SET STATUS = 0 WHERE ID = $id";

if ($cn->query($sqlSelect)) {
    echo 1;
} else {
    echo 0;
}

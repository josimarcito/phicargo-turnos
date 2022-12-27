<?php
require_once('../../mysql/conexion.php');
$cn = conectar();

$id        = $_REQUEST['id'];
$correo    = $_REQUEST['correo'];

$jsonData = array();
$selectQuery   = ("SELECT DIRECCION FROM CLIENTES_CORREOS WHERE DIRECCION='" . $correo . "' AND ID_CLIENTE='" . $id . "'");
$query         = mysqli_query($cn, $selectQuery);
$totalCliente  = mysqli_num_rows($query);
if ($totalCliente <= 0) {
    $jsonData['success'] = 0;
} else {
    $jsonData['success'] = 1;
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsonData);

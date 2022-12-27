<?php
require_once('../../mysql/conexion.php');
require_once('../../ripcord-master/ripcord.php');

$cn = conectar();

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";

$models = ripcord::client("$url/xmlrpc/2/common");
$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

if (!empty($uid)) {
    echo "Inicio de Sesion Exitoso :) " . $uid . '</br>';
} else {
    echo "Fallo la conexion";
}

$kwargs = ['fields' => ['name',]];
$ids = $models->execute_kw(
    $db,
    $uid,
    $password,
    'res.partner',
    'search_read',
    array(array(array('customer', '=', true))),
    $kwargs
);

$json = json_encode($ids);
$bytes = file_put_contents("clientes.json", $json);

if (file_exists('clientes.json')) {
    $filename   = 'clientes.json';
    $data       = file_get_contents($filename);
    $clientes = json_decode($data);
} else {
}

foreach ($clientes as $cliente) {
    $sqlSelect = "SELECT ID FROM CLIENTES WHERE ID = $cliente->id";
    $sqlResult = $cn->query($sqlSelect);
    if ($sqlResult->num_rows==1) {
    } else {
        $sqlInsert = "INSERT INTO CLIENTES VALUES($cliente->id,'$cliente->name')";
        $cn->query($sqlInsert);
    }
}

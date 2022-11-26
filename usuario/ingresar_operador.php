<?php
require_once('../mysql/conexion.php');
require_once('../ripcord-master/ripcord.php');

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

$kwargs = ['fields' => ['id','name',]];
$ids = $models->execute_kw(
    $db,
    $uid,
    $password,
    'hr.employee',
    'search_read',
    array(array(array('department_id', '=', 5))),
    $kwargs
);

$json = json_encode($ids);
$bytes = file_put_contents("operadores.json", $json);

if (file_exists('operadores.json')) {
    $filename   = 'operadores.json';
    $data       = file_get_contents($filename);
    $operadores = json_decode($data);
} else {
}

foreach ($operadores as $operador) {
    $sqlSelect = "SELECT NOMBRE FROM OPERADORES WHERE NOMBRE = '$operador->name'";
    if ($cn->query($sqlSelect)) {
    } else {
        $sqlInsert = "INSERT INTO OPERADORES VALUES($operador->id,'$operador->name')";
        $cn->query($sqlInsert);
    }
}

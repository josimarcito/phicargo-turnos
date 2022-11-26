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

$models->execute_kw(
    $db,
    $uid,
    $password,
    'res.partner',
    'search_read',
    array(array(array('is_company', '=', true))),
    array('fields' => array('name', 'country_id', 'comment'), 'limit' => 5)
);

$id = $models->execute_kw(
    $db,
    $uid,
    $password,
    'fleet.vehicle',
    'fields_get',
    array(),
    array('attributes' => array('string', 'help', 'type'))
);


$json = json_encode($id);
$bytes = file_put_contents("a.json", $json);

if (file_exists('a.json')) {
    $filename   = 'a.json';
    $data       = file_get_contents($filename);
    $unidades = json_decode($data);
} else {
}

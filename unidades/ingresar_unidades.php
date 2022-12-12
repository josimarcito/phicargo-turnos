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

$kwargs = ['fields' => ['name2', 'license_plate', 'fleet_type']];
$ids = $models->execute_kw(
    $db,
    $uid,
    $password,
    'fleet.vehicle',
    'search_read',
    array(array(array('fleet_type', '=', 'tractor'))),
    $kwargs
);

$json = json_encode($ids);
$bytes = file_put_contents("unidades.json", $json);

if (file_exists('unidades.json')) {
    $filename   = 'unidades.json';
    $data       = file_get_contents($filename);
    $unidades = json_decode($data);
} else {
}

foreach ($unidades as $unidad) {
    $sqlSelect = "SELECT PLACAS FROM UNIDADES WHERE PLACAS = '$unidad->license_plate'";
    $sqlResult = $cn->query($sqlSelect);
    if ($sqlResult->num_rows==1) {
    } else {

        $sqlInsert = "INSERT INTO UNIDADES VALUES('$unidad->license_plate','$unidad->name2','DENTRO')";
        $cn->query($sqlInsert);
    }
}

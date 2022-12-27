<?php

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";

$referencia = $_POST['referencia'];;

require_once('../../ripcord-master/ripcord.php');
$models = ripcord::client("$url/xmlrpc/2/common");
$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

if (!empty($uid)) {
} else {
}

$ids = $models->execute_kw(
    $db,
    $uid,
    $password,
    'tms.travel.history.events',
    'search',
    array(array(array('travel_id', '=', $referencia))),
    array('limit' => 10)
);

$records = $models->execute_kw(
    $db,
    $uid,
    $password,
    'tms.travel.history.events',
    'read',
    array($ids)
);

$json = json_encode($records);
print($json);
$bytes = file_put_contents("historial.json", $json);

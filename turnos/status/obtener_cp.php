<?php

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";
date_default_timezone_set('America/Mexico_City');

$name           = $_POST['name'];;

require_once('../../ripcord-master/ripcord.php');
$models = ripcord::client("$url/xmlrpc/2/common");

$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

if (!empty($uid)) {
} else {
}
$kwargs = ['fields' => ['travel','x_reference']];

$ids = $models->execute_kw(
    $db,
    $uid,
    $password,
    'tms.waybill',
    'search_read',
    array(array(
        array('travel_id', '=', $name),
    )),
    $kwargs
);

$json = json_encode($ids);
$bytes = file_put_contents("cp.json", $json);
print($json);

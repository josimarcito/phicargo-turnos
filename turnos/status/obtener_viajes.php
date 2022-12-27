<?php

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";

$id = $_POST['id'];;

require_once('../../ripcord-master/ripcord.php');
$models = ripcord::client("$url/xmlrpc/2/common");

$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");


if (!empty($uid)) {
} else {
}
$kwargs = ['fields' => ['id', 'date', 'user_id', 'name', 'vehicle_id', 'trailer1_id', 'dolly_id', 'route_id', 'partner_id', 'date_start_real'], 'limit' => 1];

$ids = $models->execute_kw(
    $db,
    $uid,
    $password,
    'tms.travel',
    'search_read',
    array(array(
        array('employee_id', '=', $id),
        array('partner_id', '!=', false),
    )),
    $kwargs
);

$json = json_encode($ids);
$bytes = file_put_contents("v.json", $json);
print($json);

<?php
require_once('../../ripcord-master/ripcord.php');

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";

$models = ripcord::client("$url/xmlrpc/2/common");
$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

if (!empty($uid)) {
} else {
}
$kwargs = ['fields' => ['id', 'date', 'user_id', 'store_id', 'name', 'employee_id', 'vehicle_id', 'trailer1_id', 'dolly_id', 'route_id', 'partner_id', 'date_start_real', 'waybill_ids']];

$ids = $models->execute_kw(
    $db,
    $uid,
    $password,
    'tms.travel',
    'search_read',
    array(array(
        (array('partner_id', '!=', false)),
        (array('waybill_ids', '!=', NULL)),
        (array('date', '>=', "2022-08-01")),
        (array('date', '<=', "2022-08-31"))
    )),
    $kwargs
);

$json = json_encode($ids);
$bytes = file_put_contents("plandeviajes.json", $json);

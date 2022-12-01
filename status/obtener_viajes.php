<?php

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";

require_once('../ripcord-master/ripcord.php');
$models = ripcord::client("$url/xmlrpc/2/common");

$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

if (!empty($uid)) {
    
} else {
    
}
$kwargs = ['fields' => ['id','date','user_id','name','vehicle_id','trailer1_id','dolly_id','route_id','partner_id','date_start_real']];

$ids = $models->execute_kw(
    $db,
    $uid,
    $password,
    'tms.travel',
    'search_read',
    array(array(
        array('employee_id', '=', 620),
        (array('state', '=', 'draft')),
        (array('date', '>=', "2022-08-01 00:00:00")),
        (array('date', '<=', "2022-08-31 23:00:00"))
    )),
    $kwargs
);

$json = json_encode($ids);
$bytes = file_put_contents("v.json", $json);
print($json);

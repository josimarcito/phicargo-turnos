<?php

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";
date_default_timezone_set('America/Mexico_City');

$id               = $_POST['id'];;
$status           = $_POST['status'];
$ubicacion        = $_POST['ubicacion'];
$comentarios      = $_POST['comentarios'];

require_once('../../ripcord-master/ripcord.php');
$models = ripcord::client("$url/xmlrpc/2/common");

$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

if (!empty($uid)) {
} else {
}

if (!empty($uid)) {
    $models = ripcord::client("$url/xmlrpc/2/object");

    $values = [
        'travel_id' => $id,
        'status' => $status,
        'location' => $ubicacion,
        'name' => $comentarios
    ];
    $partners = $models->execute_kw($db, $uid, $password, 'tms.travel.history.events', 'create', [$values]);

    echo 1;
} else {
    echo 0;
}

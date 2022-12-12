<?php

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";

require_once('../../ripcord-master/ripcord.php');
$models = ripcord::client("$url/xmlrpc/2/common");

$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

if (!empty($uid)) {
} else {
}

$id_viaje = 29515;
$id_op = $_POST['id'];
$nombre_op = $_POST['nombre'];

if (!empty($uid)) {

    $partner_record_ids = [$id_viaje];
    $partner_value = [
        'x_operador_bel_id' => $id_op,
        'x_operador_bel' => $nombre_op,
    ];
    $values = [$partner_record_ids, $partner_value];
    $partners = $models->execute_kw($db, $uid, $password, 'tms.waybill', 'write', $values);
    echo 1;
} else {
    echo 0;
}


//'x_operador_bel' => $name

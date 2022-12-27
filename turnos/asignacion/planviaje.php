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

$records = $models->execute_kw(
    $db,
    $uid,
    $password,
    'tms.waybill',
    'search_read',
    array(array(array('expected_date_delivery', '=', date('Y/m/d')), 
    array('store_id', '=', 1), 
    array('x_operador_bel', '=', false))),
    array(
        'fields' => array('name', 'store_id', 'x_ejecutivo_viaje_bel', 'partner_id', 'x_ruta_bel', 'x_tipo_bel', 'x_tipo2_bel', 'x_modo_bel', 'x_medida_bel', 'x_operador_bel_id', 'x_operador_bel', 'date_start_real', 'x_custodia_bel'),
        'limit' => 16
    )
);

$json = json_encode($records);
print($json);

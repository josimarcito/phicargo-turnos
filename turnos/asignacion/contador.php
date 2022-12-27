<?php
require_once("../../mysql/conexion.php");
require_once('../../ripcord-master/ripcord.php');

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";

$models = ripcord::client("$url/xmlrpc/2/common");
$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

$proceso = $models->execute_kw($db, $uid, $password, 'tms.waybill', 'search', array(array(array('x_operador_bel_id', '=', 277),array('expected_date_delivery', '=', '2022/08/31'))));
$json = json_encode($proceso);

function JSON2Array($data){
    return  (array) json_decode(stripslashes($data));
}

$array = JSON2Array($json);
if(empty($array)){
    echo("The array is empty.");
}else{
    echo 2;
}


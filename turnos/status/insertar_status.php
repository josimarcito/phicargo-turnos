<?php

$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";
date_default_timezone_set('America/Mexico_City');

$id           = $_POST['id'];;
$vehiculo_placas  = $_POST['vehiculo'];;
$status       = $_POST['status'];;
$comentarios = $_POST['comentarios'];

list($vehiculo, $placas) = explode(' ', $vehiculo_placas);

$GPS = file_get_contents('https://telemetry-api-tczr3qabsq-uc.a.run.app/clients/1195/users/10858/assets/current-position?key=AIzaSyBXuP2qTJLg3TOMBlgK4TgEcMi-De7hgic');

$decoded_json = json_decode($GPS, true);

$ubicacion = $decoded_json['data'];

$i = 0;
foreach ($ubicacion as $ubi) {
    if ($ubicacion[$i]['vehicleNumber']==$vehiculo) {
        $ubicacion_enviar = "CIUDAD: ".($ubicacion[$i]['position']['nearestCity']['name']).
        ", REFERENCIA: ".($ubicacion[$i]['position']['nearestCityReference']).
        ", LATITUD: ".($ubicacion[$i]['position']['latitude']).
        ", LONGITUD: ".($ubicacion[$i]['position']['longitude'])."";
    }
    $i++;
}

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
        'location' => $ubicacion_enviar,
        'name' => $comentarios
    ];
    $partners = $models->execute_kw($db, $uid, $password, 'tms.travel.history.events', 'create', [$values]);

    echo 1;
} else {
    echo 0;
}

<?php
require_once('../../ripcord-master/ripcord.php');

define("URL", "http://belchez-pruebas.argil.mx");
define("DB", "20220826_BELCHEZ_MASTER_12");
define("USERNAME", "admin");
define("PASSWOORD", "Phic4rg022#");

function conectar()
{

    try {
        $models = ripcord::client(URL."/xmlrpc/2/object");
        $uid = $models->authenticate(DB, USERNAME, PASSWOORD, array());
        $models = ripcord::client(URL."/xmlrpc/2/common");
        if (!empty($uid)) {
            echo 'conexion exitosa';
        } else {
            echo "error";
        }
    } catch (Exception $e) {
        die("Error en el acceso a la base de datos");
    }
    return  $models;
}

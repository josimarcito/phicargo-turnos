<?php
require_once('../../mysql/conexion.php');
require_once('../PLANTILLA/plantilla.php');

$cn = conectar();
$id_viaje       = $_POST['id'];
$placas         = $_POST['placas'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

$sqlSelect4 = "SELECT ID, PLACAS, REFERENCIA FROM VIAJES WHERE ID = $id_viaje AND ESTADO = 'Activo'";
$resultSet4 = $cn->query($sqlSelect4);
while ($row = $resultSet4->fetch_assoc()) {

    $refv     = $row['REFERENCIA'];
    $sqlSelect = "SELECT ID, LATITUD, LONGITUD, REFERENCIA, VELOCIDAD, FECHA_HORA FROM UBICACIONES WHERE PLACAS = '$placas' ORDER BY FECHA_HORA DESC LIMIT 1";
    if ($cn->query($sqlSelect)) {
        $resultSet = $cn->query($sqlSelect);
        $row = $resultSet->fetch_assoc();
        $id_ubicacion = $row['ID'];
    } else {
        echo 0;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.office365.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'L17021607@veracruz.tecnm.mx';
        $mail->Password   = 'Choforo3d';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('L17021607@veracruz.tecnm.mx', 'TRANSPORTES BELCHEZ S.A. DE C.V.');

        $sqlSelect2 = "SELECT ID_CLIENTE FROM VIAJES WHERE ID = '$id_viaje'";
        if ($cn->query($sqlSelect2)) {
            $resultSet2 = $cn->query($sqlSelect2);
            $row2 = $resultSet2->fetch_assoc();
            $cliente = $row2['ID_CLIENTE'];
            $sqlSelect3 = "SELECT DIRECCION FROM CLIENTES_CORREOS WHERE ID_CLIENTE = '$cliente' AND TIPO = 'Destinatario'";
            if ($cn->query($sqlSelect3)) {
                $resultSet3 = $cn->query($sqlSelect3);
                while ($row3 = $resultSet3->fetch_assoc()) {
                    $mail->addAddress("" . $row3['DIRECCION'] . "", '');
                }
            }
        }

        $sqlSelect5 = "SELECT DIRECCION FROM CLIENTES_CORREOS WHERE ID_CLIENTE = '$cliente' AND TIPO = 'CC'";
        if ($cn->query($sqlSelect5)) {
            $resultSet6 = $cn->query($sqlSelect5);
            while ($row7 = $resultSet6->fetch_assoc()) {
                $mail->addCC("" . $row7['DIRECCION'] . "", '');
            }
        }


        $mail->isHTML(true);
        $mail->Subject = 'STATUS DE POSICIONAMIENTO: ' . $refv;

        if ($row['VELOCIDAD'] > 0.00) {
            $estado = 'En Ruta';
        } else {
            $estado = 'Detenido';
        }

        $body = getPlantilla($refv,$placas);

        $mail->Body    = $body;
        $mail->AltBody = '';

        $mail->send();
        echo 'El correo ha sido enviado';


        $sqlInsert = "INSERT INTO CORREOS VALUES(NULL, $id_viaje, $id_ubicacion, NOW())";
        if ($cn->query($sqlInsert)) {
            echo 1;
        } else {
            echo 0;
        }


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

        if (!empty($uid)) {
            $models = ripcord::client("$url/xmlrpc/2/object");

            $values = [
                'travel_id' => $id_viaje,
                'status' => $estado,
                'location' => 'Latitud: ' . $row['LATITUD'] . ' , ' . 'Longitud: ' . $row['LONGITUD'],
            ];
            $partners = $models->execute_kw($db, $uid, $password, 'tms.travel.history.events', 'create', [$values]);

            echo 1;
        } else {
            echo 0;
        }
    } catch (Exception $e) {
        echo "Error no se envio el correo :(: {$mail->ErrorInfo}";
    }
}

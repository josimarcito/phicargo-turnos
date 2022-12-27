<?php
require_once('../../mysql/conexion.php');
$cn = conectar();
$sqlSelect = "SELECT ID, PLACAS, REFERENCIA FROM VIAJES";
$resultSet = $cn->query($sqlSelect);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

while ($row = $resultSet->fetch_assoc()) {
    $id_viaje = $row['ID'];
    $placas   = $row['PLACAS'];
    $refv     = $row['REFERENCIA'];
    $sqlSelect = "SELECT ID, LATITUD, LONGITUD, REFERENCIA, VELOCIDAD, FECHA_HORA FROM UBICACIONES WHERE PLACAS = '$placas' ORDER BY FECHA_HORA DESC LIMIT 1";
    $resultSet2 = $cn->query($sqlSelect);
    $row2 = $resultSet2->fetch_assoc();
    $id_ubicacion = $row2['ID'];
    $sqlInsert = "INSERT INTO CORREOS VALUES(NULL,$id_viaje,$id_ubicacion,NOW())";
    $resultSet3 = $cn->query($sqlInsert);


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
        $mail->addAddress('josymarcastro311998@gmail.com', '');

        $mail->isHTML(true);
        $mail->Subject = 'STATUS DE POSICIONAMIENTO: '.$refv;

        if ($row2['VELOCIDAD'] > 0.00) {
            $estado = 'En Ruta';
        } else {
            $estado = 'Detenido';
        }

        $mail->Body    = 'Fecha: ' . $row2['FECHA_HORA'] . '<br>' . 'Latitud: ' . $row2['LATITUD'] . '<br>' . 'Longitud: ' . $row2['LONGITUD'] . '<br>' . 'Referencia: ' . $row2['REFERENCIA'] . '<br>' . 'Estado: ' . $estado;
        $mail->AltBody = '';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
            'location' => 'Latitud: ' . $row2['LATITUD'] . ' , ' . 'Longitud: ' . $row2['LONGITUD'],
        ];
        $partners = $models->execute_kw($db, $uid, $password, 'tms.travel.history.events', 'create', [$values]);

        echo 1;
    } else {
        echo 0;
    }
}
?>
<script>
    setInterval("location.reload()", 60000);
</script>

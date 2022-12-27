<?php
require 'vendor/autoload.php';
require_once "mysql/conexion.php";

$cn = conectar();

use Location\Coordinate;
use Location\Polygon;

// VERACRUZ
$VERACRUZ = new Polygon();

$VERACRUZ->addPoint(new Coordinate(19.22572345509212, -96.19442759868642));
$VERACRUZ->addPoint(new Coordinate(19.22447141349288, -96.19447323326675));
$VERACRUZ->addPoint(new Coordinate(19.224490080939194, -96.1967475774345));
$VERACRUZ->addPoint(new Coordinate(19.2257596901687, -96.19666101597471));

$MANZANILLO = new Polygon();

$MANZANILLO->addPoint(new Coordinate(19.09861973908224, -104.27277828529891));
$MANZANILLO->addPoint(new Coordinate(19.09717307895297, -104.27384952239909));
$MANZANILLO->addPoint(new Coordinate(19.09792745668346, -104.27551767901318));
$MANZANILLO->addPoint(new Coordinate(19.099201499028116, -104.27487537799526));

$MANIOBRAS_VER = new Polygon();

$MANIOBRAS_VER->addPoint(new Coordinate(19.408931898013698, -95.91207656435203));
$MANIOBRAS_VER->addPoint(new Coordinate(19.39275827277487, -96.45118707135661));
$MANIOBRAS_VER->addPoint(new Coordinate(18.938461434568957, -96.43403923760522));
$MANIOBRAS_VER->addPoint(new Coordinate(18.945412540323, -95.75629138721833));

$MANIOBRAS_MANZANILLO = new Polygon();

$MANIOBRAS_MANZANILLO->addPoint(new Coordinate(19.176939287475808, -104.18588737937041));
$MANIOBRAS_MANZANILLO->addPoint(new Coordinate(19.203021175150475, -104.51399684432205));
$MANIOBRAS_MANZANILLO->addPoint(new Coordinate(18.958808207110263, -104.51136670833044));
$MANIOBRAS_MANZANILLO->addPoint(new Coordinate(18.935175687814272, -104.1595860201025));

try {
    $GPS = file_get_contents('https://telemetry-api-tczr3qabsq-uc.a.run.app/clients/1195/users/10858/assets/current-position?key=AIzaSyBXuP2qTJLg3TOMBlgK4TgEcMi-De7hgic');
} catch (Exception $e) {
    echo $e->getMessage();
}


$decoded_json = json_decode($GPS, true);
$json = json_encode($decoded_json);
$bytes = file_put_contents("ubicaciones.json", $json);

$ubicacion     = $decoded_json['data'];
$codigo        = $decoded_json['code'];
$mensaje       = $decoded_json['message'];
$date          = $decoded_json['meta']['queryDate'];
$transaccion   = $decoded_json['meta']['transactionId'];

$logFile = fopen("log.txt", 'a') or die("Error creando archivo");
fwrite($logFile, "\n" . date("d/m/Y H:i:s") . " Codigo: " . $codigo . ', Mensaje: ' . $mensaje . ', Transaccion: ' . $transaccion . ', Date: ' . $date) or die("Error escribiendo en el archivo");
fclose($logFile);

function formatear($dateTime)
{
    $tz_from = 'America/Mexico_City';
    $newDateTime = new DateTime($dateTime, new DateTimeZone($tz_from));
    $newDateTime->setTimezone(new DateTimeZone("UTC"));
    $dateTimeUTC = $newDateTime->format("Y-m-d H:i:s");
    $utc_ts = strtotime($dateTimeUTC);
    $offset = date("Z");
    $local_ts = $utc_ts + $offset;
    $local_time = date("Y-m-d G:i:s", $local_ts);

    return $local_time;
}

$i = 0;
foreach ($ubicacion as $ubi) {
    $unidad     = $ubicacion[$i]['vehicleNumber'];
    $placas     = $ubicacion[$i]['numberPlates'];
    $latitud    = $ubicacion[$i]['position']['latitude'];
    $longitud   = $ubicacion[$i]['position']['longitude'];
    $referencia = $ubicacion[$i]['position']['nearestCityReference'];
    $velocidad  = $ubicacion[$i]['position']['gpsSpeed'];
    $dateTime   = $ubicacion[$i]['position']['date'];

    $fecha_hora = formatear($dateTime);
    $separar = (explode(" ", $fecha_hora));
    $fecha = $separar[0];
    $hora = $separar[1];

    $sqlSelect = "SELECT ESTADO, SALIDA, REGRESO FROM UNIDADES WHERE PLACAS ='$placas'";
    $resultSet = $cn->query($sqlSelect);
    $row = $resultSet->fetch_assoc();

    $COORDENADA = new Coordinate($latitud, $longitud);
    if ($VERACRUZ->contains($COORDENADA)) {

        if ($row['ESTADO'] == 'DENTRO') {
            echo 'UNIDAD: ' . $unidad . ' ' . $placas . ' ' . $latitud . ',' . $longitud . " DENTRO<br>";
        } else {
            $sqlInsert = "INSERT INTO UBICACIONES VALUES(NULL,'$placas',$latitud, $longitud, '$referencia', $velocidad, '$fecha_hora')";
            $cn->query($sqlInsert);

            if ($row['ESTADO'] == 'FUERA') {
                $sqlUpdate = "UPDATE UNIDADES SET ESTADO = 'DENTRO', BASE = 'VERACRUZ', REGRESO = '$fecha $hora' WHERE PLACAS ='$placas'";
                $cn->query($sqlUpdate);
            }

            $resultSet = $cn->query($sqlSelect);
            $row = $resultSet->fetch_assoc();

            if ($row['SALIDA'] != '' && $row['REGRESO'] != '') {
                $salida  = $row['SALIDA'];
                $regreso = $row['REGRESO'];
                $sqlSelect = "SELECT LATITUD, LONGITUD FROM UBICACIONES WHERE FECHA_HORA BETWEEN '$salida' AND '$regreso' AND PLACAS ='$placas'";
                $resultSet = $cn->query($sqlSelect);
                $salio = false;

                while (($row2 = $resultSet->fetch_assoc()) && ($salio != true)) {
                    $LAT   = $row2['LATITUD'];
                    $LONG  = $row2['LONGITUD'];
                    $coord = new Coordinate($LAT, $LONG);
                    if ($MANIOBRAS_VER->contains($coord)) {
                        echo "NO SALIO DE VERACRUZ<br>";
                        echo $row2['LATITUD'] . ' , ' . $row2['LONGITUD'] . "DENTRO<br>";
                    } else {
                        $salio = true;
                        echo "SI SALIO DE VERACRUZ<br>";
                        echo $row2['LATITUD'] . ' , ' . $row2['LONGITUD'] . "FUERA<br>";
                        $sqlInsert = "INSERT INTO TURNOS VALUES(NULL,'Manzanillo','0','$placas', '$fecha' , '$hora','',NULL,NULL)";
                        $cn->query($sqlInsert);
                    }
                }
            }
        }
    } else if ($MANZANILLO->contains($COORDENADA)) {

        if ($row['ESTADO'] == 'DENTRO') {
            echo 'UNIDAD: ' . $unidad . ' ' . $placas . ' ' . $latitud . ',' . $longitud . " DENTRO<br>";
        } else {
            $sqlInsert = "INSERT INTO UBICACIONES VALUES(NULL,'$placas',$latitud, $longitud, '$referencia', $velocidad, '$fecha_hora')";
            $cn->query($sqlInsert);

            if ($row['ESTADO'] == 'FUERA') {
                $sqlUpdate = "UPDATE UNIDADES SET ESTADO = 'DENTRO', BASE = 'MANZANILLO', REGRESO = '$fecha $hora' WHERE PLACAS ='$placas'";
                $cn->query($sqlUpdate);
            }

            $resultSet = $cn->query($sqlSelect);
            $row = $resultSet->fetch_assoc();

            if ($row['SALIDA'] != '' && $row['REGRESO'] != '') {
                $salida  = $row['SALIDA'];
                $regreso = $row['REGRESO'];
                $sqlSelect = "SELECT LATITUD, LONGITUD FROM UBICACIONES WHERE FECHA_HORA BETWEEN '$salida' AND '$regreso' AND PLACAS ='$placas'";
                $resultSet = $cn->query($sqlSelect);
                $salio = false;

                while (($row2 = $resultSet->fetch_assoc()) && ($salio != true)) {
                    $LAT   = $row2['LATITUD'];
                    $LONG  = $row2['LONGITUD'];
                    $coord = new Coordinate($LAT, $LONG);
                    if ($MANIOBRAS_MANZANILLO->contains($coord)) {
                        echo "NO SALIO DE MANZANILLO<br>";
                        echo $row2['LATITUD'] . ' , ' . $row2['LONGITUD'] . "DENTRO<br>";
                    } else {
                        $salio = true;
                        echo "SI SALIO DE MANZANILLO<br>";
                        echo $row2['LATITUD'] . ' , ' . $row2['LONGITUD'] . "FUERA<br>";
                        $sqlInsert = "INSERT INTO TURNOS VALUES(NULL,'Veracruz','0','$placas', '$fecha' , '$hora','',NULL,NULL)";
                        $cn->query($sqlInsert);
                    }
                }
            }
        }
    } else {

        echo 'UNIDAD: ' . $unidad . ' ' . $placas . ' ' . $latitud . ',' . $longitud . " FUERA<br>";

        if ($row['ESTADO'] == 'DENTRO') {
            $sqlUpdate = "UPDATE UNIDADES SET SALIDA = '$fecha $hora' WHERE PLACAS ='$placas'";
            $cn->query($sqlUpdate);
        }

        $sqlUpdate = "UPDATE UNIDADES SET ESTADO = 'FUERA', REGRESO ='' WHERE PLACAS ='$placas'";
        $cn->query($sqlUpdate);

        $sqlSelect = "SELECT PLACAS, LATITUD, LONGITUD, FECHA_HORA FROM UBICACIONES WHERE placas = '$placas' AND latitud = $latitud AND longitud = $longitud AND FECHA_HORA = '$fecha_hora'";
        $resultado = $cn->query($sqlSelect);
        if ($resultado->num_rows == 1) {
        } else {
            $sqlInsert = "INSERT INTO UBICACIONES VALUES(NULL,'$placas',$latitud, $longitud, '$referencia', $velocidad, '$fecha_hora')";
            $cn->query($sqlInsert);
        }
    }

    $i++;
}
?>
<script>
    setInterval("location.reload()", 60000);
</script>
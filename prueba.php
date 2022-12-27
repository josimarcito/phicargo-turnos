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


$ZONA = new Polygon();

$ZONA->addPoint(new Coordinate(19.408931898013698, -95.91207656435203));
$ZONA->addPoint(new Coordinate(19.39275827277487, -96.45118707135661));
$ZONA->addPoint(new Coordinate(18.938461434568957, -96.43403923760522));
$ZONA->addPoint(new Coordinate(18.945412540323, -95.75629138721833));

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

$unidad     = 'C-0015';
$placas     = '57AR7E';
$latitud    =  19.22584457404775;
$longitud   = -92.1955219471864;
$ciudad     = 'VERACRUZ';
$referencia = 'VERACRUZ';
$velocidad  = 300;
$dateTime   = date('Y-m-d H:i:s');

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
            echo $sqlSelect;
            $salio = false;

            while (($row2 = $resultSet->fetch_assoc()) && ($salio != true)) {
                $LAT   = $row2['LATITUD'];
                $LONG  = $row2['LONGITUD'];
                $coord = new Coordinate($LAT, $LONG);
                if ($ZONA->contains($coord)) {
                    echo "NO SALIO DE VERACRUZ<br>";
                    echo $row2['LATITUD'] . ' , ' . $row2['LONGITUD'] . "DENTRO<br>";
                } else {
                    $salio = true;
                    echo "SI SALIO DE VERACRUZ<br>";
                    echo $row2['LATITUD'] . ' , ' . $row2['LONGITUD'] . "FUERA<br>";
                    $sqlInsert = "INSERT INTO TURNOS VALUES(NULL,'Veracruz','0','$placas', '$fecha' , '$hora','',NULL,NULL)";
                    $cn->query($sqlInsert);
                }
            }
        }
    }
} else if ($MANZANILLO->contains($COORDENADA)) {
} else {

    echo 'UNIDAD: ' . $unidad . ' ' . $placas . ' ' . $latitud . ',' . $longitud . " FUERA<br>";

    if ($row['ESTADO'] == 'DENTRO') {
        $sqlUpdate = "UPDATE UNIDADES SET SALIDA = '$fecha $hora' WHERE PLACAS ='$placas'";
        $cn->query($sqlUpdate);
    }

    $sqlUpdate = "UPDATE UNIDADES SET ESTADO = 'FUERA', REGRESO ='' WHERE PLACAS ='$placas'";
    $cn->query($sqlUpdate);

    $sqlSelect = "SELECT PLACAS, LATITUD, LONGITUD FROM UBICACIONES WHERE placas = '$placas' AND latitud = $latitud AND longitud = $longitud";
    $resultado = $cn->query($sqlSelect);
    if ($resultado->num_rows == 1) {
    } else {
        $sqlInsert = "INSERT INTO UBICACIONES VALUES(NULL,'$placas',$latitud, $longitud, '$referencia', $velocidad, '$fecha_hora')";
        $cn->query($sqlInsert);
    }
}


?>
<script>
    setInterval("location.reload()", 60000);
</script>
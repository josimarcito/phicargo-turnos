
<?php
require 'vendor/autoload.php';
require_once "mysql/conexion.php";

$cn = conectar();

// introducir dos clases
use Location\Coordinate;
use Location\Polygon;

// Dibujar un polígono
$geo = new Polygon();

$geo->addPoint(new Coordinate(19.22572345509212, -96.19442759868642));
$geo->addPoint(new Coordinate(19.22447141349288, -96.19447323326675));
$geo->addPoint(new Coordinate(19.224490080939194, -96.1967475774345));
$geo->addPoint(new Coordinate(19.2257596901687, -96.19666101597471));

$GPS = file_get_contents('https://telemetry-api-tczr3qabsq-uc.a.run.app/clients/1195/users/10858/assets/current-position?key=AIzaSyBXuP2qTJLg3TOMBlgK4TgEcMi-De7hgic');

$decoded_json = json_decode($GPS, true);

$ubicacion = $decoded_json['data'];

$i = 0;
foreach ($ubicacion as $ubi) {
    $unidad = $ubicacion[$i]['vehicleNumber'];
    $placas = $ubicacion[$i]['numberPlates'];
    $date   = $ubicacion[$i]['position']['date'] . "<br>";

    $a = new Coordinate($ubicacion[$i]['position']['latitude'], $ubicacion[$i]['position']['longitude']);
    if ($geo->contains($a)) {
        $sqlSelect = "SELECT ESTADO FROM UNIDADES WHERE PLACAS ='$placas'";
        $resultSet = $cn->query($sqlSelect);
        $row = $resultSet->fetch_assoc();

        if ($row['ESTADO'] == 'DENTRO') {
            echo  $unidad . " " . $placas . " " . "NO SE INGRESO PORQUE YA ESTA DENTRO <br>";
        } else {
            echo 'SE INGRESO "<br>';
            $dateTime = $ubicacion[$i]['position']['date'];
            $tz_from = 'America/Mexico_City';
            $newDateTime = new DateTime($dateTime, new DateTimeZone($tz_from));
            $newDateTime->setTimezone(new DateTimeZone("UTC"));
            $dateTimeUTC = $newDateTime->format("Y-m-d H:i:s");
            $utc_ts = strtotime($dateTimeUTC);
            $offset = date("Z");
            $local_ts = $utc_ts + $offset;
            $local_time = date("Y-m-d G:i:s", $local_ts);
            $separar = (explode(" ", $local_time));
            $fecha = $separar[0];
            $hora = $separar[1];
            $sqlInsert = "INSERT INTO TURNOS VALUES(NULL,'0','$placas', '$fecha' , '$hora','')";
            $resultSet = $cn->query($sqlInsert);
            $sqlUpdate = "UPDATE UNIDADES SET ESTADO = 'DENTRO' WHERE PLACAS ='$placas'";
            $cn->query($sqlUpdate);
            echo $unidad . " " . $placas . " " . "ESTADO: DENTRO \n ";
        }
    } else {
        $sqlUpdate = "UPDATE UNIDADES SET ESTADO = 'FUERA' WHERE PLACAS ='$placas'";
        $cn->query($sqlUpdate);
        echo $unidad . " " . $placas . " " . "ESTADO: FUERA \n" . "<br>";
    }

    $i++;
}
?>
<script>
    setInterval("location.reload()", 60000);
</script>
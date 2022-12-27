<?php

date_default_timezone_set("America/Mexico_City");
$FechaHoraActual = date("Y-m-d H:i");

require_once("../../mysql/conexion.php");
$cn = conectar();
$hoy = date('Y-m-d');
$sqlSelect = "SELECT ID_OPERADOR, FECHA_LLEGADA, HORA_LLEGADA, FH_ENTRADA, FH_SALIDA FROM TURNOS WHERE FH_ENTRADA IS NULL AND FH_SALIDA IS NULL
+ ORDER BY HORA_LLEGADA ASC LIMIT 5";
$resultSet = $cn->query($sqlSelect);

$FechaEntrada = new DateTime('2022-12-19 18:00');
while ($row = $resultSet->fetch_assoc()) {

    $id_op = $row['ID_OPERADOR'];

    $FechaEntrada->modify('+10 minute');
    $FE = $FechaEntrada->format('Y-m-d H:i:s');

    $FE2 = new DateTime($FE);
    $FE2->modify('+9 minute');
    $FS = $FE2->format('Y-m-d H:i:s');

    $sqlSelect2 = "UPDATE TURNOS SET FH_ENTRADA = '$FE', FH_SALIDA = '$FS' WHERE ID_OPERADOR = $id_op";
    echo $sqlSelect2."<br>";
    $resultSet2 = $cn->query($sqlSelect2);
}



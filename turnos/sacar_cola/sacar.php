<?php

require_once("../../mysql/conexion.php");
$cn = conectar();

date_default_timezone_set("America/Mexico_City");
$horaActual = date("H:i");
$entrada = '17:01';
$salida = '17:59';
if ($horaActual > $entrada && $horaActual < $salida) {
    $sqlSelect = "SELECT ID_COLA, ID_OPERADOR, PLACAS, FECHA_LLEGADA, HORA_LLEGADA, COMENTARIOS FROM COLA ORDER BY ID_COLA ASC";
    $resultSet = $cn->query($sqlSelect);
    while ($row = $resultSet->fetch_assoc()) {
        $id_operador = $row['ID_OPERADOR'];
        $placas      = $row['PLACAS'];
        $fecha       = $row['FECHA_LLEGADA'];
        $hora        = $row['HORA_LLEGADA'];
        $comentarios = $row['COMENTARIOS'];
        $sqlSelect2 = "INSERT INTO TURNOS VALUES(NULL,$id_operador,'$placas','$fecha','$hora','$comentarios')";
        $sqlSelect3 = "DELETE FROM COLA";
        $cn->query($sqlSelect2);
        $cn->query($sqlSelect3);
    }
    echo "VAMOS A SACAR A LOS DE LA COLA";
} else {
    echo "NO VAMOS A SACAR A LOS DE LA COLA";
}

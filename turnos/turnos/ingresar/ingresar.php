<?php

require_once "../../../mysql/conexion.php";

$cn = conectar();
$id_operador = $_POST['operador'];
$placas      = $_POST['unidad'];
$fecha       = $_POST['fecha'];
$hora        = $_POST['hora'];
$comentarios = $_POST['comentarios'];

$sqlSelect = "SELECT TURNO FROM TURNOS_VERACRUZ ORDER BY TURNO DESC";
$resultSet = $cn->query($sqlSelect);
$row = $resultSet->fetch_assoc();
$ultimo_turno = $row['TURNO'];
$siguiente_turno = $row['TURNO'] + 1;
if ($ultimo_turno == NULL) {
    $sqlSelect = "INSERT INTO TURNOS_VERACRUZ VALUES(NULL, 1,$id_operador,'$placas','$fecha','$hora','$comentarios','','')";
    if ($cn->query($sqlSelect)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    $sqlSelect = "INSERT INTO TURNOS_VERACRUZ VALUES(NULL,$siguiente_turno,$id_operador,'$placas','$fecha','$hora','$comentarios','','')";
    if ($cn->query($sqlSelect)) {
        echo 1;
    } else {
        echo 0;
    }
}

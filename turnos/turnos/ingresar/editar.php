<?php

require_once "../../../mysql/conexion.php";

$cn = conectar();
$id_turno    = $_POST['idturnoup'];
$id_operador = $_POST['operadorup'];
$placas      = $_POST['unidadup'];
$fecha       = $_POST['fechaup'];
$hora        = $_POST['horaup'];
$comentarios = $_POST['comentariosup'];

$sqlSelect = "UPDATE TURNOS_VERACRUZ SET ID_OPERADOR = $id_operador, PLACAS = '$placas', FECHA_LLEGADA = '$fecha', HORA_LLEGADA = '$hora', COMENTARIOS = '$comentarios' WHERE ID_TURNO = $id_turno";
if ($cn->query($sqlSelect)) {
    echo 1;
} else {
    echo 0;
}

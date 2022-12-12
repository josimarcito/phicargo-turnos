<?php

require_once "../../../mysql/conexion.php";

$cn = conectar();
$id_turno    = $_POST['idturnoup'];
$id_operador = $_POST['operadorup'];
$placas      = $_POST['unidadup'];
$fecha       = $_POST['fechaup'];
$hora        = $_POST['horaup'];
$comentarios = $_POST['comentariosup'];

$sqlInsert = "INSERT INTO COLA VALUES(NULL,$id_operador,'$placas','$fecha','$hora','$comentarios')";
$sqlDelete = "DELETE FROM TURNOS WHERE ID_TURNO = $id_turno";

if ($cn->query($sqlInsert)) {
    if ($cn->query($sqlDelete)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0;
}

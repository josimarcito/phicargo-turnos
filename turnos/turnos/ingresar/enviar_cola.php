<?php

require_once "../../../mysql/conexion.php";

$cn = conectar();
$id_turno    = $_POST['idturnoup'];
$dato        = $_POST['turnoup'];
$id_operador = $_POST['operadorup'];
$placas      = $_POST['unidadup'];
$fecha       = $_POST['fechaup'];
$hora        = $_POST['horaup'];
$comentarios = $_POST['comentariosup'];

$cn->autocommit(false);
try {
    $sqlDelete = "DELETE FROM TURNOS_VERACRUZ WHERE TURNO = $dato";
    $cn->query($sqlDelete);

    $sqlSelect = "SELECT TURNO FROM TURNOS_VERACRUZ ORDER BY TURNO DESC";
    $resultSet = $cn->query($sqlSelect);
    $row = $resultSet->fetch_assoc();
    $ultimo = $row['TURNO'];

    $sqlSelect2 = "SELECT TURNO FROM TURNOS_VERACRUZ WHERE TURNO BETWEEN $dato AND $ultimo ORDER BY TURNO ASC";
    $resultSet2 = $cn->query($sqlSelect2);

    while ($row2 = $resultSet2->fetch_assoc()) {
        $turno = $row2['TURNO'];
        $turnoant = $turno - 1;
        $sqlSelect3 = "UPDATE TURNOS_VERACRUZ SET TURNO = $turnoant WHERE TURNO = $turno";
        $resultSet3 = $cn->query($sqlSelect3);
    }

    $sqlInsert = "INSERT INTO COLA VALUES(NULL,$id_operador,'$placas','$fecha','$hora','$comentarios')";
    $cn->query($sqlInsert);

    $cn->commit();
    echo 1;
} catch (Exception $e) {
    $cn->rollback();
    echo 0;
}

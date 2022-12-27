<?php

require_once "mysql/conexion.php";

$cn = conectar();

function insertar()
{
    $cn = conectar();

    $sqlSelect = "SELECT TURNO FROM TURNOS_VERACRUZ ORDER BY TURNO DESC";
    $resultSet = $cn->query($sqlSelect);
    $row = $resultSet->fetch_assoc();
    $turno_anterior = $row['TURNO'];
    $siguiente = $row['TURNO'] + 1;
    if ($turno_anterior == NULL) {
        $sqlSelect = "INSERT INTO TURNOS_VERACRUZ VALUES(NULL, 1,312,'000','2022-12-27','00:00:00','','','')";
        $resultSet = $cn->query($sqlSelect);
    } else {
        $sqlSelect = "INSERT INTO TURNOS_VERACRUZ VALUES(NULL,$siguiente,312,'000','2022-12-27','00:00:00','','','')";
        $resultSet = $cn->query($sqlSelect);
    }
}

function eliminar($dato)
{
    $cn = conectar();

    $sqlDelete = "DELETE FROM TURNOS_VERACRUZ WHERE TURNO = $dato";
    $resultSet = $cn->query($sqlDelete);

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
}

function insertar_despues($dato)
{
    $cn = conectar();

    $sqlSelect = "SELECT TURNO FROM TURNOS_VERACRUZ ORDER BY TURNO DESC";
    $resultSet = $cn->query($sqlSelect);
    $row = $resultSet->fetch_assoc();
    $ultimo = $row['TURNO'];

    $sqlSelect2 = "SELECT ID_TURNO, TURNO FROM TURNOS_VERACRUZ WHERE TURNO BETWEEN $dato AND $ultimo ORDER BY TURNO ASC";
    $resultSet2 = $cn->query($sqlSelect2);

    while ($row2 = $resultSet2->fetch_assoc()) {
        $turno = $row2['ID_TURNO'];
        $turnoant = $row2['TURNO'] + 1;
        $sqlSelect3 = "UPDATE TURNOS_VERACRUZ SET TURNO = $turnoant WHERE ID_TURNO = $turno";
        echo $sqlSelect3 . "<br>";
        $resultSet3 = $cn->query($sqlSelect3);
    }

    $sqlSelect = "INSERT INTO TURNOS_VERACRUZ VALUES(NULL,$dato,800,'000','2022-12-27','00:00:00','','','')";
    $resultSet = $cn->query($sqlSelect);
}

insertar_despues(3);
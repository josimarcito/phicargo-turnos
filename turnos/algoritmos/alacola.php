<?php

require_once('../../mysql/conexion.php');

$cn = conectar();
$sqlSelect = "SELECT ID_TURNO, TURNO, ID_OPERADOR, TURNOS.ID_UNIDAD, ECO, NOMBRE_OPERADOR, FECHA_LLEGADA, HORA_LLEGADA, COMENTARIOS FROM TURNOS LEFT JOIN OPERADORES ON TURNOS.ID_OPERADOR = OPERADORES.ID INNER JOIN UNIDADES ON TURNOS.ID_UNIDAD = UNIDADES.ID_UNIDAD  WHERE FECHA_LLEGADA BETWEEN '2022-11-30' AND '2022-11-30' AND HORA_LLEGADA BETWEEN '09:00' AND '21:00' ORDER BY TURNO ASC";
$resultSet = $cn->query($sqlSelect);

$sqlSelect2 = "SELECT TURNO FROM TURNOS WHERE FECHA_LLEGADA BETWEEN '2022-11-30' AND '2022-11-30' AND HORA_LLEGADA BETWEEN '09:00' AND '21:00' ORDER BY TURNO DESC LIMIT 1";
$resultSet2 = $cn->query($sqlSelect2);
while ($row = $resultSet2->fetch_assoc()) {
    $turno = $row['TURNO'];
}

if (mysqli_num_rows($resultSet) != 0) {
    $sqlInsert = "INSERT INTO TURNOS VALUES(NULL,$turno+1,620,6638,'2022-11-30','18:00','')";
    if ($cn->query($sqlInsert)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    $sqlInsert = "INSERT INTO TURNOS VALUES(NULL,1,620,6638,'2022-11-30','18:00','')";
    if ($cn->query($sqlInsert)) {
        echo 1;
    } else {
        echo 0;
    }
}

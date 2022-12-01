<?php
require_once('../../../mysql/conexion.php');
$cn = conectar();

$unidad = $_REQUEST['unidad'];

$jsonData = array();
$selectQuery   = ("SELECT ID_TURNO, TURNO, ID_OPERADOR, TURNOS.ID_UNIDAD, ECO, NOMBRE_OPERADOR, FECHA_LLEGADA, HORA_LLEGADA, COMENTARIOS FROM TURNOS LEFT JOIN OPERADORES ON TURNOS.ID_OPERADOR = OPERADORES.ID INNER JOIN UNIDADES ON TURNOS.ID_UNIDAD = UNIDADES.ID_UNIDAD  WHERE FECHA_LLEGADA BETWEEN '2022-12-01' AND '2022-12-01' AND HORA_LLEGADA BETWEEN '09:00' AND '21:00' AND TURNOS.ID_UNIDAD ='$unidad' ORDER BY HORA_LLEGADA ASC");
$query         = mysqli_query($cn, $selectQuery);
$total         = mysqli_num_rows($query);

  if( $total <= 0 ){
    $jsonData['success'] = 0;
} else{
    $jsonData['success'] = 1;
  }

header('Content-type: application/json; charset=utf-8');
echo json_encode( $jsonData );
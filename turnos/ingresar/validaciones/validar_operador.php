<?php
require_once('../../../mysql/conexion.php');
$cn = conectar();

$operador = $_REQUEST['operador'];
$Date = date('Y-m-d');
$jsonData = array();
$selectQuery   = ("SELECT ID_TURNO, TURNO, ID_OPERADOR, TURNOS.ID_UNIDAD, ECO, NOMBRE_OPERADOR, FECHA_LLEGADA, HORA_LLEGADA, COMENTARIOS FROM TURNOS LEFT JOIN OPERADORES ON TURNOS.ID_OPERADOR = OPERADORES.ID INNER JOIN UNIDADES ON TURNOS.ID_UNIDAD = UNIDADES.ECO  WHERE FECHA_LLEGADA BETWEEN '$Date' AND '$Date' AND HORA_LLEGADA BETWEEN '09:00' AND '21:00' AND ID_OPERADOR ='$operador' ORDER BY HORA_LLEGADA ASC");
$query         = mysqli_query($cn, $selectQuery);
$total         = mysqli_num_rows($query);

  if( $total <= 0 ){
    $jsonData['success'] = 0;
} else{
    $jsonData['success'] = 1;
  }

header('Content-type: application/json; charset=utf-8');
echo json_encode( $jsonData );

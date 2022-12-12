<?php
require_once('../../../../mysql/conexion.php');
$cn = conectar();

$unidad = $_REQUEST['unidad'];
$Date = date('Y-m-d');
$jsonData = array();
$selectQuery   = ("SELECT ID_TURNO, ID_OPERADOR, NOMBRE_OPERADOR, UNIDADES.PLACAS, UNIDAD, FECHA_LLEGADA, HORA_LLEGADA, COMENTARIOS FROM TURNOS LEFT JOIN OPERADORES ON TURNOS.ID_OPERADOR = OPERADORES.ID LEFT JOIN UNIDADES ON TURNOS.PLACAS = UNIDADES.PLACAS WHERE TURNOS.PLACAS ='$unidad' ORDER BY HORA_LLEGADA ASC");
$query         = mysqli_query($cn, $selectQuery);
$total         = mysqli_num_rows($query);

  if( $total <= 0 ){
    $jsonData['success'] = 0;
} else{
    $jsonData['success'] = 1;
  }

header('Content-type: application/json; charset=utf-8');
echo json_encode( $jsonData );

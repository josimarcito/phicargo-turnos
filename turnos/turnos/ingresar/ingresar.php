<?php

require_once "../../../mysql/conexion.php";

$cn = conectar();
$id_operador = $_POST['operador'];
$placas      = $_POST['unidad'];
$fecha       = $_POST['fecha'];
$hora        = $_POST['hora'];
$comentarios = $_POST['comentarios'];

$sqlInsert = "INSERT INTO TURNOS VALUES(NULL,$id_operador,'$placas','$fecha','$hora','$comentarios')";
if($cn->query($sqlInsert)){
    echo 1;
}else{
    echo 0;
}


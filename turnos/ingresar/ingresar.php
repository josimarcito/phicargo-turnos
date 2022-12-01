<?php

require_once "../../mysql/conexion.php";

$cn = conectar();
$id_unidad   = $_POST['unidad'];
$id_operador = $_POST['operador'];
$fecha       = $_POST['fecha'];
$hora        = $_POST['hora'];
$comentarios = $_POST['comentarios'];

$sqlInsert = "INSERT INTO TURNOS VALUES(NULL,1,$id_operador,$id_unidad,'$fecha','$hora','$comentarios')";
if($cn->query($sqlInsert)){
    echo 1;
}else{
    echo 0;
}


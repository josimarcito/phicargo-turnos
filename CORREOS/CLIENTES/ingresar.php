<?php

require_once "../../mysql/conexion.php";
require_once "comprobar.php";

$cn = conectar();
$id              = $_POST['id'];
$correo          = $_POST['correo'];
$tipo            = $_POST['tipo'];


if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $sqlInsert = "INSERT INTO CLIENTES_CORREOS VALUES(NULL, $id,'$correo','$tipo')";
    if ($cn->query($sqlInsert)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo "{$correo}: No es un correo valido." . "<br>";
}

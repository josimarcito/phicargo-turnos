<?php

ob_start();
session_start();

require_once(__DIR__ . '/../mysql/conexion.php');

$usuario = $_POST['usuario'];
$contraseña = $_POST['passwoord'];

$cn = conectar();
$sqlSelect = "SELECT USUARIO, PASSWOORD, NOMBRE, TIPO FROM USUARIOS WHERE USUARIO = '$usuario' and PASSWOORD = '$contraseña'";
$resultSet = $cn->query($sqlSelect);
$row = $resultSet->fetch_assoc();
if ($resultSet->num_rows === 1) {
    echo 1;
    $_SESSION['userName'] = $row['USUARIO'];
    $_SESSION['userTipo'] = $row['TIPO'];
    $_SESSION['logueado'] = TRUE;
    $_SESSION['nombre']   = $row['NOMBRE'];
} else {
    echo 0;
}

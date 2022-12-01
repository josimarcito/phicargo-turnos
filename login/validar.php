<?php
require_once(__DIR__ . '/../mysql/conexion.php');

$usuario = $_POST['usuario'];
$contraseña = $_POST['passwoord'];

$cn = conectar();
$sqlSelect = "SELECT USUARIO, PASSWOORD FROM USUARIOS WHERE USUARIO = '$usuario' and PASSWOORD = '$contraseña'";
$resultSet = $cn->query($sqlSelect);

if ($resultSet->num_rows === 1) {
    echo 1;
} else {
    echo 0;
}

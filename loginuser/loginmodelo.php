<?php
require_once (__DIR__.'/../mysql/conexion.php');

function validar_sesion($usuario, $contraseña){
    $cn = conectar();
    $sqlSelect = "SELECT USUARIO, PASSWOORD, TIPO, NOMBRE FROM USUARIOS WHERE USUARIO = '$usuario' and PASSWOORD = '$contraseña'";
    $resultSet = $cn->query($sqlSelect);
   
    if($resultSet->num_rows === 1){
        return $row = $resultSet->fetch_assoc();
    }else{
        return 0;
    }
}
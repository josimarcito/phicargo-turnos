<?php

require_once "../../mysql/conexion.php";

$cn = conectar();
$id              = $_POST['idcorreoup'];
$correo          = $_POST['correoup'];
$tipo            = $_POST['tipoup'];

$sqlInsert = "UPDATE CLIENTES_CORREOS SET DIRECCION = '$correo', TIPO = '$tipo' WHERE ID_CORREO = $id";
echo $sqlInsert."<br>";
if ($cn->query($sqlInsert)) {
    echo 1;
} else {
    echo 0;
}

<?php

require_once "../../mysql/conexion.php";

$cn = conectar();
$id              = $_POST['idcorreoup'];

$sqlInsert = "DELETE FROM CLIENTES_CORREOS WHERE ID_CORREO = $id";
echo $sqlInsert."<br>";
if ($cn->query($sqlInsert)) {
    echo 1;
} else {
    echo 0;
}

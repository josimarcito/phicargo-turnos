<?php
require_once('../../mysql/conexion.php');

$cn = conectar();
$sqlSelect = "SELECT ID, NOMBRE_OPERADOR, PASSWOORD, STATUS FROM OPERADORES";
$resultSet = $cn->query($sqlSelect);

?>

<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th></th>
            <th>ID Empleado Odoo</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $resultSet->fetch_assoc()) { ?>
            <tr>
                <td>
                    <img src="../../img/usuario.png" width="28" height="28" class="rounded-circle me-2" alt="Avatar">
                </td>
                <td class="card-title"><?php echo $row['ID'] ?></td>
                <td class="card-title"><?php echo $row['NOMBRE_OPERADOR'] ?></td>
                <td><?php echo $row['PASSWOORD'] ?></td>
                <?php if ($row['STATUS'] == '1') { ?>
                    <td><div class="badge bg-success"><?php echo 'Logueado' ?></div></td>
                <?php } else { ?>
                    <td><div class="badge bg-danger"><?php echo 'Inactivo' ?></div></td>
                <?php } ?>

            </tr>
        <?php } ?>

    </tbody>
</table>
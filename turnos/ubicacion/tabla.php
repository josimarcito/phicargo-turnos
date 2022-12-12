<?php
require_once('../../mysql/conexion.php');

$cn = conectar();
$sqlSelect = "SELECT PLACAS, UNIDAD, ESTADO FROM phicargo.unidades;";
$resultSet = $cn->query($sqlSelect); ?>
<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th>PLACAS</th>
            <th>UNIDAD</th>
            <th>ESTADO</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        while ($row = $resultSet->fetch_assoc()) { ?>
            <tr class="cursor-pointer" onclick="">
                <td><?php echo $row['PLACAS'] ?></td>
                <td><?php echo $row['UNIDAD'] ?></td>
                <?php if ($row['ESTADO'] == 'FUERA') { ?>
                    <td class="text-center"><span class="badge bg-danger"><?php echo 'FUERA' ?></span></td>
                <?php } else { ?>
                    <td class="text-center">
                        <div class="badge bg-success"><?php echo 'DENTRO' ?></div>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>

    </tbody>
</table>
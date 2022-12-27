<?php
require_once('../../../mysql/conexion.php');
$mysqli = conectar();
$query = "SELECT ID_COLA, BASE, ID_OPERADOR, NOMBRE_OPERADOR, UNIDADES.PLACAS, UNIDAD, FECHA_LLEGADA, HORA_LLEGADA, COMENTARIOS FROM COLA LEFT JOIN OPERADORES ON COLA.ID_OPERADOR = OPERADORES.ID LEFT JOIN UNIDADES ON COLA.PLACAS = UNIDADES.PLACAS ORDER BY ID_COLA ASC";
$resultado = $mysqli->query($query);
echo 'aqui';
?>
<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th></th>
            <th>TURNO</th>
            <th>OPERADOR</th>
            <th>PLACAS / ECO</th>
            <th>FECHA LLEGADA</th>
            <th>HORA LLEGADA</th>
            <th>COMENTARIOS</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        while ($row = $resultado->fetch_assoc()) { ?>
            <tr class="cursor-pointer responsive">
                <td>
                    <img src="../../img/usuario.png" width="28" height="28" class="rounded-circle me-2" alt="Avatar">
                </td>
                <?php
                if ($row['COMENTARIOS'] == 'SE VA A LA COLA') { ?>
                    <td class="text-center"><span class="badge bg-danger"><?php echo 'N/A' ?></span></td>
                <?php } else { ?>
                    <td class="text-center">
                        <div class="badge bg-success"><?php echo $i++ ?></div>
                    </td>
                <?php } ?>
                <td class="card-title"><?php echo $row['NOMBRE_OPERADOR'] ?></td>
                <td><?php echo "[" . $row['PLACAS'] . '] ' . $row['UNIDAD'] ?></td>
                <td><?php echo $row['FECHA_LLEGADA'] ?></td>
                <td><?php echo $row['HORA_LLEGADA'] ?></td>
                <td><?php echo $row['COMENTARIOS'] ?></td>
            </tr>
        <?php } ?>

    </tbody>
</table>
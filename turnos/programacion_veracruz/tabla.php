<?php
require_once('../../mysql/conexion.php');
$cn = conectar();
$sqlSelect = "SELECT ID_TURNO, ID_OPERADOR, NOMBRE_OPERADOR, UNIDADES.PLACAS, UNIDAD, FECHA_LLEGADA, HORA_LLEGADA, COMENTARIOS, FH_ENTRADA, FH_SALIDA FROM TURNOS_VERACRUZ LEFT JOIN OPERADORES ON TURNOS_VERACRUZ.ID_OPERADOR = OPERADORES.ID LEFT JOIN UNIDADES ON TURNOS_VERACRUZ.PLACAS = UNIDADES.PLACAS ORDER BY ID_TURNO ASC LIMIT 6";
$resultSet = $cn->query($sqlSelect);
?>
<table class="table table-sm">
    <thead>
        <tr>
            <th>TURNO</th>
            <th>UNIDAD</th>
            <th>OPERADOR</th>
            <th>ENTRADA AL SITEMA</th>
            <th>SALIDA DEL SISTEMA</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        while ($row = $resultSet->fetch_assoc()) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['UNIDAD'] . ' ' . $row['PLACAS']; ?></td>
                <td><?php echo $row['NOMBRE_OPERADOR']; ?></td>
                <td><?php echo $row['FH_ENTRADA']; ?></td>
                <td><?php echo $row['FH_SALIDA']; ?></td>
            </tr>
        <?php  } ?>
    </tbody>
</table>
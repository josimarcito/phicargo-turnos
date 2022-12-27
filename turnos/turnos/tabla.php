<?php
require_once('../../mysql/conexion.php');

$cn = conectar();
$Date = date('Y-m-d');
$sqlSelect = "SELECT ID_TURNO, TURNO, ID_OPERADOR, NOMBRE_OPERADOR, UNIDADES.PLACAS, UNIDAD, FECHA_LLEGADA, HORA_LLEGADA, COMENTARIOS FROM TURNOS_VERACRUZ LEFT JOIN OPERADORES ON TURNOS_VERACRUZ.ID_OPERADOR = OPERADORES.ID LEFT JOIN UNIDADES ON TURNOS_VERACRUZ.PLACAS = UNIDADES.PLACAS ORDER BY ID_TURNO ASC";
$resultSet = $cn->query($sqlSelect); ?>
<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th></th>
            <th>TURNO</th>
            <th>OPERADOR</th>
            <th>ECO</th>
            <th>FECHA LLEGADA</th>
            <th>HORA LLEGADA</th>
            <th>COMENTARIOS</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        while ($row = $resultSet->fetch_assoc()) {
            $userData['Turnos_Veracruz'][] = $row; ?>
            <tr class="cursor-pointer" onclick="getDatos(
        '<?php echo $row['ID_TURNO']; ?>',
        '<?php echo $row['TURNO']; ?>',
        '<?php echo $row['ID_OPERADOR']; ?>',
        '<?php echo $row['PLACAS']; ?>',
        '<?php echo $row['FECHA_LLEGADA']; ?>',
        '<?php echo $row['HORA_LLEGADA']; ?>',
        '<?php echo $row['COMENTARIOS']; ?>')">
                <td><img src="../../img/usuario.png" width="28" height="28" class="rounded-circle me-2" alt="Avatar"></td>
                <td class="text-center">
                    <div class="badge bg-success"><?php echo $row['TURNO'] ?></div>
                </td>
                <td class="card-title"><?php echo $row['NOMBRE_OPERADOR'] ?></td>
                <td><?php echo "[" . $row['PLACAS'] . '] ' . $row['UNIDAD'] ?></td>
                <td><?php echo $row['FECHA_LLEGADA'] ?></td>
                <td><?php echo $row['HORA_LLEGADA'] ?></td>
                <td><?php echo $row['COMENTARIOS'] ?></td>
            </tr>
        <?php }

        if (isset($userData)) {
            $json = json_encode($userData);
            $bytes = file_put_contents("TURNOS_VERACRUZ.json", $json);
        } ?>

    </tbody>
</table>


<script>
    function getDatos(id_turno, turno, id_operador, id_unidad, fecha, hora, comentarios) {
        $("#modal_editar_turno").modal('toggle');
        $('#idturnoup').val(id_turno).change();
        $('#turnoup').val(turno).change();
        $('#unidadup').val(id_unidad).change();
        $('#operadorup').val(id_operador).change();
        $('#fechaup').val(fecha).change();
        $('#horaup').val(hora).change();
        $('#comentariosup').val(comentarios).change();

        unidadup.disabled = true;
        operadorup.disabled = true;
        fechaup.disabled = true;
        horaup.disabled = true;
        comentariosup.disabled = true;
        $('#BtnGuardar').hide();
        $('#BtnEditar').show();
    }
</script>
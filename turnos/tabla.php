<?php
require_once('../mysql/conexion.php');

$cn = conectar();
$sqlSelect = "SELECT ID_TURNO, TURNO, ID_OPERADOR, TURNOS.ID_UNIDAD, ECO, NOMBRE_OPERADOR, FECHA_LLEGADA, HORA_LLEGADA, COMENTARIOS FROM TURNOS LEFT JOIN OPERADORES ON TURNOS.ID_OPERADOR = OPERADORES.ID INNER JOIN UNIDADES ON TURNOS.ID_UNIDAD = UNIDADES.ID_UNIDAD  WHERE FECHA_LLEGADA BETWEEN '2022-12-02' AND '2022-12-02' AND HORA_LLEGADA BETWEEN '09:00' AND '21:00' ORDER BY HORA_LLEGADA ASC";
$resultSet = $cn->query($sqlSelect); ?>
<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th></th>
            <th>TURNO</th>
            <th>ECO</th>
            <th>OPERADOR</th>
            <th>FECHA LLEGADA</th>
            <th>HORA LLEGADA</th>
            <th>COMENTARIOS</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        while ($row = $resultSet->fetch_assoc()) {
            $userData['Turnos_Veracruz'][] = $row; ?>
            <tr>
                <td>
                    <img src="../img/usuario.png" width="28" height="28" class="rounded-circle me-2" alt="Avatar">
                </td>
                <?php
                if($row['COMENTARIOS']=='SE VA A LA COLA'){?>
                    <td class="text-center"><span class="badge bg-danger"><?php echo 'N/A' ?></span></td>
                <?php }else{ ?>
                    <td class="text-center"><div class="badge bg-success"><?php echo $i++ ?></div></td>
                <?php }?>            
                <td><?php echo $row['ECO'] ?></td>
                <td class="card-title"><?php echo $row['NOMBRE_OPERADOR'] ?></td>
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
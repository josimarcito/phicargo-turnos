<?php
require_once('../../mysql/conexion.php');

function imprimirTiempo($fecha)
{
    $start_date = new DateTime($fecha);
    $since_start = $start_date->diff(new DateTime(date("Y-m-d") . " " . date("H:i:s")));
    echo "Hace ";
    if ($since_start->y == 0) {
        if ($since_start->m == 0) {
            if ($since_start->d == 0) {
                if ($since_start->h == 0) {
                    if ($since_start->i == 0) {
                        if ($since_start->s == 0) {
                            echo $since_start->s . ' segundos';
                        } else {
                            if ($since_start->s == 1) {
                                echo $since_start->s . ' segundo';
                            } else {
                                echo $since_start->s . ' segundos';
                            }
                        }
                    } else {
                        if ($since_start->i == 1) {
                            echo $since_start->i . ' minuto';
                        } else {
                            echo $since_start->i . ' minutos';
                        }
                    }
                } else {
                    if ($since_start->h == 1) {
                        echo $since_start->h . ' hora';
                    } else {
                        echo $since_start->h . ' horas';
                    }
                }
            } else {
                if ($since_start->d == 1) {
                    echo $since_start->d . ' día';
                } else {
                    echo $since_start->d . ' días';
                }
            }
        } else {
            if ($since_start->m == 1) {
                echo $since_start->m . ' mes';
            } else {
                echo $since_start->m . ' meses';
            }
        }
    } else {
        if ($since_start->y == 1) {
            echo $since_start->y . ' año';
        } else {
            echo $since_start->y . ' años';
        }
    }
}

$cn = conectar();
$sqlSelect = "SELECT UNIDAD, UNIDADES.PLACAS, BASE, ESTADO, LATITUD, LONGITUD, REFERENCIA, VELOCIDAD, FECHA_HORA FROM UNIDADES INNER JOIN UBICACIONES ON UBICACIONES.PLACAS = UNIDADES.PLACAS ORDER BY FECHA_HORA DESC";
$resultSet = $cn->query($sqlSelect); ?>
<table class="table table-striped table-hover table-responsive text-center table-sm" id="MyTable2">
    <thead>
        <tr>
            <th class="text-center">Placas</th>
            <th class="text-center">Unidad</th>
            <th class="text-center">Base</th>
            <th class="text-center">Coordenadas</th>
            <th class="text-center">Referencia</th>
            <th class="text-center">Velocidad</th>
            <th class="text-center">Fecha y hora</th>
            <th class="text-center">Ultima actualización</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        while ($row = $resultSet->fetch_assoc()) { ?>
            <tr class="cursor-pointer" onclick="">
                <td><?php echo $row['PLACAS'] ?></td>
                <td>
                    <div class="badge bg-primary"><?php echo $row['UNIDAD'] ?></div>
                </td>

                <?php if ($row['BASE'] == 'VERACRUZ') { ?>
                    <td><span class="badge bg-success"><?php echo 'Veracruz' ?></span></td>
                <?php } else if ($row['BASE'] == 'MANZANILLO') { ?>
                    <td>
                        <div class="badge bg-warning"><?php echo 'Manzanillo' ?></div>
                    </td>
                <?php } else { ?>
                    <td>
                        <div class=""><?php echo 'Desconocido' ?></div>
                    </td>
                <?php } ?>

                <td><?php echo $row['LATITUD'] . ',' . $row['LONGITUD'] ?></td>
                <td><?php echo $row['REFERENCIA'] ?></td>
                <td><?php echo $row['VELOCIDAD'] ?></td>
                <td><?php echo $row['FECHA_HORA'] ?></td>
                <td><?php echo ImprimirTiempo($row['FECHA_HORA']) ?></td>

            </tr>
        <?php } ?>

    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#MyTable2').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": " Primero ",
                    "last": " Ultimo ",
                    "next": " Proximo ",
                    "previous": " Anterior  "
                }
            },
            "lengthMenu": [
                [20, 25, 30, 40, 50, -1],
                [20, 25, 30, 40, 50, "All"]
            ]
        })
    });
</script>
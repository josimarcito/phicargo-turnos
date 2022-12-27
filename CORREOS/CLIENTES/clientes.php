<?php

require_once "../../mysql/conexion.php";

$cn = conectar();
$sqlSelect  =  "SELECT ID, NOMBRE FROM CLIENTES ORDER BY NOMBRE ASC";
$resultSet  = $cn->query($sqlSelect);
?>

<table class="table table-striped table-hover" id="MyTable2">
    <thead>
        <tr>
            <th style="width:40%;">Nombre del cliente</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $resultSet->fetch_assoc()) { ?>
            <tr onclick="window.location.href='correos-clientes.php?id=<?php echo $row['ID'] ?>&nombre=<?php echo $row['NOMBRE']; ?>'">
                <td><?php echo $row['NOMBRE']; ?></td>
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
                [ 20, 25, 30, 40, 50, -1],
                [ 20, 25, 30, 40, 50, "All"]
            ]
        })
    });
</script>
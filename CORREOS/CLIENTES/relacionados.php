<?php

require_once "../../mysql/conexion.php";
$id = $_POST['id'];
$cn = conectar();
$sqlSelect  =  "SELECT ID_CORREO, ID_CLIENTE, DIRECCION, TIPO FROM CLIENTES_CORREOS WHERE ID_CLIENTE = $id ORDER BY DIRECCION ASC";
$resultSet  = $cn->query($sqlSelect);
?>
<table class="table table-striped table-sm" style="width:100%" id="MyTable">
    <thead>
        <tr>
            <th>Correo electrónico</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $resultSet->fetch_assoc()) { ?>
            <tr onclick="editar('<?php echo $row['ID_CORREO'] ?>','<?php echo $row['DIRECCION'] ?>','<?php echo $row['TIPO'] ?>')">
                <td class='card-title'><?php echo $row['DIRECCION']; ?></td>
                <td class="text-center">
                    <?php if ($row['TIPO'] == 'Destinatario') { ?>
                        <div class="badge bg-success"><?php echo $row['TIPO'] ?></div>
                    <?php } else { ?>
                        <div class="badge bg-warning"><?php echo $row['TIPO'] ?></div>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#MyTable').DataTable({            
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
                [15, 20, 25, 30, 40, 50, -1],
                [15, 20, 25, 30, 40, 50, "All"]
            ]
        });
    });
</script>
</script>
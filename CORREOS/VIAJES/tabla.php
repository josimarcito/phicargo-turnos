<?php
require_once('../../mysql/conexion.php');
$cn = conectar();

if (file_exists('plandeviajes.json')) {
	$filename = 'plandeviajes.json';
	$data = file_get_contents($filename);
	$users = json_decode($data);

	$message = "<h3 class='text-success'>JSON file data</h3>";
} else {
	$message = "<h3 class='text-danger'>JSON file Not found</h3>";
}
?>

<table class="table table-striped table-hover table-responsive table-sm" id="MyTable2">
	<thead>
		<tr>
			<th>Estado</th>
			<th>ID</th>
			<th>Fecha</th>
			<th>Operador</th>
			<th>Vehiculo</th>
			<th>Ruta</th>
			<th>Cliente</th>
			<th>Sucursal</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user) { ?>
			<tr onclick="window.location.href='../detalle/index.php?id=<?= $user->id; ?>&referencia=<?= $user->name; ?>&operador=<?= $user->employee_id[1]; ?>&placas=<?= $user->vehicle_id[1]; ?>&ruta=<?= $user->route_id[1]; ?>&id_cliente=<?= $user->partner_id[0]; ?>&cliente=<?= $user->partner_id[1]; ?>'">

				<?php
				$sqlSelect = "SELECT ESTADO FROM VIAJES WHERE ID = '$user->id'";
				$resultSet = $cn->query($sqlSelect);
				$row = $resultSet->fetch_assoc();


				if (empty($row['ESTADO'])) { ?>
					<td class="text-center"><span class="badge bg-success"><?php echo 'Disponible' ?></span></td>
					<?php } else {
					if ($row['ESTADO'] == 'Activo') { ?>
						<td class="text-center"><span class="badge bg-warning"><?php echo 'Activo' ?></span></td>
					<?php } else if ($row['ESTADO'] == 'Finalizado') { ?>
						<td class="text-center"><span class="badge bg-primary"><?php echo 'Finalizado' ?></span></td>
				<?php }
				} ?>
				<td> <?php echo $user->name; ?> </td>
				<td> <?php echo $user->date; ?> </td>
				<td> <?php echo $user->employee_id[1]; ?> </td>
				<td> <?php echo $user->vehicle_id[1]; ?> </td>
				<td> <?php echo $user->route_id[1]; ?> </td>
				<td> <?php echo $user->partner_id[1]; ?> </td>
				<td> <?php echo $user->store_id[1]; ?> </td>
			<?php } ?>
	</tbody>

</table>

<script>
	function getDatos(id, referencia, placas, id_cliente) {
		$("#modal_detalles").modal('toggle');
		$('#id').val(id).change();
		$('#referencia').val(referencia).change();
		$('#placas').val(placas).change();
		$('#id_cliente').val(id_cliente).change();

		datos = $("#FormIngresarViaje").serialize();

		$.ajax({
			type: "POST",
			data: datos,
			url: "ingresar/validar.php",
			success: function(respuesta) {
				if (respuesta == 1) {
					$('#Finalizar').show();
					$('#Iniciar').hide();
				} else {
					$('#Finalizar').hide();
					$('#Iniciar').show();
				}
			}
		});
	}
</script>

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
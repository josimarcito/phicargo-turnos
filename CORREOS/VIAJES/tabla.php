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

<table class="table table-striped table-hover table-responsive">
	<tbody>
		<tr>
			<th>ID</th>
			<th>Fecha</th>
			<th>Operador</th>
			<th>Vehiculo</th>
			<th>Ruta</th>
			<th>Cliente</th>
			<th>Sucursal</th>
			<th>Estados de correos</th>

		</tr>
		<?php foreach ($users as $user) { ?>
			<tr onclick="getDatos(
        '<?= $user->id; ?>',
        '<?= $user->name; ?>',
        '<?= $user->vehicle_id[1]; ?>',
        '<?= $user->partner_id[0]; ?>')">
				<td> <?= $user->name; ?> </td>
				<td> <?= $user->date; ?> </td>
				<td> <?= $user->employee_id[1]; ?> </td>
				<td> <?= $user->vehicle_id[1]; ?> </td>
				<td> <?= $user->route_id[1]; ?> </td>
				<td> <?= $user->partner_id[1]; ?> </td>
				<td> <?= $user->store_id[1]; ?> </td>

				<?php $sqlSelect = "SELECT * FROM VIAJES WHERE ID = '$user->id'";
				$resultSet = $cn->query($sqlSelect);

				if ($resultSet->num_rows == 1) { ?>
					<td class="text-center"><span class="badge bg-success"><?php echo 'Activo' ?></span></td>
				<?php } else { ?>
					<td class="text-center"><span class="badge bg-danger"><?php echo 'Inactivo' ?></span></td>
				<?php } ?>
			</tr>
		<?php }
		?>
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
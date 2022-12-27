<?php
require_once('../../mysql/conexion.php');
$cn = conectar();

$num_viajes = 0;
$url = "http://belchez-pruebas.argil.mx";
$db = "20220826_BELCHEZ_MASTER_12";
$username = "admin";
$password = "Phic4rg022#";

require_once('../../ripcord-master/ripcord.php');
$models = ripcord::client("$url/xmlrpc/2/common");

$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

if (!empty($uid)) {
} else {
}

$records = $models->execute_kw(
    $db,
    $uid,
    $password,
    'tms.waybill',
    'search_read',
    array(array(array('expected_date_delivery', '=', '2022/08/31'), array('store_id', '=', 1), array('x_operador_bel', '=', false))),
    array(
        'fields' => array('name', 'store_id', 'x_ejecutivo_viaje_bel', 'partner_id', 'x_ruta_bel', 'x_tipo_bel', 'x_tipo2_bel', 'x_modo_bel', 'x_medida_bel', 'x_operador_bel_id', 'x_operador_bel', 'date_start_real', 'x_custodia_bel'),
        'limit' => 16
    )
);

$json = json_encode($records);
$users = json_decode($json);
?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Programación</strong> de Viajes</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body m-sm-3 m-md-5">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="text-muted">Fecha de programación:</div>
                                <strong><?php echo date('M d, Y') ?></strong>
                            </div>
                        </div>

                        <hr class="my-4" />

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Referencia</th>
                                    <th>Ejecutiv@</th>
                                    <th>Ruta Programada</th>
                                    <th class="text-end">Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) {
                                    $num_viajes++; ?>
                                    <tr>
                                        <td><?php echo $user->id; ?></td>
                                        <td><?php echo $user->x_ejecutivo_viaje_bel; ?></td>
                                        <td><?php echo $user->x_ruta_bel; ?></td>
                                        <td class="text-end"><?php if ($user->x_tipo_bel == 'single') {
                                                                    echo 'SENCILLO';
                                                                } else {
                                                                    echo 'FULL';
                                                                } ?></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted">Numero de Viajes.</div>
                                <strong><?php echo $num_viajes ?></strong>
                            </div>
                            <div class="col-md-6 text-md-end">

                            </div>
                        </div>

                        <hr class="my-4" />


                        <div class="text-center">
                            <p class="text-sm">
                                <strong>Extra note:</strong>
                                Please send all items at the same time to the shipping address.
                                Thanks in advance.
                            </p>

                            <a href="#" class="btn btn-success">
                                Programar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body m-sm-3 m-md-5">

                        <form id='asignacion-horarios22' class="row g-3 pb-2">
                            <div class="col-md-3">
                                <label for="validationDefault03" class="form-label">Inicio Programado:</label>
                                <input type="time" class="form-control" id="hora" name='hora' required>
                            </div>
                            <div class="col-md-3">
                                <label for="validationDefault04" class="form-label">Duración:</label>
                                <select class="form-select" id="duracion" name='duracion' required>
                                    <option value="5" selected>5 minutos</option>
                                    <option value="10">10 minutos</option>
                                    <option value="15">15 minutos</option>
                                    <option value="20">20 minutos</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="validationDefault05" class="form-label">.</label>
                                <button id='asig' type='button' class="btn btn-primary form-control">Asignar horarios</button>
                            </div>
                            <div class="col-md-3">
                                <label for="validationDefault05" class="form-label">.</label>
                                <button id='asig' type='button' class="btn btn-success form-control">Confirmar</button>
                            </div>
                        </form>

                        <div id='horarios'>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
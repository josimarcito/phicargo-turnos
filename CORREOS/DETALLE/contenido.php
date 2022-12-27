<?php
require_once('../../mysql/conexion.php');

$id            = $_GET['id'];
$referencia    = $_GET['referencia'];
$operador      = $_GET['operador'];
$unidad        = $_GET['placas'];
$id_cliente    = $_GET['id_cliente'];
$cliente       = $_GET['cliente'];
$ruta          = $_GET['ruta'];

$separar = (explode(" ", $unidad));
$nombre = $separar[0];
$placas = $separar[1];
$result = str_replace(array("[", "]"), '', $placas);

$cn = conectar();
$sqlSelect = "SELECT DIRECCION FROM CLIENTES_CORREOS WHERE ID_CLIENTE = $id_cliente AND TIPO = 'Destinatario'" ;
$resultSet = $cn->query($sqlSelect);
$sqlSelect = "SELECT DIRECCION FROM CLIENTES_CORREOS WHERE ID_CLIENTE = $id_cliente AND TIPO = 'CC'" ;
$resultSet2 = $cn->query($sqlSelect);

?>
<main class="content">
    <div class="container-fluid p-0">
        <form id='FormViaje'>

            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Viaje</strong> <?php echo $referencia ?></strong></h3>
                </div>

                <div class="col-auto ms-auto text-end mt-n1">
                    <a id="enviar_status" class="btn btn-primary"><span data-feather="send" class="feather-sm me-1"></span> Enviar Status</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Detalles del Viaje</h5>
                        </div>
                        <div class="card-body text-center">
                            <h1 class="card-title mb-2"><?php echo $referencia ?></h1>
                            <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id ?>">
                            <input class="form-control" type="hidden" id="referencia" name="referencia" value="'<?php echo $referencia ?>'">
                            <input class="form-control" type="hidden" id="placas" name="placas" value="<?php echo $result ?>">

                            <div>
                                <button class="btn btn-primary btn-sm" id='Finalizado' disabled> <span data-feather="check" class="feather-sm me-1"></span> Finalizado</button>
                                <a class="btn btn-danger btn-sm" id='Finalizar_modal' onclick="getDatosF('<?php echo $id ?>')"> <span data-feather="x-circle" class="feather-sm me-1"></span> Finalizar</a>
                                <a class="btn btn-success btn-sm" id='Iniciar_modal' onclick="getDatos('<?php echo $id ?>','<?php echo $referencia ?>','<?php echo $result ?>','<?php echo $id_cliente ?>')">Iniciar</a>
                            </div>

                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">Especificaciones</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span><strong>CLIENTE: </strong><?php echo $cliente ?></li>
                                <li class="mb-1"><span data-feather="user" class="feather-sm me-1"></span><strong>OPERADOR:</strong><?php echo $operador ?></li>
                                <li class="mb-1"><span data-feather="truck" class="feather-sm me-1"></span><strong>UNIDAD: </strong><?php echo $unidad ?></li>
                                <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span><strong>RUTA: </strong><?php echo $ruta ?></li>
                            </ul>
                        </div>
                      
                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">Destinatarios</h5>
                            <ul class="list-unstyled mb-0">
                                <?php while ($row = $resultSet->fetch_assoc()) { ?>
                                    <li class="mb-1"><?php echo $row['DIRECCION']?></li>
                                <?php } ?>

                            </ul>
                        </div>

                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">CC</h5>
                            <ul class="list-unstyled mb-0">
                                <?php while ($row = $resultSet2->fetch_assoc()) { ?>
                                    <li class="mb-1"><?php echo $row['DIRECCION']?></li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
        </form>
        <div class="col-md-8 col-xl-9">
            <div class="card">
                <div class="card-header">

                    <h5 class="card-title mb-0">Actividad</h5>
                </div>
                <div class="card-body h-100">
                    <div id='contenido'></div>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>

<script>
    function getDatos(id, referencia, placas, id_cliente) {
        $("#modal_iniciar").modal('toggle');
        $('#id').val(id).change();
        $('#referencia').val(referencia).change();
        $('#placas').val(placas).change();
        $('#id_cliente').val(id_cliente).change();
    }

    function getDatosF(id) {
        $("#modal_finalizar").modal('toggle');
        $('#idelete').val(id).change();
    }
</script>
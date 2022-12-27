<?php
$titulo = 'Cliente';
require_once('../../includes/header.php');
require_once('../../includes/head.php');
require_once('../../includes/nav.php');
require_once('../../mysql/conexion.php');
require_once('modal-ingresar.php');
require_once('modal-editar.php');
require_once('modal-eliminar.php');

$id     = $_GET['id'];
$nombre = $_GET['nombre'];

?>
<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Clientes</strong> Dashboard</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a id='modal-ingresar' onclick="getDatos(<?php echo $id ?>)" class="btn btn-primary">Nuevo correo</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0"></h5>
                    </div>
                    <form id="info">
                        <div class="card-body text-center">
                            <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $id ?>">
                            <img src="../../img/usuario.png" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                            <h5 class="card-title mb-0"><?php echo $nombre ?></h5>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Correos Electronicos relacionados al cliente</h5>
                    </div>
                    <div class="card-body h-100">
                        <div id='correos'></div>
                    </div>
                </div>
            </div>

        </div>
</main>

<script>
    function getDatos(id) {
        $("#modal_ingresar_correo").modal('toggle');
        $("#id").val(id).change();
    }

    function editar(id_cliente, direccion, tipo) {
        $("#modal_editar_correo").modal('toggle');
        $("#idcorreoup").val(id_cliente).change();
        $("#correoup").val(direccion).change();
        $("#tipoup").val(tipo).change();
    }
</script>

<?php
require_once('../../includes/footer.php');
require_once('funciones.php');

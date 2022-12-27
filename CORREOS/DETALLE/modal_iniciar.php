<?php
require_once('../../mysql/conexion.php');
?>

<div class="modal fade" id="modal_iniciar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Envio de status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="modal-body">¿Realmente quieres iniciar el envio de correos automaticos?</div>
                <form id="FormIngresarViaje">
                    <input class="form-control" type="hidden" id="id" name="id">
                    <input class="form-control" type="hidden" id="referencia" name="referencia">
                    <input class="form-control" type="hidden" id="placas" name="placas">
                    <input class="form-control" type="hidden" id="id_cliente" name="id_cliente">
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button id="Iniciar_correos" type="button" class="btn btn-primary">Iniciar</button>
            </div>
        </div>
    </div>
</div>
<?php
require_once('../../mysql/conexion.php');
?>

<div class="modal fade" id="modal_finalizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Envio de status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="modal-body">¿Realmente quieres finalizar el envio de correos automaticos?</div>
                <form id="FormFinViaje">
                    <input class="form-control" type="hidden" id="idelete" name="idelete">
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button id="Finalizar_correos" type="button" class="btn btn-danger">Finalizar</button>
            </div>
        </div>
    </div>
</div>
<?php
require_once('../../mysql/conexion.php');
?>

<div class="modal fade" id="modal_eliminar_correo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Eliminar Correo electrónico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="modal-body">
                    <div class="modal-body">¿Realmente quieres eliminar este correo?</div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button id="eliminar_correo" type="button" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>
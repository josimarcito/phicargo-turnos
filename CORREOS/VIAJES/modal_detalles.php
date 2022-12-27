<?php
require_once('../../mysql/conexion.php');
?>

<div class="modal fade" id="modal_detalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Envio de status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="FormIngresarViaje">
                    <input type="text" id="id" name="id"><br><br>
                    <input type="text" id="referencia" name="referencia"><br><br>
                    <input type="text" id="placas" name="placas"><br><br>
                    <input type="text" id="id_cliente" name="id_cliente"><br><br>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button id="Iniciar" type="button" class="btn btn-primary">Iniciar</button>
                <button id="Finalizar" type="button" class="btn btn-danger">Finalizar</button>
            </div>
        </div>
    </div>
</div>
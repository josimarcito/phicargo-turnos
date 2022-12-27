<?php
require_once('../../mysql/conexion.php');
?>

<div class="modal fade" id="modal_ingresar_correo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Ingresar Correo electrónico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="FormIngresarCorreo">
                    <input class="form-control" type="hidden" id="id" name="id">
                    <div class="form-group row p-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa una direccion de Correo electrónico">
                        </div>
                    </div>
                    <div class="form-group row p-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tipo</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="tipo" name="tipo">
                                <option value="Destinatario">Destinatario</option>
                                <option value="CC">CC</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button id="ingresar_correo" type="button" class="btn btn-danger">Validar e ingresar</button>
            </div>
        </div>
    </div>
</div>
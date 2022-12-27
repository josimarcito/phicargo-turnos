<?php
require_once('../../mysql/conexion.php');
?>

<div class="modal fade" id="modal_editar_correo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Editar Correo electrónico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="FormEditarCorreo">
                    <input class="form-control" type="hidden" id="idcorreoup" name="idcorreoup">
                    <div class="form-group row p-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correoup" name="correoup" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row p-1">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Tipo</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="tipoup" name="tipoup">
                                <option value="Destinatario">Destinatario</option>
                                <option value="CC">CC</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button id="editar_correo" type="button" class="btn btn-primary">Guardar</button>
                <button id="mostrar_modal_eliminar" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>
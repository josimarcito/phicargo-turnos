<?php
require_once('../../mysql/conexion.php');
$mysqli = conectar();
$query_op = "SELECT ID, NOMBRE_OPERADOR FROM OPERADORES ORDER BY NOMBRE_OPERADOR ASC";
$query_eco = "SELECT PLACAS, UNIDAD FROM UNIDADES ORDER BY UNIDAD ASC";

$resultado_op = $mysqli->query($query_op);
$resultado_eco = $mysqli->query($query_eco);

?>

<div class="modal fade" id="modal_editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos del turno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="FormEditar">
                    <input class="form-control" type="hidden" name="idturnoup" id="idturnoup" rows="3"></input>

                    <div class="row mb-4">
                        <label for="" class="col-sm-3 col-form-label form-label">Unidad</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="unidadup" id="unidadup" placeholder="" aria-label="">
                                <option value="0"> Seleccionar Unidad </option>
                                <?php while ($row = $resultado_eco->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['PLACAS']; ?>"><?php echo $row['UNIDAD']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-sm-3 col-form-label form-label">Operador</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="operadorup" id="operadorup" placeholder="" aria-label="">
                                <option value="0"> Seleccionar Operador </option>
                                <?php while ($row = $resultado_op->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['NOMBRE_OPERADOR']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="" class="col-sm-12 col-form-label form-label">Fecha llegada</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="fechaup" id="fechaup" placeholder="" aria-label="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mb-4">
                                <label for="" class="col-sm-12 col-form-label form-label">Hora llegada</label>
                                <div class="col-sm-12">
                                    <input type="time" class="form-control" name="horaup" id="horaup" step="2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 form-group">
                            <label for="col-sm-12 col-form-label form-label">Comentarios</label>
                            <textarea class="form-control" name="comentariosup" id="comentariosup" rows="3"></textarea>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button id="BtnEnviarOpCola" type="button" class="btn btn-danger">Enviar a la cola</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ConfirmarEnvioCola" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Enviar operador a la cola</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="modal-body">¿Realmente quieres enviar a este operador a la cola?</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" id="BtnConfirmarEnviarOpCola">Enviar a la cola</button>
            </div>
        </div>
    </div>
</div>
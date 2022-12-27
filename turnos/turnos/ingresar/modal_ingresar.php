<?php
require_once('../../mysql/conexion.php');
$mysqli = conectar();
$query_op = "SELECT ID, NOMBRE_OPERADOR FROM OPERADORES ORDER BY NOMBRE_OPERADOR ASC";
$query_eco = "SELECT PLACAS, UNIDAD FROM UNIDADES ORDER BY UNIDAD ASC";

$resultado_op = $mysqli->query($query_op);
$resultado_eco = $mysqli->query($query_eco);

?>

<div class="modal fade" id="modal_ingresar_turno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresar operador a la cola</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="FormIngresar">
                    <div class="row mb-4">
                        <label for="" class="col-sm-3 col-form-label form-label">Unidad</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="unidad" id="unidad" placeholder="" aria-label="">
                                <option value="0"> Seleccionar Unidad </option>
                                <?php while ($row = $resultado_eco->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['PLACAS']; ?>"><?php echo '['.$row['PLACAS'].'] '.$row['UNIDAD']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-sm-3 col-form-label form-label">Operador</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="operador" id="operador" placeholder="" aria-label="">
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
                                <input type="date" class="form-control" name="fecha" id="fecha" placeholder="" aria-label="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mb-4">
                                <label for="" class="col-sm-12 col-form-label form-label">Hora llegada</label>
                                <div class="col-sm-12">
                                    <input type="time" class="form-control" name="hora" id="hora" step="2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 form-group">
                                <label for="col-sm-12 col-form-label form-label">Comentarios</label>
                                <textarea class="form-control" name="comentarios" id="comentarios" rows="3"></textarea>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button id="BtnIngresarOpCola" type="button" class="btn btn-primary">Ingresar a la cola</button>
            </div>
        </div>
    </div>
</div>
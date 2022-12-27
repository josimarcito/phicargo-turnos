<script>
    const notyf = new Notyf({
        duration: 6000,
        position: {
            x: 'right',
            y: 'bottom',
        },
        types: [{
                type: 'success',
                background: '#28ac44',
                duration: 6000,
                dismissible: true
            },
            {
                type: 'warning',
                background: 'orange',
                icon: {
                    className: 'material-icons',
                    tagName: 'i',
                    text: 'warning'
                }
            },
            {
                type: 'error',
                background: '#9a0405',
                duration: 6000,
                dismissible: true
            }
        ]
    });

    $(document).ready(function() {

        $("#tabla").load('tabla.php');
        $("#OperadoresEnCola").load('ingresar/Listado.php');

        $('#unidad').select2({
            dropdownParent: $('#modal_ingresar_turno'),
            dropdownAutoWidth: true,
            width: '100%',
        });
        $('#operador').select2({
            dropdownParent: $('#modal_ingresar_turno'),
            dropdownAutoWidth: true,
            width: '100%',

        });

        $('#unidadup').select2({
            dropdownParent: $('#modal_editar_turno'),
            dropdownAutoWidth: true,
            width: '100%',
        });
        $('#operadorup').select2({
            dropdownParent: $('#modal_editar_turno'),
            dropdownAutoWidth: true,
            width: '100%',

        });

        //DESHABILITAR EDICION
        $("#BtnEditar").click(function() {
            unidadup.disabled = false;
            operadorup.disabled = false;
            fechaup.disabled = false;
            horaup.disabled = false;
            comentariosup.disabled = false;
            $('#BtnGuardar').show();
            $('#BtnEditar').hide();
        });
        //

        $("#BtnGuardar").click(function() {
            datos = $("#FormEditar").serialize();
            console.log(datos);
            $.ajax({
                type: "POST",
                data: datos,
                url: "ingresar/editar.php",
                success: function(respuesta) {
                    if (respuesta == 1) {
                        notyf.success('Información modificada correctamente.');
                        $('#unidad').val(0).change();
                        $('#operador').val(0).change();
                        $("#modal_editar_turno").modal('toggle');
                        $("#tabla").load('tabla.php');

                        unidadup.disabled = true;
                        operadorup.disabled = true;
                        fechaup.disabled = true;
                        horaup.disabled = true;
                        comentariosup.disabled = true;
                        $('#BtnGuardar').hide();
                        $('#BtnEditar').show();
                    } else {
                        notyf.error('Existe inconsistencia en la información, favor de revisar.');
                    }
                }
            });
        });

        $("#BtnIngresarOpCola").click(function() {
            datos = $("#FormIngresar").serialize();
            console.log(datos);
            $.ajax({
                type: "POST",
                data: datos,
                url: "ingresar/ingresar.php",
                success: function(respuesta) {
                    if (respuesta == 1) {
                        notyf.success('Operador ingresado correctamente a la cola.');
                        $('#unidad').val(0).change();
                        $('#operador').val(0).change();
                        $("#modal_ingresar_turno").modal('toggle');
                        $("#tabla").load('tabla.php');
                    } else {
                        notyf.error('Existe inconsistencia en la información, favor de revisar.');
                    }
                }
            });
        });


        $("#BtnEnviarOpCola").click(function() {
            $("#ConfirmarEnvioCola").modal('toggle');
            $("#modal_editar_turno").modal('toggle');
        });

        $("#BtnConfirmarEnviarOpCola").click(function() {

            unidadup.disabled = false;
            operadorup.disabled = false;
            fechaup.disabled = false;
            horaup.disabled = false;
            comentariosup.disabled = false;

            datos = $("#FormEditar").serialize();
            console.log(datos);
            $.ajax({
                type: "POST",
                data: datos,
                url: "ingresar/enviar_cola.php",
                success: function(respuesta) {
                    if (respuesta == 1) {
                        $("#OperadoresEnCola").load('ingresar/Listado.php');
                        $("#tabla").load('tabla.php');
                        $("#ConfirmarEnvioCola").modal('toggle');
                        notyf.success('Operador enviado a la cola correctamente.');

                        unidadup.disabled = true;
                        operadorup.disabled = true;
                        fechaup.disabled = true;
                        horaup.disabled = true;
                        comentariosup.disabled = true;
                    } else {
                        notyf.error('Error3d.');
                    }
                }
            });
        });


        $('#unidad').on("change", function() {
            var unidadcomprobar = $('#unidad').val();
            var dataString = 'unidad=' + unidadcomprobar;
            $.ajax({
                type: "GET",
                data: dataString,
                url: "ingresar/validaciones/validar_unidad.php",
                dataType: "JSON",
                success: function(datos) {
                    if (datos.success == 1) {
                        document.getElementById('BtnIngresarOpCola').disabled = true;
                        notyf.error('La unidad ya esta en cola.');
                    } else {
                        document.getElementById('BtnIngresarOpCola').disabled = false;
                    }
                }

            });
        });

        $('#operador').on("change", function() {
            var operadorcomprobar = $('#operador').val();
            var dataString = 'operador=' + operadorcomprobar;
            $.ajax({
                type: "GET",
                data: dataString,
                url: "ingresar/validaciones/validar_operador.php",
                dataType: "JSON",
                success: function(datos) {
                    if (datos.success == 1) {
                        document.getElementById('BtnIngresarOpCola').disabled = true;
                        notyf.error('La operador ya esta en cola.');
                    } else {
                        document.getElementById('BtnIngresarOpCola').disabled = false;
                    }
                }

            });
        });
    });
</script>
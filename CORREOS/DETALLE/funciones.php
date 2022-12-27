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

        datos = $("#FormViaje").serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "correos.php",
            success: function(respuesta) {
                $("#contenido").html(respuesta);
            }
        });

        $.ajax({
            type: "POST",
            data: datos,
            url: "ingresar/validar.php",
            success: function(respuesta) {
                if (respuesta == 1) {
                    $('#enviar_status').hide();
                    $('#Finalizar_modal').hide();
                    $('#Iniciar_modal').hide();
                    $('#Finalizado').show();
                } else if (respuesta == 2) {
                    $('#enviar_status').show();
                    $('#Finalizar_modal').show();
                    $('#Iniciar_modal').hide();
                    $('#Finalizado').hide();
                } else {
                    $('#enviar_status').hide();
                    $('#Finalizar_modal').hide();
                    $('#Iniciar_modal').show();
                    $('#Finalizado').hide();
                }
            }
        });

    });

    $("#Iniciar_correos").click(function() {
        datos = $("#FormIngresarViaje").serialize();
        console.log(datos);
        $.ajax({
            type: "POST",
            data: datos,
            url: "ingresar/ingresar_viaje.php",
            success: function(respuesta) {
                if (respuesta == 1) {
                    $("#modal_iniciar").modal('toggle');
                    notyf.success('Correos automaticos activados.');
                    $('#enviar_status').show();
                    $('#Finalizar_modal').show();
                    $('#Iniciar_modal').hide();
                } else {
                    notyf.error('Error.');
                }
            }
        });
    });

    $("#Finalizar_correos").click(function() {
        datos = $("#FormFinViaje").serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "finalizar/finalizar.php",
            success: function(respuesta) {
                if (respuesta == 1) {
                    $("#modal_finalizar").modal('toggle');
                    $('#Finalizar_modal').hide();
                    $('#enviar_status').hide();
                    $('#Finalizado').show();

                    notyf.success('Correos finalizados.');
                } else {
                    notyf.error('Error.');
                }
            }
        });
    });


    $("#enviar_status").click(function() {
        datos = $("#FormViaje").serialize();
        $.ajax({
            type: "POST",
            data: datos,
            url: "../algoritmos/envio_manual.php",
            success: function(respuesta) {
                if (respuesta == 1) {
                    datos = $("#FormViaje").serialize();
                    $.ajax({
                        type: "POST",
                        data: datos,
                        url: "correos.php",
                        success: function(respuesta) {
                            $("#contenido").html(respuesta);
                        }
                    });
                } else {
                    datos = $("#FormViaje").serialize();
                    $.ajax({
                        type: "POST",
                        data: datos,
                        url: "correos.php",
                        success: function(respuesta) {
                            $("#contenido").html(respuesta);
                        }
                    });
                }
            }
        });
    });
</script>
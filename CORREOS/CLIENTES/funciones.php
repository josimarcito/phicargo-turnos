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
        $("#clientes").load('clientes.php');

        recargar();

        function recargar() {
            datos = $("#info").serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "relacionados.php",
                success: function(respuesta) {
                    if (respuesta != 0) {
                        $("#correos").html(respuesta);
                    } else {}

                }
            });
        }

        $("#ingresar_correo").click(function() {
            datos = $("#FormIngresarCorreo").serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "ingresar.php",
                success: function(respuesta) {
                    if (respuesta == 1) {
                        $("#modal_ingresar_correo").modal('toggle');
                        $("#correo").val('');
                        $("#tipo").val('Destinatario');

                        recargar();
                        notyf.success('Correo ingresado correctamente');
                    } else {
                        notyf.error(respuesta);
                    }
                }
            });
        });

        $("#editar_correo").click(function() {
            datos = $("#FormEditarCorreo").serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "editar.php",
                success: function(respuesta) {
                    if (respuesta = 1) {
                        $("#modal_editar_correo").modal('toggle');
                        recargar();
                        notyf.success('Correo editado correctamente');
                    } else {
                        notyf.error('Error.');
                    }
                }
            });
        });

        $("#mostrar_modal_eliminar").click(function() {
            $("#modal_editar_correo").modal('toggle');
            $("#modal_eliminar_correo").modal('toggle');
        });

        $('#correo').on("keyup", function() {
            $.ajax({
                type: "GET",
                data: {
                    id: $('#id').val(),
                    correo: $('#correo').val()
                },
                url: "comprobarcorreo.php",
                dataType: "JSON",
                success: function(datos) {
                    if (datos.success == 1) {
                        document.getElementById('ingresar_correo').disabled = true;
                        notyf.error('Correo ya registrado.');
                    } else {
                        document.getElementById('ingresar_correo').disabled = false;
                    }
                }
            });
        });

        $('#correoup').on("keyup", function() {
            $.ajax({
                type: "GET",
                data: {
                    id: $('#idcorreoup').val(),
                    correo: $('#correoup').val()
                },
                url: "comprobarcorreo.php",
                dataType: "JSON",
                success: function(datos) {
                    if (datos.success == 1) {
                        document.getElementById('ingresar_correo').disabled = true;
                        notyf.error('Correo ya registrado.');
                    } else {
                        document.getElementById('ingresar_correo').disabled = false;
                    }
                }
            });
        });

        $("#eliminar_correo").click(function() {
            datos = $("#FormEditarCorreo").serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "eliminar.php",
                success: function(respuesta) {
                    if (respuesta = 1) {
                        $("#modal_eliminar_correo").modal('toggle');
                        recargar();
                        notyf.success('Correo eliminado correctamente');
                    } else {
                        notyf.error('Error.');
                    }
                }
            });
        });


    });
</script>
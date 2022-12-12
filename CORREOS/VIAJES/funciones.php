<script>
    $(document).ready(function() {

        $("#tabla").load('tabla.php');

    });

    $("#Iniciar").click(function() {
        datos = $("#FormIngresarViaje").serialize();
        console.log(datos);
        $.ajax({
            type: "POST",
            data: datos,
            url: "ingresar/ingresar_viaje.php",
            success: function(respuesta) {
                if (respuesta == 1) {
                    $("#tabla").load('tabla.php');
                    $("#modal_detalles").modal('toggle');
                    notyf.success('Status automatizados activados.');
                } else {
                    notyf.error('Error.');
                }
            }
        });
    });

    $("#Finalizar").click(function() {
        datos = $("#FormIngresarViaje").serialize();
        console.log(datos);
        $.ajax({
            type: "POST",
            data: datos,
            url: "finalizar/finalizar.php",
            success: function(respuesta) {
                if (respuesta == 1) {
                    $("#tabla").load('tabla.php');
                    $("#modal_detalles").modal('toggle');
                    notyf.success('Status finalizados correctamente.');
                } else {
                    notyf.error('Error.');
                }
            }
        });
    });
</script>
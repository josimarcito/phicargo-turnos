<script>
    $(document).ready(function() {
        $("#horarios").load('tabla.php');
    });

    $("#asig").click(function() {
        datos = $("#asignacion-horarios22").serialize();
        console.log(datos);
        $.ajax({
            type: "POST",
            data: datos,
            url: "asignar_horarios.php",
            success: function(respuesta) {
                if (respuesta != 1) {
                    $("#horarios").html(respuesta);
                } else {
                    notyf.error('Error2.');
                }
            }
        });
    });
</script>
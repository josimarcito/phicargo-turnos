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

        $("#CorreoInformacion").click(function() {
            datos = $("#FormEditarCorreo").serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "guardar-ajustes.php",
                success: function(respuesta) {
                    if (respuesta = 1) {
                        notyf.success('');
                    } else {
                        notyf.error('');
                    }
                }
            });
        });

    });
</script>
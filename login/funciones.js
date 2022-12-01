$(document).ready(function() {

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


    $("#IniciarSesion").click(function() {
        datos = $("#InicioSesion").serialize();
        console.log(datos);
        $.ajax({
            type: "POST",
            data: datos,
            url: "validar.php",
            success: function(respuesta) {
                if (respuesta == 1) {
                    notyf.success('Bienvenido :)');
                    window.location = "../turnos/index.php";
                } else {
                    notyf.error('Usuario o contraseña incorrectos.');
                }
            }
        });
    });
});
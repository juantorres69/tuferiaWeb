$(document).ready(function() {

    $('#frmRegistro').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        datos.append('accion', 'registro');
        if ($('#txtPassword').val() == $('#txtCPassword').val()) {
            $('.preloader').css('display', 'block');
            $.ajax({
                url: 'ajax/login.ajax.php',
                type: 'post',
                dataType: 'json',
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('.preloader').css('display', 'none');
                    if (res.ErrorStatus) {
                        swal.fire({
                            title: 'Registro',
                            text: res.Msj,
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    } else {
                        swal.fire({
                            title: 'Registro',
                            text: res.Msj,
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false
                        }).then(() => {
                            location.href = 'home';
                        });
                    }
                }
            });
        } else {
            swal.fire({
                title: 'Registro',
                text: 'Las contraseñas no coinciden.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });

    $('#frmLogin').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        datos.append('accion', 'login');
        $.ajax({
            url: 'ajax/login.ajax.php',
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.ErrorStatus) {
                    swal.fire({
                        title: 'Login',
                        text: res.Msj,
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                } else {
                    console.log(res.url);
                    // let rutaActual = localStorage.getItem('rutaActual')
                    location.href = res.url;
                }
            }
        });
    });

});
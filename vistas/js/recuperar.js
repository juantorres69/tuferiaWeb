$(document).ready(function() {

    $('#frmRecuperar').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        datos.append('accion', 'recuperar');
        if ($('#txtEmail').val() !== "") {
            $('.preloader').css('display', 'block');
            $.ajax({
                url: 'ajax/recuperar.ajax.php',
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
                            title: 'No existe',
                            text: res.Msj,
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    } else {
                        swal.fire({
                            title: 'Recuperar',
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
            console.log($('#txtEmail').val())
        } else {
            swal.fire({
                title: 'Error',
                text: 'Debe digitar un correo valido',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });
});
$(document).ready(function() {

    $('input:radio[name=rdLocal]').on('change', function() {
        let local = $('input:radio[name=rdLocal]:checked').val();
        if (local == '1') {
            $('#frm_grp_cc').css('display', 'block');
        } else {
            $('#frm_grp_cc').css('display', 'none');
        }
    });

    $('#frmRegistroComercio').on('submit', function(e) {
        e.preventDefault();
        let form = $(this).serializeArray();
        console.log(form);
        let datos = new FormData();
        form.forEach((item,index) => {
            console.log(item.name, item.value);
            datos.append(item.name, item.value);
        });
        console.log(datos);
        datos.append('accion', 'registroComercio');
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
                    console.log(res)
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
                            let rutaActual = localStorage.getItem('rutaActual')
                            location.href = rutaActual;
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

});
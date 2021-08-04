$(document).ready(function() {

    $('#frmRecuperar').on('submit', function(e) {
        e.preventDefault();
        let form = $(this).serializeArray();
        let datos = new FormData();
        form.forEach((item,index) => {
            console.log(item.name, item.value);
            datos.append(item.name, item.value);
        });
        datos.append('accion', 'recuperar');
        if ($('#txtEmail').val() !== "") {
            $('.preloader').css('display', 'block');
            $.ajax({
                url: 'ajax/recuperar.ajax.php',
                type: 'POST',
                dataType: 'json',
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('.preloader').css('display', 'none');
                    
                    console.log(datos)

                    if (res.ErrorStatus == false) {

                        swal.fire({
                            title: 'Recuperar',
                            text: res.Msj,
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false

                        }).then(() => {
                            location.href = 'home';
                        });
                        
                    } else {
                        swal.fire({
                            title: 'No existe',
                            text: 'el correo que digitó no esta registrado',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                }, error:function(error){ 
                    console.log(error)
                }
            });
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
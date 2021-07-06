$(document).ready(function() {

    $('#frmRecuperar').on('submit', function(e) {
        e.preventDefault();
        let form = $(this).serializeArray();
        console.log(form);
        let datos = new FormData();
        form.forEach((item,index) => {
            console.log(item.name, item.value);
            datos.append(item.name, item.value);
        });
        datos.append('accion', 'recuperar');
        for (var key of datos.entries()) {
            console.log(key[0] + ', ' + key[1]);
        }
        console.log(datos)
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
                    
                    console.log('respuesta',res)

                    if (res.ErrorStatus == false) {

                        swal.fire({
                            title: 'Recuperar',
                            text: res.Msj,
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false

                        }).then(() => {
                            // location.href = 'home';
                        });
                        
                    } else {
                        swal.fire({
                            title: 'No existe',
                            text: res.Msj,
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                }, error:function(error){
                    console.log(error)
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
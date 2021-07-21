$(document).ready(function() {

    $('#frmRestaurar').on('submit', function(e) { //
        e.preventDefault();
        let form = $(this).serializeArray();
        let datos = new FormData();
        form.forEach((item,index) => {
            datos.append(item.name, item.value);
        });
        datos.append('accion', 'restaurar'); //
        if ($('#txtPass').val() === $('#txtPassC').val() && ($('#txtPass').val() !== "" && $('#txtPassC').val() !== "") ) { // pienso que sería algo así 
            $('.preloader').css('display', 'block');
            $.ajax({
                url: 'ajax/restaurar.ajax.php', // 
                type: 'POST',
                dataType: 'json',
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    $('.preloader').css('display', 'none');
                    
                    if (res.ErrorStatus == false) {

                        swal.fire({
                            title: 'Restaurar',
                            text: res,msj, // 
                            icon: 'success',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false

                        }).then(() => {
                            location.href = 'login'; // pretendo llevarlo a login
                        });
                        
                    } else {    // no recuerdo 
                        swal.fire({
                            title: 'No existe',
                            text: 'este usuario no exite',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                }, error:function(error){ 
                    console.log(error)
                }
            });
        } else { // no recuerdo // 
            swal.fire({
                title: 'Error',
                text: 'verifique si coicido o jssajsndjas',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });
});
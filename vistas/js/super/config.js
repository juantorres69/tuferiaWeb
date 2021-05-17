$(document).ready(function() {

    $('#frmConfig').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        let url = $('#hdUrl').val();
        datos.append('accion', 'guardarConfig');
        $.ajax({
            url: `${url}ajax/config.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                swal.fire({
                    title: 'Configuración',
                    text: res.Msj,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

});
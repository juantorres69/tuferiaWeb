$(document).ready(function() {

    $('#tbComercios').dataTable({ columnDefs: [{ className: 'dt-body-center' }, { "width": "150", "targets": 0 }, { "width": "120", "targets": 5 }] });

    consultarComercios($('#hdUrl').val());

    $(document).on('change', '.cbEstado', function() {
        let comercio = $(this).data('comercio');
        let estado = $(this).val();
        let url = $('#hdUrl').val();
        $.ajax({
            url: `${url}ajax/comercio.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'cambiarEstado', comercio, estado },
            success: function(res) {
                swal.fire({
                    title: 'Comercios',
                    text: res.Msj,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

});

function consultarComercios(url) {
    let table = $('#tbComercios').DataTable();
    table.clear().draw();
    $.ajax({
        url: `${url}ajax/comercio.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarComercios' },
        success: function(res) {
            for (comercio of res) {
                table.row.add([`<div class="img-thumbnail" style="height: 78px; overflow: hidden;"><img src="${url}assets/images/comercios/${((comercio.logo) ? comercio.logo : 'no-imagen.png' )}"></div>`, comercio.nit, comercio.razon_social, comercio.email, comercio.telefono,
                    `<select class="form-control form-custom cbEstado" data-comercio="${comercio.id}">
                        <option value="0" ${((comercio.estado == 0) ? 'selected' : '' )}>Inactivo</option>
                        <option value="1" ${((comercio.estado == 1) ? 'selected' : '' )}>Pendiente</option>
                        <option value="2" ${((comercio.estado == 2) ? 'selected' : '' )}>Activo</option>
                    </select>`
                ]).draw();
            }
        }
    });
}
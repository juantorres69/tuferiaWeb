$(document).ready(function() {

    $('#tbCompras').dataTable({ columnDefs: [{ className: 'dt-body-center' }, { "width": "150", "targets": 0 }, { "width": "120", "targets": 5 }] });
    console.log('compras')
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
    let table = $('#tbCompras').DataTable();
    // table.clear().draw();
    $.ajax({
        url: `${url}ajax/checkout.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'detalle_compras_comercio_admin', reporte: false },
        success: function(res) {
            for (compra of res) {
                table.row.add([compra.nit, compra.razon_social, compra.referencia, compra.valor_compra, compra.fecha_compra, compra.status, compra.metodo]).draw();
            }
            var $btnDLtoExcel = $('#DLtoExcel');
            $btnDLtoExcel.on('click', function () {
                $("#dvjson").excelexportjs({
                            containerid: "dvjson"
                            , datatype: 'json'
                            , dataset: res
                            , columns: getColumns(res)     
                        });

            });
            
        }
    });
}
$(document).ready(function() {

    $('#tbCategorias').dataTable({ columnDefs: [{ className: 'dt-body-center' }, { "width": "120", "targets": 2 }] });

    consultarCategorias($('#hdUrl').val());

    $('#btnNuevaCat').on('click', function() {
        $('#frmCategorias')[0].reset();
        $('#msjCategoria').addClass('d-none');
        $('#hdCategoria').val('');
        $('#mdlCategorias').modal();
    });

    $('#frmCategorias').on('submit', function(e) {
        e.preventDefault();
        if ($('#txtIcono').val() == '') {
            $('#msjIconos').removeClass('d-none');
            return;
        }
        let form = $(this)[0];
        let datos = new FormData(form);
        let url = $('#hdUrl').val();
        datos.append('accion', 'guardarCategoria');
        $.ajax({
            url: `${url}ajax/categorias.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.ErrorStatus) {
                    $('#msjCategoria').removeClass('d-none');
                } else {
                    swal.fire({
                        title: 'Guardar Categoria',
                        text: res.Msj,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    form.reset();
                    $('#msjCategoria').addClass('d-none');
                    $('#msjIconos').addClass('d-none');
                    $('.dv-icon').removeClass('selected');
                    $('#mdlCategorias').modal('hide');
                    consultarCategorias($('#hdUrl').val());
                }
            }
        });
    });

    $(document).on('click', '.btnEdit', function() {
        $('.dv-icon').removeClass('selected');
        let categoria = $(this).data('id');
        let url = $('#hdUrl').val();
        $.ajax({
            url: `${url}ajax/categorias.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'consultarCategoria', categoria },
            success: function(res) {
                $('#txtCategoria').val(res.categoria);
                $('#txtIcono').val(res.icono);
                $('.dv-icon').each(function() {
                    if ($(this).attr('icono') == res.icono) {
                        $(this).addClass('selected');
                    }
                });
                $('#hdCategoria').val(res.id);
                $('#mdlCategorias').modal();
            }
        });
    });

    $(document).on('click', '.btnSubcat', function() {
        $('#mdlSubCategorias').modal();
        let categoria = $(this).data('id');
        $('#hdCategoriaSub').val(categoria);
        let url = $('#hdUrl').val();
        consultarSubcategorias(url, categoria);
    });

    $('#btnGuardarSubcat').on('click', function() {
        let categoria = $('#hdCategoriaSub').val();
        let url = $('#hdUrl').val();
        let subcategoria = $('#txtSubCategoria').val();
        if (subcategoria == '') {
            $('#msjSubCategoria').removeClass('d-none');
        } else {
            $.ajax({
                url: `${url}ajax/categorias.ajax.php`,
                type: 'post',
                dataType: 'json',
                data: { accion: 'guardarSubcategorias', subcategoria, categoria },
                success: function(res) {
                    if (!res.ErrorStatus) {
                        $('#txtSubCategoria').val('');
                        consultarSubcategorias(url, categoria);
                    }
                }
            });
        }
    });

    $(document).on('click', '.btnEliminarSubcat', function() {
        let subcategoria = $(this).data('id');
        let categoria = $('#hdCategoriaSub').val();
        let url = $('#hdUrl').val();
        $.ajax({
            url: `${url}ajax/categorias.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'eliminarSubcategoria', subcategoria },
            success: function(res) {
                consultarSubcategorias(url, categoria);
            }
        });
    });

    $(document).on('click', '.btnEliminar', function() {
        let categoria = $(this).data('id');
        let url = $('#hdUrl').val();
        $.ajax({
            url: `${url}ajax/categorias.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'eliminarCategoria', categoria },
            success: function(res) {
                consultarCategorias(url);
            }
        });
    });

    $('.dv-icon').on('click', function() {
        $('#txtIcono').val($(this).attr('icono'));
        $('.dv-icon').removeClass('selected');
        $(this).addClass('selected');
    });

});

function consultarCategorias(url) {
    $.ajax({
        url: `${url}ajax/categorias.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarCategorias' },
        success: function(res) {
            let table = $('#tbCategorias').DataTable();
            table.clear().draw();
            for (categoria of res) {
                table.row.add([categoria.categoria, `<div class="text-center"><i class="${categoria.icono}"></i></div>`, `<button class="btn btn-danger btn-icon btnEdit" title="Editar" data-id="${categoria.id}"><i class="fas fa-pen"></i></button><button class="btn btn-danger btn-icon btnEliminar" title="Eliminar" data-id="${categoria.id}"><i class="fas fa-trash"></i></button><button class="btn btn-danger btn-icon btnSubcat" title="Subcategorias" data-id="${categoria.id}"><i class="fas fa-list"></i></button>`]).draw();
            }
        }
    });
}

function consultarSubcategorias(url, categoria) {
    $.ajax({
        url: `${url}ajax/productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarSubcategorias', categoria },
        success: function(res) {
            $('#tbSubcategorias tr').remove();
            for (subcat of res) {
                $('#tbSubcategorias').append(`<tr><td>${subcat.subcategoria}</td><td><button class="btn btn-danger btn-icon btnEliminarSubcat" title="Eliminar" data-id="${subcat.id}"><i class="fas fa-trash"></i></button></td></tr>`);
            }
        }
    });
}
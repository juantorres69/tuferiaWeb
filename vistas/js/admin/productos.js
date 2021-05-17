$(document).ready(function() {

    $('#tbProductos').dataTable({ columnDefs: [{ className: 'dt-body-center' }] });

    consultarProductos($('#hdUrl').val());

    $('#cbCategoria').on('change', function() {
        if ($(this).val() != '') {
            consultarSubcategorias($('#hdUrl').val(), $(this).val());
        } else {
            $('#cbSubcategoria option').remove();
            $('#cbSubcategoria').append('<option value="">Seleccione..</option>');
        }
    });

    $('#btnNuevo').on('click', function() {
        $('#formProductos')[0].reset();
        $('#hdProducto').val('');
        $('.img-prod').removeClass('d-inline').addClass('d-none');
        $('#mdlProducto').modal();
    });

    $('#formProductos').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        let url = $('#hdUrl').val();
        datos.append('accion', 'guardarProducto');
        $.ajax({
            url: `${url}ajax/productos.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.ErrorStatus) {
                    $('#msjSKU').removeClass('d-none');
                } else {
                    swal.fire({
                        title: 'Guardar Pedido',
                        text: res.Msj,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    form.reset();
                    $('#msjSKU').addClass('d-none');
                    $('#mdlProducto').modal('hide');
                    consultarProductos($('#hdUrl').val());
                }
            }
        });
    });

    $(document).on('click', '.btnEdit', function() {
        let producto = $(this).data('id');
        let url = $('#hdUrl').val();
        $.ajax({
            url: `${url}ajax/productos.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'consultarProducto', producto },
            success: function(res) {
                $('#txtNombre').val(res.nombre);
                $('#txtDescCorta').val(res.descripcion_corta);
                $('#txtSKU').val(res.sku);
                $('#cbCategoria').val(res.id_categoria);
                consultarSubcategorias($('#hdUrl').val(), res.id_categoria, res.id_subcategoria);
                $('#txtPrecio').val(res.precio);
                $('#txtOferta').val(res.oferta);
                $('#txtGarantia').val(res.garantia);
                $('#txtDevDinero').val(res.devolucion_dinero);
                $('#cbContraEntrega').val(res.contra_entrega);
                $('#cbTipo').val(res.tipo);
                $('#txtDescLarga').val(res.descripcion_larga);
                $('#hdProducto').val(res.id);
                $('.img-prod').removeClass('d-none').addClass('d-inline');
                $('.img-prod').each(function(index) {
                    if (res.images.length > 0) {
                        if (res.images[index]) {
                            $(this).attr('src', `${url}assets/images/productos/${res.images[index].imagen}`);
                        }
                    } else {
                        $(this).attr('src', `${url}assets/images/productos/no-imagen.png`);
                    }
                });
                $('#mdlProducto').modal();
            }
        });
    });

    $(document).on('click', '.btnVariables', function() {
        consultarColores($('#hdUrl').val(), $(this).data('id'));
        consultarTallas($('#hdUrl').val(), $(this).data('id'));
        consultarTags($('#hdUrl').val(), $(this).data('id'));
        $('#hdProductoVar').val($(this).data('id'));
        $('#mdlVariables').modal();
    });

    $('#addColor').on('click', function() {
        let producto = $('#hdProductoVar').val();
        let url = $('#hdUrl').val();
        let color = $('#cbColor').val();
        if (color == '') {
            $('#MsjColor').removeClass('d-none');
        } else {
            agregarVariable(url, producto, color, 'color');
            $('#cbColor').val('');
            $('#MsjColor').addClass('d-none');
        }
    });

    $('#addTalla').on('click', function() {
        let producto = $('#hdProductoVar').val();
        let url = $('#hdUrl').val();
        let talla = $('#cbTalla').val();
        if (talla == '') {
            $('#MsjTalla').removeClass('d-none');
        } else {
            agregarVariable(url, producto, talla, 'talla');
            $('#cbTalla').val('');
            $('#MsjTalla').addClass('d-none');
        }
    });

    $('#addTag').on('click', function() {
        let producto = $('#hdProductoVar').val();
        let url = $('#hdUrl').val();
        let tag = $('#cbTag').val();
        if (tag == '') {
            $('#MsjTag').removeClass('d-none');
        } else {
            agregarVariable(url, producto, tag, 'tag');
            $('#cbTag').val('');
            $('#MsjTag').addClass('d-none');
        }
    });

    $(document).on('click', '.btnEliminarVariable', function() {
        let producto = $('#hdProductoVar').val();
        let url = $('#hdUrl').val();
        let valor = $(this).data('id');
        let variable = $(this).data('variable');
        $.ajax({
            url: `${url}ajax/productos.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'eliminarVariable', producto, valor, variable },
            success: function(res) {
                if (variable == 'color') {
                    consultarColores(url, producto);
                } else if (variable == 'talla') {
                    consultarTallas(url, producto);
                } else if (variable == 'tag') {
                    consultarTags(url, producto);
                }
            }
        });
    });

});

function agregarVariable(url, producto, valor, variable) {
    $.ajax({
        url: `${url}ajax/productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'agregarVariable', producto, valor, variable },
        success: function(res) {
            if (variable == 'color') {
                consultarColores(url, producto);
            } else if (variable == 'talla') {
                consultarTallas(url, producto);
            } else if (variable == 'tag') {
                consultarTags(url, producto);
            }
        }
    });
}

function consultarColores(url, producto) {
    $.ajax({
        url: `${url}ajax/productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarColores', producto },
        success: function(res) {
            $('#tbColores tr').remove();
            if (res.length > 0) {
                for (color of res) {
                    $('#tbColores').append(`<tr>
                                                <td>${color.descripcion}</td>
                                                <td><div class="view-color" style="background-color: ${color.hex};"></div></td>
                                                <td><button class="btn btn-danger btn-icon btnEliminarVariable" title="Eliminar" data-id="${color.id}" data-variable="color"><i class="fas fa-trash"></i></button></td>
                                            </tr>`);
                }
            }
        }
    });
}

function consultarTallas(url, producto) {
    $.ajax({
        url: `${url}ajax/productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarTallas', producto },
        success: function(res) {
            $('#tbTalla tr').remove();
            if (res.length > 0) {
                for (talla of res) {
                    $('#tbTalla').append(`<tr>
                                                <td>${talla.descripcion}</td>
                                                <td><button class="btn btn-danger btn-icon btnEliminarVariable" title="Eliminar" data-id="${talla.id}" data-variable="talla"><i class="fas fa-trash"></i></button></td>
                                            </tr>`);
                }
            }
        }
    });
}

function consultarTags(url, producto) {
    $.ajax({
        url: `${url}ajax/productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarTags', producto },
        success: function(res) {
            $('#tbTag tr').remove();
            if (res.length > 0) {
                for (tag of res) {
                    $('#tbTag').append(`<tr>
                                                <td>${tag.descripcion}</td>
                                                <td><button class="btn btn-danger btn-icon btnEliminarVariable" title="Eliminar" data-id="${tag.id}" data-variable="tag"><i class="fas fa-trash"></i></button></td>
                                            </tr>`);
                }
            }
        }
    });
}

function consultarSubcategorias(url, categoria, subcategoria = null) {
    $.ajax({
        url: `${url}ajax/productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarSubcategorias', categoria },
        success: function(res) {
            $('#cbSubcategoria option').remove();
            $('#cbSubcategoria').append('<option value="">Seleccione..</option>');
            if (res.length > 0) {
                for (sub of res) {
                    $('#cbSubcategoria').append(`<option value="${sub.id}">${sub.subcategoria}</option>`);
                }
            }
            if (subcategoria) {
                $('#cbSubcategoria').val(subcategoria);
            }
        }
    });
}

function consultarProductos(url) {
    $.ajax({
        url: `${url}ajax/productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarProductosAdmin' },
        success: function(res) {
            let table = $('#tbProductos').DataTable();
            table.clear().draw();
            for (prod of res) {
                table.row.add([`<div class="img-thumbnail" style="height: 78px; overflow: hidden;"><img src="${url}assets/images/productos/${((prod.imagen) ? prod.imagen : 'no-imagen.png' )}"></div>`, prod.nombre, prod.sku, prod.categoria, `<button class="btn btn-danger btn-icon btnEdit" title="Editar" data-id="${prod.id}"><i class="fas fa-pen"></i></button>`, `<button class="btn btn-danger btn-icon btnVariables" title="Variables" data-id="${prod.id}"><i class="fas fa-bars"></i></button>`]).draw();
            }
        }
    });
}
$(document).ready(function() {

    // $('#tbColores').dataTable({ columnDefs: [{ className: 'dt-body-center' }] });
    // $('#tbTallas').dataTable({ columnDefs: [{ className: 'dt-body-center' }] });

    consultarColores();

    $('#colores-tab').on('click', function() {
        consultarColores();
    });

    $('#tallas-tab').on('click', function() {
        consultarTallas();
    });

    $('#tags-tab').on('click', function() {
        consultarTags();
    });

    $('#btnNuevoColor').on('click', function() {
        $('#frmColores')[0].reset();
        $('#hdColor').val('');
        $('#dvColorEstado').addClass('d-none');
        $('#mdlColores').modal();
    });

    $('#btnNuevaTalla').on('click', function() {
        $('#frmTallas')[0].reset();
        $('#hdTalla').val('');
        $('#dvTallaEstado').addClass('d-none');
        $('#mdlTallas').modal();
    });

    $('#btnNuevoTag').on('click', function() {
        $('#frmTags')[0].reset();
        $('#hdTags').val('');
        $('#dvTagsEstado').addClass('d-none');
        $('#mdlTags').modal();
    });

    $(document).on('click', '.btnEditColor', function() {
        $('#hdColor').val($(this).data('id'));
        $('#txtNombre').val($(this).data('color'));
        $('#txtColor').val($(this).data('hex'));
        if ($(this).data('estado') == 1) {
            $('#chkEstadoColor').prop('checked', true);
        } else {
            $('#chkEstadoColor').prop('checked', false);
        }
        $('#dvColorEstado').removeClass('d-none');
        $('#mdlColores').modal();
    });

    $('#frmColores').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        let url = $('#hdUrl').val();
        datos.append('accion', 'guardarColor');
        $.ajax({
            url: `${url}ajax/detalles_productos.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.ErrorStatus) {
                    $('#msjColor').removeClass('d-none');
                } else {
                    swal.fire({
                        title: 'Guardar Color',
                        text: res.Msj,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    form.reset();
                    $('#msjColor').addClass('d-none');
                    $('#dvColorEstado').addClass('d-none');
                    $('#mdlColores').modal('hide');
                    consultarColores();
                }
            }
        });
    });

    $('#frmTallas').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        let url = $('#hdUrl').val();
        datos.append('accion', 'guardarTalla');
        $.ajax({
            url: `${url}ajax/detalles_productos.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.ErrorStatus) {
                    $('#msjTalla').removeClass('d-none');
                } else {
                    swal.fire({
                        title: 'Guardar Talla',
                        text: res.Msj,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    form.reset();
                    $('#msjTalla').addClass('d-none');
                    $('#dvTallaEstado').addClass('d-none');
                    $('#mdlTallas').modal('hide');
                    consultarTallas();
                }
            }
        });
    });

    $(document).on('click', '.btnEditTalla', function() {
        $('#hdTalla').val($(this).data('id'));
        $('#txtTalla').val($(this).data('talla'));
        if ($(this).data('estado') == 1) {
            $('#chkEstadoTalla').prop('checked', true);
        } else {
            $('#chkEstadoTalla').prop('checked', false);
        }
        $('#dvTallaEstado').removeClass('d-none');
        $('#mdlTallas').modal();
    });

    $('#frmTags').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        let url = $('#hdUrl').val();
        datos.append('accion', 'guardarTag');
        $.ajax({
            url: `${url}ajax/detalles_productos.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.ErrorStatus) {
                    $('#msjTag').removeClass('d-none');
                } else {
                    swal.fire({
                        title: 'Guardar Tag',
                        text: res.Msj,
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    form.reset();
                    $('#msjTag').addClass('d-none');
                    $('#dvTagsEstado').addClass('d-none');
                    $('#mdlTags').modal('hide');
                    consultarTags();
                }
            }
        });
    });

    $(document).on('click', '.btnEditTag', function() {
        $('#hdTags').val($(this).data('id'));
        $('#txtTag').val($(this).data('tag'));
        if ($(this).data('estado') == 1) {
            $('#chkEstadoTag').prop('checked', true);
        } else {
            $('#chkEstadoTag').prop('checked', false);
        }
        $('#dvTagsEstado').removeClass('d-none');
        $('#mdlTags').modal();
    });

});

function consultarColores() {
    let url = $('#hdUrl').val();
    $('#tbColores tr').remove();
    $.ajax({
        url: `${url}ajax/detalles_productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarDetalle', detalle: 'colores' },
        success: function(res) {
            for (color of res) {
                $('#tbColores').append(`<tr>
                                            <td>${color.descripcion}</td>
                                            <td><div class="view-color" style="background-color: ${color.hex};"></div></td>
                                            <td>${((color.estado == 1) ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>')}</td>
                                            <td><button class="btn btn-danger btn-icon btnEditColor" title="Editar" data-id="${color.id}" data-color="${color.descripcion}" data-hex="${color.hex}" data-estado="${color.estado}"><i class="fas fa-pen"></i></button></td>
                                        </tr>`);
            }
        }
    });
}

function consultarTallas() {
    let url = $('#hdUrl').val();
    $('#tbTallas tr').remove();
    $.ajax({
        url: `${url}ajax/detalles_productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarDetalle', detalle: 'tallas' },
        success: function(res) {
            for (talla of res) {
                $('#tbTallas').append(`<tr>
                                        <td>${talla.descripcion}</td>
                                        <td>${((talla.estado == 1) ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>')}</td>
                                        <td><button class="btn btn-danger btn-icon btnEditTalla" title="Editar" data-id="${talla.id}" data-talla="${talla.descripcion}"  data-estado="${talla.estado}"><i class="fas fa-pen"></i></button></td>
                                        </tr>`);
            }
        }
    });
}

function consultarTags() {
    let url = $('#hdUrl').val();
    $('#tbTags tr').remove();
    $.ajax({
        url: `${url}ajax/detalles_productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarDetalle', detalle: 'tags' },
        success: function(res) {
            for (tag of res) {
                $('#tbTags').append(`<tr>
                                        <td>${tag.descripcion}</td>
                                        <td>${((tag.estado == 1) ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>')}</td>
                                        <td><button class="btn btn-danger btn-icon btnEditTag" title="Editar" data-id="${tag.id}" data-tag="${tag.descripcion}"  data-estado="${tag.estado}"><i class="fas fa-pen"></i></button></td>
                                        </tr>`);
            }
        }
    });
}
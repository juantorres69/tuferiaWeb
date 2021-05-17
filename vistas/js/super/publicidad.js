$(document).ready(function() {

    consultarBanners($('#hdUrl').val());
    consultarMegaPromo($('#hdUrl').val());
    consultarPromociones($('#hdUrl').val());

    $('#btnNuevoBanner').on('click', function() {
        $('#mdlBanners').modal();
    });

    $('#frmBanners').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        let url = $('#hdUrl').val();
        datos.append('accion', 'guardarBanner');
        $.ajax({
            url: `${url}ajax/publicidad.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                let icon = '';
                if (res.ErrorStatus) {
                    icon = 'error';
                } else {
                    icon = 'success';
                }
                swal.fire({
                    title: 'Banners',
                    text: res.Msj,
                    icon,
                    confirmButtonText: 'Aceptar'
                });
                form.reset();
                $('#hdBanner').val('');
                consultarBanners($('#hdUrl').val());
                $('#mdlBanners').modal('hide');
            }
        });
    });

    $(document).on('click', '.btnEdit', function() {
        let banner = $(this).data('id');
        let url = $('#hdUrl').val();
        $.ajax({
            url: `${url}ajax/publicidad.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'consultarBanner', banner },
            success: function(res) {
                $('#txtTitulo').val(res.titulo);
                $('#txtSubtitulo').val(res.subtitulo);
                $('#txtOferta').val(res.oferta);
                $('#txtPrecio').val(res.precio);
                $('#txtRuta').val(res.link);
                $('#txtTextoRuta').val(res.link_texto);
                $('#txtOrden').val(res.orden);
                $('#hdBanner').val(res.id);
                $('#mdlBanners').modal();
            }
        });
    });

    $(document).on('click', '.btnEliminar', function() {
        let banner = $(this).data('id');
        let url = $('#hdUrl').val();
        $.ajax({
            url: `${url}ajax/publicidad.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'eliminarBanner', banner },
            success: function(res) {
                if (res.ErrorStatus) {
                    swal.fire({
                        title: 'Banners',
                        text: res.Msj,
                        icon: 'warning',
                        confirmButtonText: 'Aceptar'
                    });
                } else {
                    consultarBanners($('#hdUrl').val());
                }
            }
        });
    });

    $('#btnEditMegaPromo').on('click', function() {
        $('#mdlMegaPromo').modal();
    });

    $('#frmMegaPromo').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        let url = $('#hdUrl').val();
        datos.append('accion', 'editarMegaPromo');
        $.ajax({
            url: `${url}ajax/publicidad.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                swal.fire({
                    title: 'Mega Promo',
                    text: res.Msj,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
                form.reset();
                $('#mdlMegaPromo').modal('hide');
                consultarMegaPromo($('#hdUrl').val());
            }
        });
    });

    $(document).on('click', '.btnEditPromocion', function() {
        let promo = $(this).data('id');
        let url = $('#hdUrl').val();
        $.ajax({
            url: `${url}ajax/publicidad.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'consultarPromocion', promo },
            success: function(res) {
                $('#txtTituloPromo').val(res.titulo);
                $('#txtSubtituloPromo').val(res.subtitulo);
                $('#txtRutaPromo').val(res.link);
                $('#txtTextoRutaPromo').val(res.link_texto);
                $('#hdPromo').val(res.id);
                $('#mdlPromociones').modal();
            }
        });
    });

    $('#frmPromociones').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        let url = $('#hdUrl').val();
        datos.append('accion', 'editarPromocion');
        $.ajax({
            url: `${url}ajax/publicidad.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                swal.fire({
                    title: 'Promociones',
                    text: res.Msj,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
                form.reset();
                $('#mdlPromociones').modal('hide');
                consultarPromociones($('#hdUrl').val());
            }
        });
    });

});

function consultarBanners(url) {
    $('#dvBanners div').remove();
    $.ajax({
        url: `${url}ajax/publicidad.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarBanners' },
        success: function(res) {
            for (banner of res) {
                $('#dvBanners').append(`<div class="col-md-4">
                                            <div class="card" style="width: 18rem;">
                                                <img src="${url}vistas/assets/images/banners/${banner.imagen}" class="card-img-top" style="height: 180px;">
                                                <div class="card-body">
                                                    <h5 class="card-title">${banner.titulo}</h5>
                                                    <p class="card-text">${banner.subtitulo}</p>
                                                    <p class="card-text"><span class="price">$${numeral(banner.oferta).format('0,0')}</span>  <del>${((banner.precio) ? numeral(banner.precio).format('0,0') : '' )}</del></p>
                                                    <button class="btn btn-danger btn-icon btnEdit" data-id="${banner.id}" title="Editar"><i class="fas fa-pen"></i></button><button class="btn btn-danger btn-icon btnEliminar" data-id="${banner.id}" title="Eliminar"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>`);
            }
        }
    });
}

function consultarMegaPromo(url) {
    $.ajax({
        url: `${url}ajax/publicidad.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarMegaPromo' },
        success: function(res) {
            $('#mp_imagen').attr('src', `${url}vistas/assets/images/promos/${res.imagen}`);
            $('#mp_titulo').html(res.titulo);
            $('#mp_subtitulo').html(res.subtitulo);
            $('#mp_link_text').html(res.link_texto);
            $('#txtTituloMP').val(res.titulo);
            $('#txtSubtituloMP').val(res.subtitulo);
            $('#txtRutaMP').val(res.link);
            $('#txtTextoRutaMP').val(res.link_texto);
        }
    });
}

function consultarPromociones(url) {
    $('#dvPromociones div').remove();
    $.ajax({
        url: `${url}ajax/publicidad.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarPromociones' },
        success: function(res) {
            for (promo of res) {
                $('#dvPromociones').append(`<div class="col-md-4">
                                            <div class="card" style="width: 18rem;">
                                                <img src="${url}vistas/assets/images/promos/${promo.imagen}" class="card-img-top" style="height: 180px;">
                                                <div class="card-body">
                                                    <h5 class="card-title">${promo.titulo}</h5>
                                                    <p class="card-text">${promo.subtitulo}</p>
                                                    <p class="card-text">Link: <strong>${promo.link_texto}</strong></p>
                                                    <button class="btn btn-danger btn-icon btnEditPromocion" data-id="${promo.id}" title="Editar"><i class="fas fa-pen"></i></button>
                                                </div>
                                            </div>
                                        </div>`);
            }
        }
    });
}
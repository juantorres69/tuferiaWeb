$(document).ready(function() {
    cantRegisters = 20
    let mostrar = (($('#cbMostrar').val() == '') ? cantRegisters = 20 : parseInt($('#cbMostrar').val()));
    consultarProductos($('#hdUrl').val(), $('#hdRuta').val(), 1, mostrar);

    $(document).on('click', '.spColor', function() {
        $('.spColor').removeClass('active');
        $(this).addClass('active');
    });

    $(document).on('click', '.page-item', function() {
        
        let mostrar = (($('#cbMostrar').val() == '') ? cantRegisters : parseInt($('#cbMostrar').val()));
        consultarProductos($('#hdUrl').val(), $('#hdRuta').val(), $(this).data('page'), mostrar);
    });

    $('#cbMostrar').on('change', function() {
        let mostrar = $(this).val();
        if (mostrar != '') {
            consultarProductos($('#hdUrl').val(), $('#hdRuta').val(), 1, mostrar);
        }
    });

});

function consultarProductos(url, ruta, page, mostrar) {
    $('.shop_container div').remove();
    $('.shop_container').append(`<div class="text-center w-100"><i class="fas fa-spinner fa-5x fa-spin" style="color: #ef7236"></i></div>`);
    $.ajax({
        url: `${url}ajax/productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultarProductos', ruta, page, mostrar },
        success: function(res) {
            $('.shop_container div').remove();
            if (res.total > 0) {
                for (prod of res.productos) {
                    let colores = '';
                    for (color of prod.colores) {
                        colores += `<span class="spColor" data-color="${color.hex}" style="background-color: ${color.hex};"></span>`;
                    }
                    $('.shop_container').append(`<div class="col-md-4 col-6">
                    <div class="product">
                        <div class="product_img">
                            <a href="${url}${prod.ruta}">
                                <img src="${url}assets/images/productos/${((prod.imagen) ? prod.imagen : 'no-imagen.png' )}" alt="product_img1">
                            </a>
                            <div class="product_action_box">
                                <ul class="list_none pr_action_btn">
                                <li class="add-to-cart"><a href="${url}${prod.ruta}"><i class="icon-basket-loaded"></i> Añadir al Carrito</a></li>
                                <li><a href="${url}deseos/${prod.id}"><i class="icon-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_info">
                            <h6 class="product_title"><a href="${url}${prod.ruta}">${prod.nombre}</a></h6>
                            <div class="product_price">
                                <span class="price">$${((prod.oferta) ? numeral(prod.oferta).format('0,0') : numeral(prod.precio).format('0,0') )}</span>
                                <del>${((prod.oferta) ? '$'+numeral(prod.precio).format('0,0') : '' )}</del>
                                <div class="on_sale">
                                    <span>${((prod.oferta) ? Math.round(100-(prod.oferta*100)/prod.precio)+'% Off' : '' )}</span>
                                </div>
                            </div>
                            <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width:${((prod.rating/prod.total_votos)*20)}%"></div>
                                </div>
                                <span class="rating_num">(${prod.total_votos})</span>
                            </div>
                            <div class="pr_desc">
                                <p>${prod.descripcion_corta}</p>
                            </div>
                            <div class="pr_switch_wrap">
                                <div class="product_color_switch">
                                ${colores}
                                </div>
                            </div>
                            <div class="list_product_action_box">
                                <ul class="list_none pr_action_btn">
                                    <li class="add-to-cart"><a href="${url}${prod.ruta}"><i class="icon-basket-loaded"></i> Agregar al Carrito</a></li>
                                    <li><a href="${url}deseos/${prod.id}"><i class="icon-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>`);
                }
                let total = res.total;
                console.log({ total }, { mostrar });
                if (total > mostrar) {
                    console.log(total / mostrar);
                    console.log(parseInt(total / mostrar));
                    let total_pages = total / mostrar;
                    if (total_pages > parseInt(total_pages)) {
                        total_pages = parseInt(total_pages) + 1;
                    }
                    console.log({ total_pages });
                    $('.pagination li').remove();
                    for (let i = 1; i <= total_pages; i++) {
                        $('.pagination').append(`<li class="page-item ${((i == page) ? 'active' : '' )}" data-page="${i}"><a class="page-link">${i}</a></li>`);
                    }
                }
            } else {
                $('.shop_container').append(`<div class="alert alert-info w-100" role="alert">
                                                <i class="fas fa-info-circle"></i>
                                                No hay productos con el criterio seleccionado.
                                            </div>`);
            }
        }
    });
}
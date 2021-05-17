function agregarCarrito(url) {
    let color = null;
    let talla = null;
    let producto = $('#hdProducto').val();
    let cantidad = $('#cantidad').val();
    let sw = false;
    if ($('#color_switch span').length > 0) {
        $('#color_switch span').each(function(index) {
            if ($(this).hasClass('active')) {
                color = $(this).data('id');
            }
        });
        if (!color) {
            $('#alertCarrito').css('display', 'block');
            sw = true;
        }
    }
    if ($('#talla_switch span').length > 0) {
        $('#talla_switch span').each(function(index) {
            if ($(this).hasClass('active')) {
                talla = $(this).data('id');
            }
        });
        if (!talla) {
            $('#alertCarrito').css('display', 'block');
            sw = true;
        }
    }

    if (!sw) {
        $.ajax({
            url: `${url}ajax/carrito.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'agregarCarrito', producto, color, talla, cantidad },
            success: function(res) {
                if (res.ErrorStatus) {
                    location.href = `${url}login`;
                } else {
                    location.href = `${url}carrito`;
                }
            }
        });
    }
}

function eliminarCarrito(id, url) {
    $.ajax({
        url: `${url}ajax/carrito.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { 'accion': 'eliminarCarrito', id },
        success: function(res) {
            location.href = `${url}carrito`;
        }
    });
}
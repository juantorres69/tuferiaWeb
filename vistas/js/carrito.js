$(document).ready(function() {

    $('.qty').on('change', function() {
        guardarCantidad($(this));
    });

    $('.btn-qty').on('click', function() {
        guardarCantidad($(this).siblings('.qty'));
    });

});

function guardarCantidad(input) {
    let carrito = input.data('cart');
    let cantidad = parseInt(input.val());
    let subtotal = parseInt($(`#cartprice_${carrito}`).data('precio')) * cantidad;
    let total = 0;
    $(`#cartsubtotal_${carrito}`).html(`$${numeral(subtotal).format('0,0')}`);
    $('#tb_carrito tr').each(function(index) {
        let row_price = parseInt($(this).children('.product-price').data('precio'));
        let row_cant = parseInt($(this).children('.product-quantity').children('.quantity').children('.qty').val());
        total += (row_price * row_cant);
    });
    $('#subtotal').html(`$${numeral(total).format('0,0')}`);
    $('#total strong').html(`$${numeral(total).format('0,0')}`);
    $.ajax({
        url: `${input.data('url')}ajax/carrito.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'guardarCantidad', cantidad, carrito },
        success: function(res) {

        }
    });
}
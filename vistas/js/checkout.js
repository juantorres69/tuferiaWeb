$(document).ready(function() {

    $('.frmCheckout').click( function(e) {
        e.preventDefault();
        let usuarioId = $('#idUsuario').val()

        let datos = new FormData();
        datos.append('accion','comercionSettings');
        $.ajax({
            url: 'ajax/checkout.ajax.php',
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                config = res[0];
                console.log(res)
                pago(usuarioId, config)

    
            }
        });
        
    })

});

function pago(id, config){

    let datos = new FormData()
    datos.append('accion','consultaCarrito');
    datos.append('usuarioId', id);
    $.ajax({
        url: 'ajax/productos.ajax.php',
        type: 'post',
        dataType: 'json',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            
            let divisa = 'COP';
            let total = '';
            let impuesto = '';
            let envio = '';
            let subtotal = '';
            let url = $('#hdUrl').val()
            let urlResponse = url+'wompi-response'

            res.forEach(item => {
                subtotal = Number(subtotal) + ((Number(item.oferta) || Number(item.precio)) * Number(item.cantidad))
                
            });

            impuesto = (subtotal * config['impuesto'])/100;
            total = Number(subtotal) + Number(impuesto) + '00';
            envio = config['tasaMinimaNal'];
            reference = (Number(Math.ceil(Math.random()*1000000))+ Date.now());

            $('.formWompi').attr('method', 'GET');
            if(config.modo === 'sandbox'){
                $('.formWompi').attr('action', 'https://checkout.wompi.co/p/');
                $('.formWompi input[name="test"]').attr('value', 1);
            }else{
                $('.formWompi').attr('action', 'https://checkout.wompi.co/p/');
                $('.formWompi input[name="test"]').attr('value', 0);
            }
                
            $('.formWompi input[name="public-key"]').attr('value', config.pubApiKey);
            $('.formWompi input[name="currency"]').attr('value', divisa);
            $('.formWompi input[name="amount-in-cents"]').attr('value', total);
            $('.formWompi input[name="reference"]').attr('value', reference);
            $('.formWompi input[name="redirect-url"]').attr('value', urlResponse);
            // $('.formWompi input[name="declinedResponseUrl"]').attr('value', "");
            
            // var dataString = $('.formWompi').serialize();
            // console.log('Datos serializados: '+dataString);
            
            let data = new FormData()
            data.append('accion','guardarCompra');
            data.append('total', Number(subtotal) + Number(impuesto));
            data.append('metodo', 'Wompi');
            data.append('referencia', reference);
            $.ajax({
                url: 'ajax/checkout.ajax.php',
                type: 'post',
                dataType: 'json',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res2) {
                    let detalleCompra = []
                    res.forEach(item => {
                        detalleCompra.push({id_compra: res2.id, id_producto: item.id ,cantidad: item.cantidad, valor: Number(item.oferta) || Number(item.precio)})
                    });
                    let dataDetalle = new FormData()
                    dataDetalle.append('accion','guardarDetalleCompra');
                    dataDetalle.append('data', JSON.stringify(detalleCompra));
                    $.ajax({
                        url: 'ajax/checkout.ajax.php',
                        type: 'post',
                        dataType: 'json',
                        data: dataDetalle,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // console.log(response)
                            $('.formWompi').submit()
                        }
                    })

                }
            });


        }
    });


    


}

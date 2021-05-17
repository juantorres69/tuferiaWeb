$(document).ready(function() {

    $('#btnImgPrev').on('click', function() {
        $('#logo').click();
    });

    $('#logo').on('change', function(e) {
        $('.logo-preview').attr('src', URL.createObjectURL(e.target.files[0]));
    });

    $('.clear-img').on('click', function() {
        $('.logo-preview').attr('src', `${$('#hdUrl').val()}assets/images/productos/no-imagen.png`);
        $('#logo').val('');
    });

    $('#cbLocal').on('change', function() {
        if ($(this).val() == 0) {
            $('#dvCentroComercial').addClass('d-none');
        } else {
            $('#dvCentroComercial').removeClass('d-none');
        }
    });

    $('#tabEditPerfil').on('click', function() {
        $.ajax({
            url: `${$('#hdUrl').val()}ajax/comercio.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'consultarComercio' },
            success: function(res) {
                if (res.logo) {
                    $('.logo-preview').attr('src', `${$('#hdUrl').val()}assets/images/comercios/${res.logo}`);
                }
                $('#txtNit').val(res.nit);
                $('#txtRazonSocial').val(res.razon_social);
                $('#txtDireccion').val(res.direccion);
                $('#cbCiudad').val(res.ciudad_id);
                $('#txtCorreo').val(res.email);
                $('#txtTelefono').val(res.telefono);
                $('#txtTelFijo').val(res.telefono_fijo);
                $('#cbLocal').val(res.local);
                if (res.local == 1) {
                    $('#dvCentroComercial').removeClass('d-none');
                }
                $('#cbCentroComercial').val(res.centro_comercial_id);
                $('#txtFacebook').val(res.facebook);
                $('#txtInstagram').val(res.instagram);
                $('#txtTwitter').val(res.twitter);
                $('#txtVideo').val(res.video_promocional);
            }
        });
    });

    $('#frmPerfil').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        datos.append('accion', 'actualizarComercio');
        $.ajax({
            url: `${$('#hdUrl').val()}ajax/comercio.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
                swal.fire({
                    title: 'Actualizar Comercio',
                    text: res.Msj,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

    $('#detalleCompra').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idCompra = button.data('compra') // Extract info from data-* attributes
        var envio = button.data('envio') // Extract info from data-* attributes
        console.log({ idCompra, envio })
        consultaDetalleCompra($('#hdUrl').val(), idCompra, envio)

    })

    $('.cbEstados').on('change', function() {
        let pedido = $(this).data('pedido');
        let estado = $(this).val();
        $.ajax({
            url: `${$('#hdUrl').val()}ajax/pedidos.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'cambiarEstado', pedido, estado },
            success: function(res) {
                swal.fire({
                    title: 'Pedidos Pendientes',
                    text: res.Msj,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    location.reload();
                });
            }
        });
    });

});

function consultaDetalleCompra(url, id, envio) {
    let total = 0


    let preparando = ''
    let enviado = ''
    let reparto = ''
    let completo = ''
    let statusEnvio = envio
    $.ajax({
        url: `${url}ajax/productos.ajax.php`,
        type: 'post',
        dataType: 'json',
        data: { accion: 'consultaDetalleCompraComercio', id },
        success: function(res) {
            $('.detalleList').html('')
            console.log()
            switch (statusEnvio) {
                case 0:
                    preparando = 'active'
                    enviado = 'disabled'
                    reparto = 'disabled'
                    completo = 'disabled'
                    break;
                case 1:
                    preparando = 'complete'
                    enviado = 'active'
                    reparto = 'disabled'
                    completo = 'disabled'
                    break;
                case 2:
                    preparando = 'complete'
                    enviado = 'complete'
                    reparto = 'active'
                    completo = 'disabled'
                    break;
                case 3:
                    preparando = 'complete'
                    enviado = 'complete'
                    reparto = 'complete'
                    completo = 'active'
                    break;
            }


            res.forEach(item => {
                total = total + (item.valor * item.cantidad)
                $('.detalleList').append(`
                    <li class="list-group-item ">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h5 class="mb-1">${item.nombre}</h5>
                                <p class="mb-1">$${item.valor}</p>
                            </div>
                            <span class="badge badge-danger">${item.cantidad}</span>
                        </div>
    
                    </li>
                    
                `)

            });
            $('.detalleList').append(`
            <li class="list-group-item ">
            <div>
                <h5 class="mb-1">Seguimiento de Pedido</h5>
                <!-- <p class="mb-1">$30.000</p> -->
            </div>
            <div class="row bs-wizard" style="border-bottom:0;">

                <div class="col-sm-3 bs-wizard-step ${preparando}">
                <div class="text-center bs-wizard-stepnum">Preparando</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="#" class="bs-wizard-dot"></a>
                </div>
                
                <div class="col-sm-3 bs-wizard-step ${enviado}"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">Enviado</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="#" class="bs-wizard-dot"></a>
                </div>
                
                <div class="col-sm-3 bs-wizard-step ${reparto}"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">Reparto</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="#" class="bs-wizard-dot"></a>
                </div>
                
                <div class="col-sm-3 bs-wizard-step ${completo}"><!-- active -->
                <div class="text-center bs-wizard-stepnum">Entregado</div>
                <div class="progress"><div class="progress-bar"></div></div>
                <a href="#" class="bs-wizard-dot"></a>
                </div>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-end align-items-center">
            <h5>Total: $ ${total}</h5>
        </li>
            `)
        }
    })
}
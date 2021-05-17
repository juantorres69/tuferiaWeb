$(document).ready(function() {

    $('#detalleCompra').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idCompra = button.data('compra') // Extract info from data-* attributes
        var envio = button.data('envio') // Extract info from data-* attributes
        var status = button.data('status') // Extract info from data-* attributes
        console.log({ idCompra, envio })
        consultaDetalleCompra($('#hdUrl').val(), idCompra, envio, status)

    });

    $('#tabEditPerfil').on('click', function() {
        $.ajax({
            url: `${$('#hdUrl').val()}ajax/usuario.ajax.php`,
            type: 'post',
            dataType: 'json',
            data: { accion: 'consultarUsuario' },
            success: function(res) {
                $('#txtNombre').val(res.nombre);
                $('#txtCorreo').val(res.email);
                $('#txtTelefono').val(res.telefono);
                $('#txtDireccion').val(res.direccion);
                $('#cbCiudad').val(res.ciudad_id);
            }
        });
    });

    $('#frmPerfil').on('submit', function(e) {
        e.preventDefault();
        let form = $(this)[0];
        let datos = new FormData(form);
        datos.append('accion', 'actualizarUsuario');
        if ($('#txtPassword').val() == $('#txtCPassword').val()) {
            $.ajax({
                url: `${$('#hdUrl').val()}ajax/usuario.ajax.php`,
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
                        $('#txtPassword').val('');
                        $('#txtCPassword').val('');
                    }
                    swal.fire({
                        title: 'Actualizar Información',
                        text: res.Msj,
                        icon,
                        confirmButtonText: 'Aceptar'
                    });
                }
            });
        } else {
            swal.fire({
                title: 'Actualizar Información',
                text: 'Las contraseñas no coinciden.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    });

});

function consultaDetalleCompra(url, id, envio, status) {
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
        data: { accion: 'consultaDetalleCompra', id },
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
                total = total + (item.precio * item.cantidad)
                $('.detalleList').append(`
                    <li class="list-group-item ">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h5 class="mb-1">${item.nombre}</h5>
                                <p class="mb-1">$${item.precio}</p>
                            </div>
                            <span class="badge badge-danger">${item.cantidad}</span>
                        </div>
    
                    </li>
                    
                `)

            });
            if(status){
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
                    </li>`
                )
            } 
            $('.detalleList').append(`
                <li class="list-group-item d-flex justify-content-end align-items-center">
                    <h5>Total: $ ${total}</h5>
                </li>`
            )

        }
    })
}
<!-- START MAIN CONTENT -->
<input type="hidden" id="hdUrl" value="<?php echo $url; ?>">
<div class="main_content container-heigth-fluid">    
    <!-- START SECTION BANNER -->
    <div class="staggered-animation-wrap" style="margin-top: 18px;">
        <div class="custom-container">
            <div class="row">
                <!-- categorias menu -->
                <div class="col-lg-3 col-md-4 col-sm-12 col-3">
                    <!-- Seccion categorias -->
                    
                    <?php include 'menu_admin.php'; ?>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="heading_tab_header">
                                <div class="heading_s2">
                                    <h4><?php echo $_SESSION['nombreUsuario'] ?></h4>
                                </div>
                                <div class="tab-style2">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                                        <span class="ion-android-menu"></span>
                                    </button>
                                    <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#compras-tab" role="tab" aria-controls="arrival" aria-selected="true">Mis Pedidos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pendientes-tab" data-toggle="tab" href="#compras-pendiente-tab" role="tab" aria-controls="arrival" aria-selected="true">Pedidos Pendientes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabEditPerfil" data-toggle="tab" href="#perfil-tab" role="tab" aria-controls="sellers" aria-selected="false" >Editar Perfil</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-5">
                            <div class="tab_slider">
                                <div class="tab-pane fade show active" id="compras-tab" role="tabpanel" aria-labelledby="arrival-tab">
                                    
                                    <div class="col-12">
                                        <h4 >Pedidos</h4>
                                        <h6 class="text-secondary">Pedidos recientes</h6>

                                        <div class="table-responsive">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">PEDIDO</th>
                                                    <th scope="col">FECHA</th>
                                                    <th scope="col">ESTADO</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php
                                                    $detalle = '0';
                                                    $item = 'id_comercio';
                                                    $valor = $_SESSION['comercio'];
                                                    $compras = ControladorUsuario::ctrMostrarComprasComercio($item, $valor);
                                                    if(!$compras){
                                                        echo '<div class="col-12 text-center" >
                                                                <h2>No hay Pedidos Entregados.</h2>
                                                            </div>';
                                                    }else{
                                                        

                                                        foreach ($compras as $key => $value) {
                                                            $item = 'id_compra';
                                                            $valor = $value['id'];
                                                            
                                                            $detalleCompra = ControladorProductos::ctrDetalleCompraComercio($item, $valor);
                                                            $totalProducts = 0;
                                                            if($detalleCompra)
                                                                $totalProducts = count($detalleCompra);

                                                            $total = 0;
                                                            foreach($detalleCompra as $det){
                                                                $total += $det['valor']*$det['cantidad'];
                                                            }

                                                            // $producto = ControladorProductos::ctrMostrarProductosSimple($item,$valor);

                                                            echo    '<tr>
                                                                        <th scope="row">'.$value['referencia'].'</th>
                                                                        <td>'.$value['fecha'].'</td>';
                                                                        switch ($value['envio']) {
                                                                            case 0:
                                                                                echo '<td><span class="badge badge-warning">Preparando</span></td>';
                                                                                break;
                                                                            case 1:
                                                                                echo '<td><span class="badge badge-primary">Enviado</span></td>';
                                                                                break;
                                                                            case 2:
                                                                                echo '<td><span class="badge badge-info">Reparto</span></td>';
                                                                                break;
                                                                            case 3:
                                                                                echo '<td><span class="badge badge-success">Entregado</span></td>';
                                                                                break;
                                                                            
                                                                            default:
                                                                                echo '<td><span class="badge badge-danger">Cancelado</span></td>';
                                                                                break;
                                                                        }
                                                                        
                                                                        echo '<td><strong>$'.$total.'</strong> por '.$totalProducts.' articulos</td>
                                                                        <td><a href="#" class="button-small bg-red" id="btnDetalleCompra" data-toggle="modal" data-target="#detalleCompra" detalleIndex="'.$detalle.'"  data-compra="'.$detalleCompra[0]['id_compra'].'" data-envio="'.$value['envio'].'">Ver</a></td>
            
                                                                    </tr>';

                                                            $detalle++;
                                                        }
                                                    }
                                                    
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="compras-pendiente-tab" role="tabpanel" aria-labelledby="pendientes-tab">
                                    
                                    <div class="col-12">
                                        <h4 >Pedidos</h4>
                                        <h6 class="text-secondary">Pedidos Pendientes</h6>

                                        <div class="table-responsive">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">PEDIDO</th>
                                                    <th scope="col">FECHA</th>
                                                    <th scope="col">ESTADO</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">CAMBIAR ESTADO</th>
                                                    <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php
                                                    $detalle = '0';
                                                    $item = 'id_comercio';
                                                    $valor = $_SESSION['comercio'];
                                                    $compras = ControladorUsuario::ctrMostrarComprasPendientesComercio($item, $valor);
                                                    if(!$compras){
                                                        echo '<div class="col-12 text-center" >
                                                                <h2>No hay pedidos pendientes.</h2>
                                                            </div>';
                                                    }else{
                                                        

                                                        foreach ($compras as $key => $value) {
                                                            $item = 'id_compra';
                                                            $valor = $value['id'];
                                                            
                                                            $detalleCompra = ControladorProductos::ctrDetalleCompraComercio($item, $valor);
                                                            $totalProducts = 0;
                                                            if($detalleCompra)
                                                                $totalProducts = count($detalleCompra);

                                                            $total = 0;
                                                            foreach($detalleCompra as $det){
                                                                $total += $det['valor']*$det['cantidad'];
                                                            }

                                                            // $producto = ControladorProductos::ctrMostrarProductosSimple($item,$valor);

                                                            echo    '<tr>
                                                                        <th scope="row">'.$value['referencia'].'</th>
                                                                        <td>'.$value['fecha'].'</td>';
                                                                        switch ($value['envio']) {
                                                                            case 0:
                                                                                echo '<td><span class="badge badge-warning">Preparando</span></td>';
                                                                                break;
                                                                            case 1:
                                                                                echo '<td><span class="badge badge-primary">Enviado</span></td>';
                                                                                break;
                                                                            case 2:
                                                                                echo '<td><span class="badge badge-info">Reparto</span></td>';
                                                                                break;
                                                                            case 3:
                                                                                echo '<td><span class="badge badge-success">Entregado</span></td>';
                                                                                break;
                                                                            
                                                                            default:
                                                                                echo '<td><span class="badge badge-danger">Cancelado</span></td>';
                                                                                break;
                                                                        }
                                                                        
                                                                        echo '<td><strong>$'.$total.'</strong> por '.$totalProducts.' articulos</td>
                                                                            <td><select class="form-control form-custom cbEstados" data-pedido="'.$value['id'].'">
                                                                                    <option value="0"'.(($value['envio'] == 0) ? 'selected' : '').'>Preparando</option>
                                                                                    <option value="1"'.(($value['envio'] == 1) ? 'selected' : '').'>Enviado</option>
                                                                                    <option value="2"'.(($value['envio'] == 2) ? 'selected' : '').'>Reparto</option>
                                                                                    <option value="3"'.(($value['envio'] == 3) ? 'selected' : '').'>Entregado</option>
                                                                                    <option value="4"'.(($value['envio'] == 4) ? 'selected' : '').'>Cancelado</option>
                                                                                </select></td>
                                                                        <td><a href="#" class="button-small bg-red" id="btnDetalleCompra" data-toggle="modal" data-target="#detalleCompra" detalleIndex="'.$detalle.'"  data-compra="'.$detalleCompra[0]['id_compra'].'" data-envio="'.$value['envio'].'">Ver</a></td>
            
                                                                    </tr>';

                                                            $detalle++;
                                                        }
                                                    }
                                                    
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="perfil-tab" role="tabpanel" aria-labelledby="sellers-tab">
                                    <form enctype="multipart/form-data" id="frmPerfil">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="clear-img"><i class="far fa-times-circle"></i></div>
                                                <div class="img-preview">
                                                    <img src="<?php echo $url; ?>assets/images/productos/no-imagen.png" class="logo-preview">
                                                </div>
                                                <a class="btn btn-action btn-danger btn-block mt-1 text-white" id="btnImgPrev">Seleccionar</a>
                                                <input type="file" id="logo" name="logo" class="d-none" accept="image/*">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nit</label>
                                                            <input type="text" name="" id="txtNit" class="form-control form-custom" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Razon Social</label>
                                                            <input type="text" name="txtRazonSocial" id="txtRazonSocial" class="form-control form-custom" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                            <input type="text" name="txtDireccion" id="txtDireccion" class="form-control form-custom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <?php
                                                            $ciudades = ControladorCiudad::ctrConsultarCiudades();
                                                        ?>
                                                            <label>Ciudad</label>
                                                            <select name="cbCiudad" id="cbCiudad" class="form-control form-custom">
                                                            <?php 
                                                            foreach($ciudades as $ciudad){
                                                                echo '<option value="'.$ciudad['id'].'">'.$ciudad['descripcion'].'</option>';
                                                            }
                                                            ?> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Correo Electrónico</label>
                                                            <input type="text" name="txtCorreo" id="txtCorreo" class="form-control form-custom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Telefono</label>
                                                            <input type="text" name="txtTelefono" id="txtTelefono" class="form-control form-custom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Telefono Fijo</label>
                                                            <input type="text" name="txtTelFijo" id="txtTelFijo" class="form-control form-custom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>¿Tiene Local?</label>
                                                            <select name="cbLocal" id="cbLocal" class="form-control form-custom">
                                                                <option value="1">Si</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 d-none" id="dvCentroComercial">
                                                        <div class="form-group">
                                                        <?php 
                                                        $centros_comerciales = ControladorCentroComercial::ctrConsultarCentrosComerciales();
                                                        ?>
                                                            <label>Centro Comercial</label>
                                                            <select name="cbCentroComercial" id="cbCentroComercial" class="form-control form-custom">
                                                            <?php 
                                                            foreach($centros_comerciales as $cc){
                                                                echo '<option value="'.$cc['id'].'">'.$cc['descripcion'].'</option>';
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Facebook</label>
                                                            <input type="text" name="txtFacebook" id="txtFacebook" class="form-control form-custom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Instagram</label>
                                                            <input type="text" name="txtInstagram" id="txtInstagram" class="form-control form-custom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Twitter</label>
                                                            <input type="text" name="txtTwitter" id="txtTwitter" class="form-control form-custom">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>Video Promocional</label>
                                                            <input type="text" name="txtVideo" id="txtVideo" placeholder="Enlace de youtube" class="form-control form-custom">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <button class="btn btn-action btn-danger" type="submit">Actualizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

<!-- Modal -->
<div class="modal fade " id="detalleCompra" tabindex="-1" role="dialog" aria-hidden="true"  data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
            </button>
            <div class="modal-header">
                <h4>Detalle Compra</h4>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-sm-12"> 
                        <ul class="list-group detalleList">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- End Screen Load Popup Section --> 

<div class="main_content">    
    <!-- START SECTION CONTENIDO -->
    <div class="container">
        
        <!-- <div class="col-xl-12">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4><?php echo $_SESSION['nombreUsuario'] ?></h4>
                        </div>
                        <div class="tab-style2">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                                <span class="ion-android-menu"></span>
                            </button>
                            <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#compras-tab" role="tab" aria-controls="arrival" aria-selected="true">Mis Pedidos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pendientes-tab" data-toggle="tab" href="#compras-pendiente-tab" role="tab" aria-controls="arrival" aria-selected="true">Pedidos Pendientes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabEditPerfil" data-toggle="tab" href="#perfil-tab" role="tab" aria-controls="sellers" aria-selected="false" >Editar Perfil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="tab_slider">
                        <div class="tab-pane fade show active" id="compras-tab" role="tabpanel" aria-labelledby="arrival-tab">
                            
                            <div class="col-12">
                                <h4 >Pedidos</h4>
                                <h6 class="text-secondary">Pedidos recientes</h6>

                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                            <th scope="col">PEDIDO</th>
                                            <th scope="col">FECHA</th>
                                            <th scope="col">ESTADO</th>
                                            <th scope="col">TOTAL</th>
                                            <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                            $detalle = '0';
                                            $item = 'id_comercio';
                                            $valor = $_SESSION['comercio'];
                                            $compras = ControladorUsuario::ctrMostrarComprasComercio($item, $valor);
                                            if(!$compras){
                                                echo '<div class="col-12 text-center" >
                                                        <h2>No hay Pedidos Entregados.</h2>
                                                     </div>';
                                            }else{
                                                

                                                foreach ($compras as $key => $value) {
                                                    $item = 'id_compra';
                                                    $valor = $value['id'];
                                                    
                                                    $detalleCompra = ControladorProductos::ctrDetalleCompraComercio($item, $valor);
                                                    $totalProducts = 0;
                                                    if($detalleCompra)
                                                        $totalProducts = count($detalleCompra);

                                                    $total = 0;
                                                    foreach($detalleCompra as $det){
                                                        $total += $det['valor']*$det['cantidad'];
                                                    }

                                                    // $producto = ControladorProductos::ctrMostrarProductosSimple($item,$valor);

                                                    echo    '<tr>
                                                                <th scope="row">#'.$value['id'].'</th>
                                                                <td>'.$value['fecha'].'</td>';
                                                                switch ($value['envio']) {
                                                                    case 0:
                                                                        echo '<td><span class="badge badge-warning">Preparando</span></td>';
                                                                        break;
                                                                    case 1:
                                                                        echo '<td><span class="badge badge-primary">Enviado</span></td>';
                                                                        break;
                                                                    case 2:
                                                                        echo '<td><span class="badge badge-info">Reparto</span></td>';
                                                                        break;
                                                                    case 3:
                                                                        echo '<td><span class="badge badge-success">Entregado</span></td>';
                                                                        break;
                                                                    
                                                                    default:
                                                                        echo '<td><span class="badge badge-danger">Cancelado</span></td>';
                                                                        break;
                                                                }
                                                                
                                                                echo '<td><strong>$'.$total.'</strong> por '.$totalProducts.' articulos</td>
                                                                <td><a href="#" class="button-small bg-red" id="btnDetalleCompra" data-toggle="modal" data-target="#detalleCompra" detalleIndex="'.$detalle.'"  data-compra="'.$detalleCompra[0]['id_compra'].'" data-envio="'.$value['envio'].'">Ver</a></td>
    
                                                            </tr>';

                                                    $detalle++;
                                                }
                                            }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="compras-pendiente-tab" role="tabpanel" aria-labelledby="pendientes-tab">
                            
                            <div class="col-12">
                                <h4 >Pedidos</h4>
                                <h6 class="text-secondary">Pedidos Pendientes</h6>

                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                            <th scope="col">PEDIDO</th>
                                            <th scope="col">FECHA</th>
                                            <th scope="col">ESTADO</th>
                                            <th scope="col">TOTAL</th>
                                            <th scope="col">CAMBIAR ESTADO</th>
                                            <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                            $detalle = '0';
                                            $item = 'id_comercio';
                                            $valor = $_SESSION['comercio'];
                                            $compras = ControladorUsuario::ctrMostrarComprasPendientesComercio($item, $valor);
                                            if(!$compras){
                                                echo '<div class="col-12 text-center" >
                                                        <h2>No hay pedidos pendientes.</h2>
                                                     </div>';
                                            }else{
                                                

                                                foreach ($compras as $key => $value) {
                                                    $item = 'id_compra';
                                                    $valor = $value['id'];
                                                    
                                                    $detalleCompra = ControladorProductos::ctrDetalleCompraComercio($item, $valor);
                                                    $totalProducts = 0;
                                                    if($detalleCompra)
                                                        $totalProducts = count($detalleCompra);

                                                    $total = 0;
                                                    foreach($detalleCompra as $det){
                                                        $total += $det['valor']*$det['cantidad'];
                                                    }

                                                    // $producto = ControladorProductos::ctrMostrarProductosSimple($item,$valor);

                                                    echo    '<tr>
                                                                <th scope="row">#'.$value['id'].'</th>
                                                                <td>'.$value['fecha'].'</td>';
                                                                switch ($value['envio']) {
                                                                    case 0:
                                                                        echo '<td><span class="badge badge-warning">Preparando</span></td>';
                                                                        break;
                                                                    case 1:
                                                                        echo '<td><span class="badge badge-primary">Enviado</span></td>';
                                                                        break;
                                                                    case 2:
                                                                        echo '<td><span class="badge badge-info">Reparto</span></td>';
                                                                        break;
                                                                    case 3:
                                                                        echo '<td><span class="badge badge-success">Entregado</span></td>';
                                                                        break;
                                                                    
                                                                    default:
                                                                        echo '<td><span class="badge badge-danger">Cancelado</span></td>';
                                                                        break;
                                                                }
                                                                
                                                                echo '<td><strong>$'.$total.'</strong> por '.$totalProducts.' articulos</td>
                                                                    <td><select class="form-control form-custom cbEstados" data-pedido="'.$value['id'].'">
                                                                            <option value="0"'.(($value['envio'] == 0) ? 'selected' : '').'>Preparando</option>
                                                                            <option value="1"'.(($value['envio'] == 1) ? 'selected' : '').'>Enviado</option>
                                                                            <option value="2"'.(($value['envio'] == 2) ? 'selected' : '').'>Reparto</option>
                                                                            <option value="3"'.(($value['envio'] == 3) ? 'selected' : '').'>Entregado</option>
                                                                            <option value="4"'.(($value['envio'] == 4) ? 'selected' : '').'>Cancelado</option>
                                                                        </select></td>
                                                                <td><a href="#" class="button-small bg-red" id="btnDetalleCompra" data-toggle="modal" data-target="#detalleCompra" detalleIndex="'.$detalle.'"  data-compra="'.$detalleCompra[0]['id_compra'].'" data-envio="'.$value['envio'].'">Ver</a></td>
    
                                                            </tr>';

                                                    $detalle++;
                                                }
                                            }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="perfil-tab" role="tabpanel" aria-labelledby="sellers-tab">
                            <form enctype="multipart/form-data" id="frmPerfil">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="clear-img"><i class="far fa-times-circle"></i></div>
                                        <div class="img-preview">
                                            <img src="<?php echo $url; ?>assets/images/productos/no-imagen.png" class="logo-preview">
                                        </div>
                                        <a class="btn btn-action btn-danger btn-block mt-1 text-white" id="btnImgPrev">Seleccionar</a>
                                        <input type="file" id="logo" name="logo" class="d-none" accept="image/*">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nit</label>
                                                    <input type="text" name="" id="txtNit" class="form-control form-custom" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Razon Social</label>
                                                    <input type="text" name="txtRazonSocial" id="txtRazonSocial" class="form-control form-custom" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" name="txtDireccion" id="txtDireccion" class="form-control form-custom">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <?php
                                                    $ciudades = ControladorCiudad::ctrConsultarCiudades();
                                                ?>
                                                    <label>Ciudad</label>
                                                    <select name="cbCiudad" id="cbCiudad" class="form-control form-custom">
                                                    <?php 
                                                    foreach($ciudades as $ciudad){
                                                        echo '<option value="'.$ciudad['id'].'">'.$ciudad['descripcion'].'</option>';
                                                    }
                                                    ?> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Correo Electrónico</label>
                                                    <input type="text" name="txtCorreo" id="txtCorreo" class="form-control form-custom">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Telefono</label>
                                                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control form-custom">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Telefono Fijo</label>
                                                    <input type="text" name="txtTelFijo" id="txtTelFijo" class="form-control form-custom">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>¿Tiene Local?</label>
                                                    <select name="cbLocal" id="cbLocal" class="form-control form-custom">
                                                        <option value="1">Si</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-none" id="dvCentroComercial">
                                                <div class="form-group">
                                                <?php 
                                                $centros_comerciales = ControladorCentroComercial::ctrConsultarCentrosComerciales();
                                                ?>
                                                    <label>Centro Comercial</label>
                                                    <select name="cbCentroComercial" id="cbCentroComercial" class="form-control form-custom">
                                                    <?php 
                                                    foreach($centros_comerciales as $cc){
                                                        echo '<option value="'.$cc['id'].'">'.$cc['descripcion'].'</option>';
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Facebook</label>
                                                    <input type="text" name="txtFacebook" id="txtFacebook" class="form-control form-custom">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Instagram</label>
                                                    <input type="text" name="txtInstagram" id="txtInstagram" class="form-control form-custom">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Twitter</label>
                                                    <input type="text" name="txtTwitter" id="txtTwitter" class="form-control form-custom">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Video Promocional</label>
                                                    <input type="text" name="txtVideo" id="txtVideo" placeholder="Enlace de youtube" class="form-control form-custom">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-action btn-danger" type="submit">Actualizar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    
    </div>

    <!-- END SECTION CONTENIDO -->


</div>
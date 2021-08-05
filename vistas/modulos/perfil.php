<?php
    $detalle = '0';
    $item = 'id_usuario';
    $valor = $_SESSION['idUsuario'];
    $compras = ControladorUsuario::ctrMostrarCompras($item, $valor);
                        
?>
<!-- START SECTION PERFIL -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <!-- TITTLE -->
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Perfil</h1>
                </div>
            </div>
            <!-- ROUTE -->
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- SECTION PERFIL -->
<div class="modal fade " id="detalleCompra" tabindex="-1" role="dialog" aria-hidden="true"  data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true" > 
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="margin: 0px;">Detalle Compra</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-sm-12"> 
                        <ul class="list-group detalleList"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main_content" style="min-height: calc(100vh - 134px - 85px ) !important;">
    <div class="container">
        <div class="col-xl-12">
            <!-- PROFILE HEADER -->
            <div class="row">
                <div class="col-12">
                    <div class="heading_tab_header">
                        <!-- USER NAME -->
                        <div class="heading_s2">
                            <h4><?php echo $_SESSION['nombreUsuario'] ?></h4>
                        </div>
                        <!-- OPTION -->
                        <div class="tab-style2">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                                <span class="ion-android-menu"></span>
                            </button>
                            <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist" style="margin: 0px;">
                                <li class="nav-item">
                                    <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#compras-tab" role="tab" aria-controls="arrival" aria-selected="true">Mis Compras</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tabEditPerfil" data-toggle="tab" href="#perfil-tab" role="tab" aria-controls="sellers" aria-selected="false">Editar Perfil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="featured-tab" data-toggle="tab" href="#deseos-tab" role="tab" aria-controls="featured" aria-selected="false">Mi lista de deseos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTENTS -->
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="tab_slider">
                        <!-- COMPRAS -->
                        <div class="tab-pane fade show active" id="compras-tab" role="tabpanel" aria-labelledby="arrival-tab">
                            <div class="col-12">
                                <h4 >Compras</h4>
                                <h6 class="text-secondary">Compras recientes</h6>
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th scope="col">PEDIDO</th>
                                                <th scope="col">FECHA</th>
                                                <th scope="col">ESTADO ENVIO</th>
                                                <th scope="col">ESTADO PAGO</th>
                                                <th scope="col">TOTAL</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>   
                                        <tbody>
                                            <?php 
                                            if(!$compras){
                                                echo '<div class="col-12 text-center" >
                                                        <h2>Aún no tienes compras realizadas en esta tienda</h2>
                                                     </div>';
                                            }else{ 
                                                $status = false;
                                                foreach ($compras as $key => $value) {
                                                    $item = 'id_compra';
                                                    $valor = $value['id'];  
                                                    $detalleCompra = ControladorProductos::ctrDetalleCompra($item, $valor);
                                                    $totalProducts = 0;
                                                    if($detalleCompra)
                                                        $totalProducts = count($detalleCompra);
                                                    // $producto = ControladorProductos::ctrMostrarProductosSimple($item,$valor);
                                                    echo    '<tr>
                                                                <th scope="row">'.$value['referencia'].'</th>
                                                                <td>'.$value['fecha'].'</td>';
                                                                if(isset($value['status'])){
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
                                                                    switch ($value['status']) {
                                                                        case 'APPROVED':
                                                                            echo '<td><span class="badge badge-success">Aprobado</span></td>';
                                                                            $status = true;
                                                                            break;
                                                                        case 'DECLINED':
                                                                            echo '<td><span class="badge badge-danger">Cancelado</span></td>';
                                                                            break;
                                                                    }
                                                                }else{
                                                                    echo '<td><span class="badge badge-warning">Pendiente</span></td>';
                                                                    echo '<td><span class="badge badge-warning">Pendiente</span></td>';
                                                                }
                                                                echo '<td><strong>$'.number_format($value['total_compra']).'</strong> por '.$totalProducts.' articulos</td>';
                                                                if(isset($detalleCompra[0]))
                                                                    echo '<td><a href="#" class="button-small bg-red" id="btnDetalleCompra" data-toggle="modal" data-target="#detalleCompra" detalleIndex="'.$detalle.'" data-status="'.$status.'" data-compra="'.$detalleCompra[0]['id_compra'].'" data-envio="'.$value['envio'].'">Ver</a></td>
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
                        <!-- DATOS DEL USUARIO -->
                        <div class="tab-pane fade" id="perfil-tab" role="tabpanel" aria-labelledby="tabEditPerfil">
                            <form id="frmPerfil">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="txtNombre" id="txtNombre" class="form-control form-custom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Correo Electrónico</label>
                                            <input type="email" name="txtCorreo" id="txtCorreo" class="form-control form-custom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input type="number" name="txtTelefono" id="txtTelefono" class="form-control form-custom">
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
                                                <option value="">Seleccione..</option>
                                                <?php 
                                                    foreach($ciudades as $ciudad){
                                                        echo '<option value="'.$ciudad['id'].'">'.$ciudad['descripcion'].'</option>';
                                                    }
                                                ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="txtPassword" id="txtPassword" class="form-control form-custom">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Confirmar Contraseña</label>
                                            <input type="password" name="txtCPassword" id="txtCPassword" class="form-control form-custom">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-action btn-danger" type="submit">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- LISTA DE DESEOS -->
                        <div class="tab-pane fade" id="deseos-tab" role="tabpanel" aria-labelledby="featured-tab">
                            <?php 
                                $ruta = explode('/', $_GET['ruta']);
                                if(count($ruta) > 1){
                                    $producto = $ruta[1];
                                    ControladorProductos::ctrAgregarDeseos($producto);
                                }
                            ?>
                            <div class="">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                        <h4 >Deseos</h4>
                                        <h6 class="text-secondary">Esta es tu lista de deseos</h6>
                                            <div class="table-responsive wishlist_table">
                                                <!-- TABLE -->
                                                <table class="table">
                                                    <!-- ELEMENT -->
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">&nbsp;</th>
                                                            <th class="product-name">Producto</th>
                                                            <th class="product-price">Precio</th>
                                                            <th class="product-add-to-cart"></th>
                                                            <th class="product-remove">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- ITEMS -->
                                                    <tbody>
                                                        <?php 
                                                        $item = 'usuario_id';
                                                        $valor = $_SESSION['idUsuario'];
                                                        $deseos = ControladorProductos::ctrConsultarDeseos($item, $valor);
                                                        if(count($deseos) > 0){
                                                            foreach($deseos as $deseo){
                                                                echo '<tr>
                                                                    <td class="product-thumbnail"><a href="'.$url.$deseo['categoria'].'/'.$deseo['id'].'"><img src="'.$url.'assets/images/productos/'.(($deseo['imagen'] != '') ? $deseo['imagen'] : 'no-imagen.png').'" alt="product1" style="height: 100px;"></a></td>
                                                                    <td class="product-name" data-title="Product"><a href="'.$url.$deseo['categoria'].'/'.$deseo['id'].'">'.$deseo['nombre'].'</a></td>
                                                                    <td class="product-price" data-title="Price">$'.(($deseo['oferta']) ? number_format($deseo['oferta']) : number_format($deseo['precio']) ).'</td>
                                                                    <td class="product-add-to-cart"><a href="'.$url.'carrito" class="btn btn-fill-out"><i class="icon-basket-loaded"></i>Agregar al Carrito</a></td>
                                                                    <td class="product-remove" data-title="Remove"><a onclick="eliminarDeseo('.$deseo['id_lista'].',\''.$url.'\')"><i class="ti-close"></i></a></td>
                                                                </tr>';
                                                            }
                                                        }else{
                                                            echo '<tr><td colspan="5">No hay información.</td></tr>';
                                                        }
                                                        ?>           
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION PERFIL -->
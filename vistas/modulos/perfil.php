<?php
    $detalle = '0';
    $item = 'id_usuario';
    $valor = $_SESSION['idUsuario'];
    $compras = ControladorUsuario::ctrMostrarCompras($item, $valor);
                        
?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Perfil</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
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
    <!-- <div class="mt-4 staggered-animation-wrap">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <?php include "menu_cuenta.php" ?>
                </div>
                <div class="col-lg-9 ">
                    <div>
                        <h4 class="text-dark">Administrador</h4>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container">
        <div class="col-xl-12">
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
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="tab_slider">
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
                        <div class="tab-pane fade" id="deseos-tab" role="tabpanel" aria-labelledby="featured-tab">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    
    </div>

    <!-- END SECTION CONTENIDO -->


</div>
<!-- END SECTION BREADCRUMB -->


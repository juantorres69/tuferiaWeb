<?php 
    $ruta = explode('/', $_GET['ruta']);
    if(count($ruta) > 1){
        $producto = $ruta[1];
        ControladorProductos::ctrAgregarDeseos($producto);
    }
?>
<!-- SECTION WISH -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <!-- TITTLE -->
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Lista de Deseos</h1>
                </div>
            </div>
            <!-- ROUTE -->
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active">Lista de Deseos</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- SECTION WISH LIST -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-12">
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
                                        <td class="product-add-to-cart"><a href="'.$url.'carrito" class="btn btn-fill-out"><i class="icon-basket-loaded"></i> Agregar al Carrito</a></td>
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
<!-- END SECTION WISH -->
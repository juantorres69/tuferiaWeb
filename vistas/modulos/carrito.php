<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">

    <!-- STRART CONTAINER -->
    <div class="container">
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Carrito de Compras</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active">Carrito</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END CONTAINER-->
    
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION SHOP -->
<?php 
    $item = 'usuario_id';
    $valor = $_SESSION['idUsuario'];
    $carrito = ControladorProductos::ctrConsultarCarrito($item, $valor);
?>
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Producto</th>
                                <th class="product-price">Precio</th>
                                <th class="product-quantity">Cantidad</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tb_carrito">
                            <?php
                            $subtotal = 0;
                            if(count($carrito) > 0){
                                foreach($carrito as $cart){
                                    $precio = ($cart['oferta']) ? $cart['oferta'] : $cart['precio'];
                                    echo '<tr>
                                        <td class="product-thumbnail"><a href="#"><img src="'.$url.'assets/images/productos/'.(($cart['imagen'] != '') ? $cart['imagen'] : 'no-imagen.png').'" alt="product1" style="height: 100px;"></a></td>
                                        <td class="product-name" data-title="Product"><a href="#">'.$cart['nombre'].'</a></td>
                                        <td class="product-price" id="cartprice_'.$cart['id_carrito'].'" data-precio="'.$precio.'" data-title="Price">$'.number_format($precio).'</td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <input type="button" value="-" class="minus btn-qty">
                                                <input type="number" name="quantity" value="'.$cart['cantidad'].'" data-url='.$url.' data-cart="'.$cart['id_carrito'].'" id="txtCant_'.$cart['id_carrito'].'" title="Qty" class="qty" size="4">
                                                <input type="button" value="+" class="plus btn-qty">
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total" id="cartsubtotal_'.$cart['id_carrito'].'">$'.number_format($precio*$cart['cantidad']).'</td>
                                        <td class="product-remove" data-title="Remove"><a onclick="eliminarCarrito('.$cart['id_carrito'].',\''.$url.'\')"><i class="ti-close"></i></a></td>
                                    </tr>';
                                    $subtotal += $precio*$cart['cantidad'];
                                }
                            }else{
                                echo '<tr><td colspan="6">No hay información.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
            </div>
            <div class="col-md-6">
            	<div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Totales</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Subtotal</td>
                                    <td class="cart_total_amount" id="subtotal">$<?php echo number_format($subtotal); ?></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount" id="total"><strong>$<?php echo number_format($subtotal); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="<?php echo $url; ?>checkout" class="btn btn-fill-out">Ir pagar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
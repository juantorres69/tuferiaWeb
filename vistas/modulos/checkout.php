<!-- SECTION CHECKOUT -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <!-- TITTLE -->
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Checkout</h1>
                </div>
            </div>
            <!-- ROUTE -->
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- PURCHASE INFORMATION SECTION -->
<div class="section">
	<div class="container">
        <div class="row">
        	<div class="col-md-6">
                <!-- TITTLE -->
            	<div class="heading_s1">
            		<h4 class="text-dark">Información de su compra</h4>
                </div>
                <!-- FORM -->
                <form method="post">
                    <div class="form-group">
                        <input type="text" required class="form-control" value="<?php echo $_SESSION['nombreUsuario']; ?>" name="fname" placeholder="Nombre" style="text-transform: capitalize;">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" value="<?php echo $_SESSION['emailUsuario']; ?>" name="email" placeholder="Correo Electrónico">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" value="<?php echo $_SESSION['telefono']; ?>" name="phone" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $_SESSION['direccion']; ?>" name="billing_address" required="" placeholder="Dirección">
                    </div>
                    <?php
                        $ciudades = ControladorCiudad::ctrConsultarCiudades();
                    ?>
                    <div class="form-group">
                        <div class="custom_select">
                            <select class="form-control">
                                <option value="">Seleccione la Ciudad..</option>
                                <?php 
                                foreach($ciudades as $ciudad){
                                    echo '<option value="'.$ciudad['id'].'" '.(($ciudad['id'] == $_SESSION['ciudad_id']) ? 'selected' : '' ).'>'.$ciudad['descripcion'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="heading_s1">
                        <h4>Información adicional</h4>
                    </div>
                    <div class="form-group mb-0">
                        <textarea rows="5" class="form-control" placeholder="Notas de la compra"></textarea>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="order_review" style="padding: 0px 30px;">
                    <!-- TITTLE -->
                    <div class="heading_s1 ">
                        <h4 class="text-dark">Tu orden</h4>
                    </div>
                    <?php 
                        $item = 'usuario_id';
                        $valor = $_SESSION['idUsuario'];
                        $carrito = ControladorProductos::ctrConsultarCarrito($item, $valor);
                        $comercioSettings = ControladorCheckout::ctrMostrarComercioSettings();
                    ?>
                    <input type="hidden" id="hdUrl" value="<?php echo $url?>">
                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']?>" >
                    <!-- TABLE -->
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $subtotal = 0;
                                    if(count($carrito) > 0){
                                        foreach($carrito as $cart){
                                            $precio = ($cart['oferta']) ? $cart['oferta'] : $cart['precio'];
                                            echo '<tr>
                                                    <td>'.$cart['nombre'].' <span class="product-qty">x '.$cart['cantidad'].'</span></td>
                                                    <td>$'.number_format($precio).'</td>
                                                </tr>';
                                            $subtotal += $precio*$cart['cantidad'];
                                        }
                                    }else{
                                        echo '<tr><td colspan="2">No hay información.</td></tr>';
                                    }
                                    $impuesto = ($subtotal * $comercioSettings[0]['impuesto'])/100
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">$<?php echo number_format($subtotal); ?></td>
                                </tr>
                                <tr>
                                    <th>Iva</th>
                                    <td class="product-subtotal">$<?php echo number_format($impuesto); ?></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal">$<?php echo number_format($subtotal + $impuesto); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- PAYMENT METHOD -->
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Metodo de Pago</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" value="option5" checked="">
                                <label class="form-check-label" for="exampleRadios5">Wompi</label>
                                <p data-method="option5" class="payment-text">Pagar via wompi; Puedes pagar con tarjeta de Credito y Debito, transferencias desde cuentas Bancolombia, PSE y Nequi.</p>
                            </div>
                        </div>
                    </div>
                    <!-- FORM / el cual esta oculto-->
                    <form class="formWompi">
                         <!-- OBLIGATORIOS -->
                        <input type="hidden" name="public-key" value="" />
                        <input type="hidden" name="currency" value="" />
                        <input type="hidden" name="amount-in-cents" value="" />
                        <input type="hidden" name="reference" value="" />
                        <!-- OPCIONALES -->
                        <input type="hidden" name="redirect-url" value="" />
                        <?php 
                        if($subtotal > 0){
                            echo '<button type="submit" class="btn btn-fill-out btn-block frmCheckout">Pagar</button>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CHECKOUT -->

<!-- START HEADER -->
<header class="header_wrap">
	<!-- <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                	<div class="header_topbar_info">
                    	<div class="header_offer">
                    		<span>Free Ground Shipping Over $250</span>
                        </div>
                        <div class="download_wrap">
                            <span class="mr-3">Download App</span>
                            <ul class="icon_list text-center text-lg-left">
                                <li><a href="#"><i class="fab fa-apple"></i></a></li>
                                <li><a href="#"><i class="fab fa-android"></i></a></li>
                                <li><a href="#"><i class="fab fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="lng_dropdown">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="assets/images/eng.png" data-title="English">English</option>
                                <option value='fn' data-image="assets/images/fn.png" data-title="France">France</option>
                                <option value='us' data-image="assets/images/us.png" data-title="United States">United States</option>
                            </select>
                        </div>
                        <div class="ml-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="middle-header dark_skin">
    	<div class="custom-container">
        	<div class="nav_block">
                <a class="navbar-brand" href="<?php echo $url; ?>">
                    <img class="logo_light" src="<?php echo $url.'assets/images/logo-feria.png'?>" alt="logo" />
                    <img class="logo_dark" src="<?php echo $url.'assets/images/logo-feria.png'?>" alt="logo" />
                </a>
                <div class="product_search_form rounded_input">
                    <form id="frmBuscar">
                        <input type="hidden" id="hdUrl" value="<?php echo $url; ?>">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null" id="cbCategorias">
                                        <option value="">Categorias</option>
                                        <?php 
                                            $ruta = array();
                                            if(isset($_GET['ruta'])){
                                                $ruta = explode('/',$_GET['ruta']);
                                            }

                                            $buscar = '';
                                            $cat = '';
                                            if($ruta[0] == 'buscar'){
                                                if(count($ruta) == 2){
                                                    $buscar = $ruta[1];
                                                }else{
                                                    $buscar = $ruta[2];
                                                    $cat = $ruta[1];
                                                }
                                            }else{
                                                $cat = $ruta[0];
                                            }

                                            $categorias = ControladorProductos::ctrMostrarCategorias(null, null);
                                            
                                            foreach ($categorias as $key => $value) {
                                                echo '<option value="'.$value['ruta'].'" '.(($cat == $value['ruta']) ? 'selected' : '' ).'>'.$value['categoria'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php 
                            
                            ?>
                            <input class="form-control" placeholder="Buscar Productos..." required=""  type="text" id="txtBuscar" value="<?php echo $buscar; ?>">
                            <button type="submit" class="search_btn2"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li class="dropdown cart_dropdown"><a href="#" class="nav-link"><i class="linearicons-user"></i></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <?php 
                                if(isset($_SESSION['idUsuario'])){
                                    echo '<li>
                                            <a href="./perfil">Perfil</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'cerrar">Cerrar Sesión</a>
                                        </li>';
                                }else{
                                    echo '<li>
                                            <a href="'.$url.'login" class="btnIngreso">Iniciar Sesión</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'registro" class="btnIngreso">Registro</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'registro-comercio" class="btnIngreso">Vende con Nosotros</a>
                                        </li>';
                                }                               
                                ?>
                            </ul>
                        </div>
                    </li>
                    <?php 
                        if(isset($_SESSION['idUsuario'])){
                            $item = 'usuario_id';
                            $valor = $_SESSION['idUsuario'];
                            $deseos = ControladorProductos::ctrConsultarDeseos($item, $valor);
                            echo '<li><a href="'.$url.'deseos" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">'.count($deseos).'</span></a></li>';
                        }
                    ?>
                    <?php if(isset($_SESSION['idUsuario'])){ 
                        $item = 'usuario_id';
                        $valor = $_SESSION['idUsuario'];
                        $carrito = ControladorProductos::ctrConsultarCarrito($item, $valor);
                        $count_cart = count($carrito);
                        $sub = 0;
                        if($count_cart > 0){
                            foreach($carrito as $cart){
                                $sub += ($cart['oferta']) ? $cart['oferta'] : $cart['precio'];
                            }
                        }

                    ?>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count"><?php echo $count_cart; ?></span><span class="amount"><span class="currency_symbol">$</span><?php echo $sub ?></span></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <?php
                                    $subtotal = 0;
                                    if($count_cart > 0){
                                        foreach($carrito as $cart){
                                            echo '<li>
                                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                                    <a href="#"><img src="'.$url.'assets/images/productos/'.(($cart['imagen'] != '') ? $cart['imagen'] : 'no-imagen.png').'" alt="cart_thumb1" style="height: 80px;">'.$cart['nombre'].'</a>
                                                    <span class="cart_quantity"> '.$cart['cantidad'].' x <span class="cart_amount"> <span class="price_symbole">$</span></span>'.(($cart['oferta']) ? number_format($cart['oferta']) : number_format($cart['precio']) ).'</span>
                                                </li>';
                                            $subtotal += (($cart['oferta']) ? $cart['oferta'] : $cart['precio']);
                                        }
                                    }
                                ?>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span><?php echo number_format($subtotal); ?></p>
                                <p class="cart_buttons"><a href="<?php echo $url.'carrito'; ?>" class="btn btn-fill-line view-cart">Carrito</a><a href="<?php echo $url.'checkout'; ?>" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
    	<div class="custom-container">
            <div class="row"> 
            	
                <div class="col-sm-12 ">
                	<nav class="navbar navbar-expand-lg">
                    	<button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false"> 
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div> 
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
							<ul class="navbar-nav">
                                <li><a class="nav-link nav_item" href="<?php echo $url; ?>">Home</a></li> 
                                <li><a class="nav-link nav_item" href="<?php echo $url.'productos'; ?>">Productos</a></li> 
                                <?php if(isset($_SESSION['idUsuario'])){ ?>
                                <li><a class="nav-link nav_item" href="<?php echo $url.'deseos'; ?>">Deseos</a></li> 
                                <li><a class="nav-link nav_item" href="<?php echo $url.'checkout'; ?>">Checkout</a></li> 
                                <?php } ?>
                                <li><a class="nav-link nav_item" href="<?php echo $url; ?>">Contáctanos</a></li> 
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <!-- <i class="linearicons-phone-wave"></i>
                            <span>123-456-7689</span> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->
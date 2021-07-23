<!-- START HEADER-ADMIN -->
<header class="header_wrap">
    <div class="middle-header dark_skin" style="background: #fff; ">
    	<div class="custom-container">
            <div class="nav_block d-flex align-items-center" style="justify-content: space-between;">

                <!-- LOGO -->
                <a class="navbar-brand" href="<?php echo $url; ?>">
                    <img class="logo_light" src="<?php echo $url.'assets/images/LOGO.png'?>" alt="logo" />
                    <img class="logo_dark" src="<?php echo $url.'assets/images/LOGO.png'?>" alt="logo" />
                </a>
                
                <ul class="navbar-nav attr-nav align-items-center" style="margin: 0px;">

                    <li class="dropdown cart_dropdown" style="margin: 0px;">
                        <a href="http://localhost/app/cerrar" class="nav-link" style="margin: 0px;">
                        <i class="linearicons-home" style="font-size: 50px;"></i></a>
                    </li>

                    <li class="dropdown cart_dropdown" style="margin: 0px;">
                        <a href="./admin" class="nav-link cart_trigger" data-toggle="dropdown" style="margin: 0px;">
                        <i class="linearicons-menu" style="font-size: 50px;"></i></a>
                         
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right" style="height: 487%; box-shadow: 0 0 10px rgb(0 0 0 / 20%);">
                            <ul class="cart_list">
                                <?php 
                                if(isset($_SESSION['idUsuario'])){
                                    echo '<li>
                                            <a href="'.$url.'admin">dashboard</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'categorias">Categorias</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'detalle-productos">Detalles de productos</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'comercios">Comercios</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'publicidad">Publicidad</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'compras">Compras</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'configuracion">configuracion</a>
                                        </li>
                                        ';
                                }                               
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
             
            </div>
        </div>
    </div>
    <!-- 
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
                                <li><a class="nav-link nav_item" href="<?php echo $url; ?>">Inicio</a></li> 
                                <li><a class="nav-link nav_item" href="<?php echo $url.'productos'; ?>">Productos</a></li> 
                                <?php if(isset($_SESSION['idUsuario'])){ ?>
                                <li><a class="nav-link nav_item" href="<?php echo $url.'deseos'; ?>">Deseos</a></li> 
                                <li><a class="nav-link nav_item" href="<?php echo $url.'checkout'; ?>">Checkout</a></li> 
                                <?php } ?>
                                <li><a class="nav-link nav_item" href="<?php echo $url; ?>">Contáctanos</a></li> 
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span>123-456-7689</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div> 
    -->
</header>
<!-- END HEADER-ADMIN -->
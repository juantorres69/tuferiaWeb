<!-- START HEADER -->
<header class="header_wrap">
    <div class="middle-header dark_skin" style="background: #e3e3e3; ">
    	<div class="custom-container">
            <div class="nav_block d-flex align-items-center justify-content-center">
                <a class="navbar-brand" href="<?php echo $url; ?>">
                    <img class="logo_light" src="<?php echo $url.'assets/images/logo-feria.png'?>" alt="logo" />
                    <img class="logo_dark" src="<?php echo $url.'assets/images/logo-feria.png'?>" alt="logo" />
                </a>

                <!---->
                <!-- <div class="product_search_form rounded_input">
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
                </div> -->
                <ul class="navbar-nav attr-nav align-items-center">
                    <li class="dropdown cart_dropdown"><a href="#" class="nav-link"><i class="linearicons-user"></i></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <?php 
                                if(isset($_SESSION['idUsuario'])){
                                    echo '<li>
                                            <a href="'.$url.'perfil">Perfil</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'cerrar">Cerrar Sesión</a>
                                        </li>';
                                }else{
                                    echo '<li>
                                            <a href="'.$url.'login">Iniciar Sesión</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'registro">Registro</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'registro-comercio">Vende con Nosotros</a>
                                        </li>';
                                }                               
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- <div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
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
                            <i class="linearicons-phone-wave"></i>
                            <span>123-456-7689</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
</header>
<!-- END HEADER -->
<hr>
<!-- START HEADER-EXPOSITOR -->
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
                    <!-- HOME -->
                    <li class="dropdown cart_dropdown" style="margin: 0px;">
                        <a href="http://localhost/app/cerrar" class="nav-link" style="margin: 0px;">
                        <i class="linearicons-home" style="font-size: 50px;"></i></a>
                    </li>
                    <!-- OPCIONES -->
                    <li class="dropdown cart_dropdown" style="margin: 0px;">
                        <a href="./admin" class="nav-link cart_trigger" data-toggle="dropdown" style="margin: 0px;">
                        <i class="linearicons-menu" style="font-size: 50px;"></i></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right" style="height: 210%; box-shadow: 0 0 10px rgb(0 0 0 / 20%);">
                            <ul class="cart_list">
                                <?php 
                                if(isset($_SESSION['idUsuario'])){
                                    echo '<li>
                                            <a href="'.$url.'admin">Administrador</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'perfil">Perfil</a>
                                        </li>
                                        <li>
                                            <a href="'.$url.'productos">Productos</a>
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
</header>
<!-- END HEADER-EXPOSITOR -->
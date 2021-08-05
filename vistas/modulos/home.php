<!-- START MAIN CONTENT -->
<div class="main_content">    
    <!-- AUTOMATIC SLIDER -->
    <div class="slider">
        <ul>
            <li><img src="./vistas/assets/images/slider1.jpg" alt=""></li>
            <li><img src="./vistas/assets/images/slider2.jpg" alt=""></li>
            <li><img src="./vistas/assets/images/slider3.jpg" alt=""></li>
            <li><img src="./vistas/assets/images/slider4.jpg" alt=""></li>
        </ul>
    </div>
    <!-- END AUTOMATIC SLIDER -->
    <!-- HOME SECTION -->
    <div class="staggered-animation-wrap" style="margin-top: 15px;">
        <div class="custom-container">
            <div class="row">            
                <!-- CATEGORY -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-3" style="z-index: 100;">
                    <div class="categories_wrap">
                        <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn">
                            <i class="linearicons-menu"></i><span>Categorias </span>
                        </button>
                        <div id="navCatContent" class="nav_cat navbar collapse">
                            <ul> 
                                <?php 
                                    $categorias = ControladorProductos::ctrMostrarCategorias(null, null);
                                    foreach ($categorias as $key => $value) {
                                        if($key <= 8){
                                            echo '<li class="dropdown dropdown-mega-menu">
                                            <a class="dropdown-item nav-link dropdown-toggler drop-categoria" href="'.$value['ruta'].'" data-toggle="dropdown"><i class="'.$value['icono'].'"></i> <span>'.ucwords(mb_strtolower($value['categoria'])).'</span></a>
                                            <div class="dropdown-menu">
                                                <ul class=" d-lg-flex">
                                                    <li class=" col-lg-3">
                                                        <ul class="d-lg-flex">
                                                            <li class=" col-lg-3">
                                                                <ul> 
                                                                    <li class="dropdown-header">Sub Categorias</li>';
                                                                $item = "id_categoria";   
                                                                $valor = $value['id'];
                                                                $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item,$valor);
                                                                // var_dump($subcategorias);
                                                                foreach ($subcategorias as $key => $sub) {
                                                                    echo '<li><a class="dropdown-item nav-link nav_item" href="'.$sub['ruta'].'">'.$sub['subcategoria'].'</a></li>';
                                                                }
                                                                echo '</ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>';
                                        }
                                    }
                                ?>
                                <?php if(count($categorias) > 9){ echo count($categorias)?>    
                                    <li>
                                        <ul class="more_slide_open">
                                            <?php 
                                                foreach ($categorias as $key => $value) {
                                                    if($key > 8){
                                                        echo '<li class="dropdown dropdown-mega-menu">
                                                        <a class="dropdown-item nav-link dropdown-toggler drop-categoria" href="'.$value['ruta'].'" data-toggle="dropdown"><i class="'.$value['icono'].'"></i> <span>'.ucwords(strtolower($value['categoria'])).'</span></a>
                                                        <div class="dropdown-menu">
                                                            <ul class=" d-lg-flex">
                                                                <li class=" col-lg-3">
                                                                    <ul class="d-lg-flex">
                                                                        <li class=" col-lg-3">
                                                                            <ul> 
                                                                                <li class="dropdown-header">Sub Categorias</li>';
                                                                            $item = "id_categoria";   
                                                                            $valor = $value['id'];
                                                                            $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item,$valor);
                                                                            // var_dump($subcategorias);
                                                                            foreach ($subcategorias as $key => $sub) {
                                                                                echo '<li><a class="dropdown-item nav-link nav_item" href="'.$sub['ruta'].'">'.$sub['subcategoria'].'</a></li>';
                                                                            }           
                                                                            echo '</ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            
                                                            </ul>
                                                        </div>
                                                    </li>';
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                    <div class="more_categories">Mas Categorias</div>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END CATEGORY -->
            </div>
        </div>
    </div>
    <!-- END HOME SECTION -->
    <!-- SECTION SHOP -->
    <div class="section small_pt pb-0">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block"></div>
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading_tab_header heading_tab_header_" style="padding-top: 0px; margin-top: -39px;">
                                <div class="heading_s2 aj">
                                    <h4>Productos recientes </h4>
                                </div>
                                <div class="tab-style2">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                                        <span class="ion-android-menu"></span>
                                    </button>
                                    <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#nuevos" role="tab" aria-controls="arrival" aria-selected="true">Nuevos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#mas_vendidos" role="tab" aria-controls="sellers" aria-selected="false">Más Vendidos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab_slider">
                                <div class="tab-pane fade show active" id="nuevos" role="tabpanel" aria-labelledby="arrival-tab">
                                    <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                        <?php 
                                           $recientes = ControladorProductos::ctrConsultarRecientes(null, null, 10);
                                            if(count($recientes) > 0){
                                                foreach($recientes as $reciente){
                                                    echo '<div class="item">
                                                    <div class="product_wrap">
                                                        <div class="product_img" style="height: 236px;">
                                                            <a href="'.$reciente['ruta'].'">
                                                                <img src="'.$url.'assets/images/productos/'.(($reciente['imagen'] != '') ? $reciente['imagen'] : 'no-imagen.png').'" alt="el_img1">
                                                                <img class="product_hover_img" src="'.$url.'assets/images/productos/'.(($reciente['imagen'] != '') ? $reciente['imagen'] : 'no-imagen.png').'" alt="el_hover_img1">
                                                            </a>
                                                            <div class="product_action_box">
                                                                <ul class="list_none pr_action_btn"> 

                                                                    <li class="add-to-cart"> <!-- este lleva a los detalles de el producto --> 
                                                                        <a href="'.$reciente['ruta'].'">
                                                                            <i class="icon-basket-loaded"></i> 
                                                                        Añadir al Carrito</a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="deseos/'.$reciente['id'].'">
                                                                            <i class="icon-heart"></i>
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product_info">
                                                            <h6 class="product_title"><a href="'.$reciente['ruta'].'">'.$reciente['nombre'].'</a></h6>
                                                            <div class="product_price">
                                                                <span class="price">$'.(($reciente['oferta']) ? number_format($reciente['oferta']) : number_format($reciente['precio']) ).'</span>
                                                                <del>'.(($reciente['oferta']) ? '$'.number_format($reciente['precio']) : '' ).'</del>
                                                                <div class="on_sale">
                                                                    <span>'.(($reciente['oferta']) ? floor(100-($reciente['oferta']*100)/$reciente['precio']).'% Off' : '' ).'</span>
                                                                </div>
                                                            </div>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:'.($reciente['rating'] > 0 ? ($reciente['rating'] /$reciente['total_votos'])*20 : 0) .'%"></div>
                                                                </div>
                                                                <span class="rating_num">('.$reciente['total_votos'].')</span>
                                                            </div>
                                                            <div class="pr_desc">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
    <!-- ASSOCIATED SEGMENT --> 
    <div class="small_pt" >
        <div class="custom-container">
            <div class="row">
                <?php 
                    $promos = ControladorHome::ctrConsultarPromos(); // el enlace no se lleva al lugar correcto 
                    foreach($promos as $promo){
                        echo '<div class="col-md-4" style="padding: 0px 10px 20px">
                                <div class="sale-banner hover_effect1" style="height: 220px; background-image: url('.$url.'vistas/assets/images/promos/'.$promo['imagen'].'); background-size: cover;display: flex; align-items: center;">
                                    <a style="z-index: 999;" href="'.$url.$promo['link'].'"> 
                                        <h5 style="color: #fff; text-shadow: -1px -1px 5px #000, 1px 1px 5px #000, -1px 1px 5px #000, 1px -1px 5px #000;">'.$promo['subtitulo'].'</h5>
                                        <h2 style="color: #fff; text-shadow: -1px -1px 5px #000, 1px 1px 5px #000, -1px 1px 5px #000, 1px -1px 5px #000; font-weight: bolder; font-size: 30pt;">'.$promo['titulo'].'</h2>
                                        <span style="color: #fff; text-shadow: -1px -1px 5px #000, 1px 1px 5px #000, -1px 1px 5px #000, 1px -1px 5px #000;">'.$promo['link_texto'].'</span>
                                    </a>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- END ASSOCIATED SEGMENT -->
    <!-- FEATURED PRODUCTOS -->
    <div class="small_pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="" style="margin-bottom: 20px;">
                        <div class="heading_s2">
                            <h2>Productos destacados</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product_slider product_list carousel_slider owl-carousel owl-theme nav_style3" data-loop="true" data-dots="false" data-nav="true" data-autoplay="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "767":{"items": "2"}, "991":{"items": "3"}, "1199":{"items": "3"}}'>
                        <?php 
                        $destacados = ControladorProductos::ctrConsultarDestacados(null, null, 20);
                        if(count($destacados) > 0){
                            $cant = count($destacados);
                            $items = round($cant / 3);
                            for ($i=1; $i <= $items; $i++) { ?>
                                <div class="item"> <?php
                                    $start = ($i * 3) - 3;
                                    $limit = $i * 3;
                                    foreach ($destacados as $key => $destacado) {
                                        if($key >= $start && $key < $limit){
                                            echo '<div class="product">
                                                <div class="product_img">
                                                    <a href="'.$destacado['ruta'].'">
                                                        <img src="'.$url.'assets/images/productos/'.(($destacado['imagen'] != '') ? $destacado['imagen'] : 'no-imagen.png').'" alt="">
                                                    </a>
                                                </div>
                                                <div class="product_info">
                                                    <h6 class="product_title"><a href="'.$destacado['ruta'].'">'.$destacado['nombre'].'</a></h6>
                                                    <div class="product_price">
                                                        <span class="price">$'.(($destacado['oferta']) ? number_format($destacado['oferta']) : number_format($destacado['precio']) ).'</span>
                                                        <del>'.(($destacado['oferta']) ? '$'.number_format($destacado['precio']) : '' ).'</del>
                                                        <div class="on_sale">
                                                            <span>'.(($destacado['oferta']) ? round((100-($destacado['oferta']*100)/$destacado['precio'])).'% Off' : '' ).'</span>
                                                        </div>
                                                    </div>
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:'.($destacado['total_votos'] > 0 ? ($destacado['rating']/$destacado['total_votos'])*20 : 0).'%"></div>
                                                        </div>
                                                        <span class="rating_num">('.$destacado['total_votos'].')</span>
                                                    </div>
                                                </div>
                                            </div>';
                                        }else{
                                            continue;
                                        }   
                                    }?>
                                </div><?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END FEATURED PRODUCTS -->
    <!-- ADVERTISING BANNER -->
    <?php 
    $banners = ControladorHome::ctrConsultarBanners();
    ?>
    <div class="col-lg-9" style="padding: 0px; max-width: 100%; margin: 20px 0px 0px;">
        <div class="banner_section shop_el_slider">
            <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
                <div class="carousel-inner">
                    <?php 
                        foreach($banners as $banner){
                            echo '<div class="carousel-item '.(($banner['orden'] == 1) ? 'active' : '' ).' background_bg" data-img-src="'.$url.'vistas/assets/images/banners/'.$banner['imagen'].'">
                            <div class="banner_slide_content banner_content_inner">
                                <div class="col-lg-7 col-10">
                                    <div class="banner_content3 overflow-hidden">
                                        <h5 class="staggered-animation mb-3" data-animation="slideInLeft" data-animation-delay="0.5s" style="color: #fff; text-shadow: -1px -1px 5px #000, 1px 1px 5px #000, -1px 1px 5px #000, 1px -1px 5px #000;">'.$banner['subtitulo'].'</h5>
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s" style="color: #fff !important; text-shadow: -1px -1px 5px #000, 1px 1px 5px #000, -1px 1px 5px #000, 1px -1px 5px #000 !important;">'.$banner['titulo'].'</h2>
                                        <h4 class="staggered-animation mb-4 product-price" data-animation="slideInLeft" data-animation-delay="0.5s"><span style="font-size: 2rem; color: #fff;text-shadow: -1px -1px 5px #000, 1px 1px 5px #000, -1px 1px 5px #000, 1px -1px 5px #000;" >$'.number_format($banner['oferta']).'</span><del style="color: #fff;text-shadow: -1px -1px 5px #000, 1px 1px 5px #000, -1px 1px 5px #000, 1px -1px 5px #000;">'.(($banner['precio']) ? '$'.number_format($banner['precio']) : '' ).'</del></h4>
                                        <a class="btn btn-radius staggered-animation text-uppercase" style="background-color: #ef7236; color: #fff;"  href="'.$url.$banner['link'].'" data-animation="slideInLeft" data-animation-delay="0.5s">'.$banner['link_texto'].'</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        }
                    ?>
                </div>
                <ol class="carousel-indicators indicators_style3">
                    <?php
                    $i = 0;
                    foreach($banners as $banner){
                        echo '<li data-target="#carouselExampleControls" data-slide-to="'.$i.'" '.(($banner['orden'] == 1) ? 'class="active"' : '' ).'></li>';
                        $i++;
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>
    <!-- END ADVERTISING BANNER -->
    <!-- START SECTION CLIENT LOGO -->
    <div>
        <div class="custom-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aj2" style="margin: 20px 0px;">
                        <div class="heading_s2">
                            <h4>Logos de emprendimiento</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}, "1199":{"items": "6"}}'>
                        <div class="item">
                            <div class="cl_logo">
                                <img src="<?php echo $url; ?>vistas/assets/images/cl_logo1.png" alt="cl_logo"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="cl_logo">
                                <img src="<?php echo $url; ?>vistas/assets/images/cl_logo2.png" alt="cl_logo"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="cl_logo">
                                <img src="<?php echo $url; ?>vistas/assets/images/cl_logo3.png" alt="cl_logo"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="cl_logo">
                                <img src="<?php echo $url; ?>vistas/assets/images/cl_logo4.png" alt="cl_logo"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="cl_logo">
                                <img src="<?php echo $url; ?>vistas/assets/images/cl_logo5.png" alt="cl_logo"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="cl_logo">
                                <img src="<?php echo $url; ?>vistas/assets/images/cl_logo6.png" alt="cl_logo"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="cl_logo">
                                <img src="<?php echo $url; ?>vistas/assets/images/cl_logo7.png" alt="cl_logo"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CLIENT LOGO -->
    <?php include "suscribase.php" ?>
</div>
<!-- END MAIN CONTENT -->
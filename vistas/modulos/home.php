<!-- START MAIN CONTENT -->
<div class="main_content">    
    <!-- START SECTION BANNER -->
    <div class="mt-4 staggered-animation-wrap">
        <div class="custom-container">
            <div class="row">
                <!-- categorias menu -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <!-- Seccion categorias -->
                    
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
                <?php 
                $banners = ControladorHome::ctrConsultarBanners();
                
                ?>
                <div class="col-lg-9 ">
                    <div class="banner_section shop_el_slider">
                        <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php 
                                foreach($banners as $banner){
                                    echo '<div class="carousel-item '.(($banner['orden'] == 1) ? 'active' : '' ).' background_bg" data-img-src="'.$url.'vistas/assets/images/banners/'.$banner['imagen'].'">
                                    <div class="banner_slide_content banner_content_inner">
                                        <div class="col-lg-7 col-10">
                                            <div class="banner_content3 overflow-hidden">
                                                <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">'.$banner['subtitulo'].'</h5>
                                                <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">'.$banner['titulo'].'</h2>
                                                <h4 class="staggered-animation mb-4 product-price" data-animation="slideInLeft" data-animation-delay="1.2s"><span class="price">$'.number_format($banner['oferta']).'</span><del>'.(($banner['precio']) ? '$'.number_format($banner['precio']) : '' ).'</del></h4>
                                                <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="'.$url.$banner['link'].'" data-animation="slideInLeft" data-animation-delay="1.5s">'.$banner['link_texto'].'</a>
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
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
    <!-- START SECTION SHOP -->
    <div class="section small_pt pb-0">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <?php 
                    $mega = ControladorHome::ctrConsultarMegaPromo();
                    echo '<div class="sale-banner hover_effect1" style="background-image: url('.$url.'vistas/assets/images/promos/'.$mega['imagen'].');">
                            <a  href="'.$url.$mega['link'].'">
                                <h3>'.$mega['titulo'].'</h3>
                                <h4>'.$mega['subtitulo'].'</h4>
                                <button>'.$mega['link_texto'].'</button>
                            </a>
                        </div>';
                    ?>
                </div>
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading_tab_header">
                                <div class="heading_s2">
                                    <h4>Productos Exclusivos</h4>
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
                                            $recientes = ControladorProductos::ctrConsultarRecientes(null, null, 8);
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
                                                                    <li class="add-to-cart"><a href="'.$reciente['ruta'].'"><i class="icon-basket-loaded"></i> Añadir al Carrito</a></li>
                                                                    <li><a href="deseos/'.$reciente['id'].'"><i class="icon-heart"></i></a></li>
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
                                <div class="tab-pane fade" id="mas_vendidos" role="tabpanel" aria-labelledby="sellers-tab">
                                    <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                    <?php 
                                            $recientes = ControladorProductos::ctrConsultarMasVendidos(null, null, 8);
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
                                                                    <li class="add-to-cart"><a href="'.$reciente['ruta'].'"><i class="icon-basket-loaded"></i> Añadir al Carrito</a></li>
                                                                    <li><a href="deseos/'.$reciente['id'].'"><i class="icon-heart"></i></a></li>
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
                                                                    <div class="product_rate" style="width:'.($reciente['total_votos'] > 0 ?($reciente['rating']/$reciente['total_votos'])*20 : 0 ) .'%"></div>
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

    <!-- START SECTION BANNER --> 
    <div class="section pb_20 small_pt">
        <div class="custom-container">
            <div class="row">
                <?php 
                $promos = ControladorHome::ctrConsultarPromos();
                foreach($promos as $promo){
                    echo '<div class="col-md-4">
                            <div class="sale-banner mb-3 mb-md-4 hover_effect1" style="height: 220px; background-image: url('.$url.'vistas/assets/images/promos/'.$promo['imagen'].'); background-size: cover;display: flex; align-items: center;padding: 20px;">
                                <a style="z-index: 999;" href="'.$url.$promo['link'].'">
                                    <h5>'.$promo['subtitulo'].'</h5>
                                    <h2 style="font-weight: bolder; font-size: 30pt;">'.$promo['titulo'].'</h2>
                                    <span style="color: red;">'.$promo['link_texto'].'</span>
                                </a>
                            </div>
                        </div>';
                }
                ?>
                <!-- <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="#">
                            <img src="<?php echo $url; ?>vistas/assets/images/shop_banner_img7.jpg" alt="shop_banner_img7">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="#">
                            <img src="<?php echo $url; ?>vistas/assets/images/shop_banner_img8.jpg" alt="shop_banner_img8">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="#">
                            <img src="<?php echo $url; ?>vistas/assets/images/shop_banner_img9.jpg" alt="shop_banner_img9">
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER --> 


    <!-- START SECTION SHOP -->
    <!-- <div class="section small_pt small_pb">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="sale-banner">
                        <a class="hover_effect1" href="#">
                            <img src="<?php echo $url; ?>vistas/assets/images/shop_banner_img10.jpg" alt="shop_banner_img10">
                        </a>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="heading_tab_header">
                                <div class="heading_s2">
                                    <h4>Trending products</h4>
                                </div>
                                <div class="view_all">
                                    <a href="#" class="text_default"><i class="linearicons-power"></i> <span>View All</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="<?php echo $url; ?>vistas/assets/images/el_img2.jpg" alt="el_img2">
                                                <img class="product_hover_img" src="<?php echo $url; ?>vistas/assets/images/el_hover_img2.jpg" alt="el_hover_img2">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="shop-product-detail.html">Smart Watch External</a></h6>
                                            <div class="product_price">
                                                <span class="price">$55.00</span>
                                                <del>$95.00</del>
                                                <div class="on_sale">
                                                    <span>25% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:68%"></div>
                                                </div>
                                                <span class="rating_num">(15)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="<?php echo $url; ?>vistas/assets/images/el_img5.jpg" alt="el_img5">
                                                <img class="product_hover_img" src="<?php echo $url; ?>vistas/assets/images/el_hover_img5.jpg" alt="el_hover_img5">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="shop-product-detail.html">Smart Televisions</a></h6>
                                            <div class="product_price">
                                                <span class="price">$45.00</span>
                                                <del>$55.25</del>
                                                <div class="on_sale">
                                                    <span>35% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="<?php echo $url; ?>vistas/assets/images/el_img9.jpg" alt="el_img9">
                                                <img class="product_hover_img" src="<?php echo $url; ?>vistas/assets/images/el_hover_img9.jpg" alt="el_hover_img9">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="shop-product-detail.html">oppo Reno3 Pro</a></h6>
                                            <div class="product_price">
                                                <span class="price">$68.00</span>
                                                <del>$99.00</del>
                                                <div class="on_sale">
                                                    <span>20% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:87%"></div>
                                                </div>
                                                <span class="rating_num">(25)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="<?php echo $url; ?>vistas/assets/images/el_img7.jpg" alt="el_img7">
                                                <img class="product_hover_img" src="<?php echo $url; ?>vistas/assets/images/el_hover_img7.jpg" alt="el_hover_img7">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="shop-product-detail.html">Audio Theaters</a></h6>
                                            <div class="product_price">
                                                <span class="price">$45.00</span>
                                                <del>$55.25</del>
                                                <div class="on_sale">
                                                    <span>35% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="<?php echo $url; ?>vistas/assets/images/el_img5.jpg" alt="el_img5">
                                                <img class="product_hover_img" src="<?php echo $url; ?>vistas/assets/images/el_hover_img5.jpg" alt="el_hover_img5">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="shop-product-detail.html">Smart Televisions</a></h6>
                                            <div class="product_price">
                                                <span class="price">$45.00</span>
                                                <del>$55.25</del>
                                                <div class="on_sale">
                                                    <span>35% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="<?php echo $url; ?>vistas/assets/images/el_img12.jpg" alt="el_img12">
                                                <img class="product_hover_img" src="<?php echo $url; ?>vistas/assets/images/el_hover_img12.jpg" alt="el_hover_img12">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="shop-product-detail.html">Sound Equipment for Low</a></h6>
                                            <div class="product_price">
                                                <span class="price">$45.00</span>
                                                <del>$55.25</del>
                                                <div class="on_sale">
                                                    <span>35% Off</span>
                                                </div>
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
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
    </div> -->
    <!-- END SECTION SHOP -->
    <div class="section small_pt pb_20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h2>Productos Destacados</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product_slider product_list carousel_slider owl-carousel owl-theme nav_style3" data-loop="true" data-dots="false" data-nav="true" data-autoplay="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "767":{"items": "2"}, "991":{"items": "3"}, "1199":{"items": "3"}}'>
                        <?php 
                        $destacados = ControladorProductos::ctrConsultarDestacados(null, null, 18);
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

    <!-- START SECTION CLIENT LOGO -->
    <div class="section pt-0 small_pb">
        <div class="custom-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>Our Brands</h4>
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

</div>
<!-- END MAIN CONTENT -->


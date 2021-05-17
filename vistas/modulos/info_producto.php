<?php
    $item = 'ruta';
    $rutas = explode('/', $_GET['ruta']);
    
        $valor = $rutas[0];
        $rutas_bc = $rutas[0];
        $desc_bc = $rutas[0];

    $producto = ControladorProductos::ctrDetalleProducto($item, $valor);
    $item = 'producto_id';
    $valor = $producto['id'];
    $imagenes = ControladorProductos::ctrConsultarImagenes($item, $valor);
?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1><?php echo $producto['nombre']; ?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo $producto['nombre']; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
    	<div class="row">
        	<div class="col-xl-9 col-lg-8">
				<div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
						<div class="product-image">
                            <div class="product_img_box">
                                <img id="product_img" src='<?php echo $url.'assets/images/productos/'.((count($imagenes) > 0) ? $imagenes[0]['imagen'] : 'no-imagen.png'); ?>' data-zoom-image="<?php echo $url.'assets/images/productos/'.((count($imagenes) > 0) ? $imagenes[0]['imagen'] : 'no-imagen.png'); ?>" alt="product_img1" />
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                <?php 
                                    foreach($imagenes as $imagen){
                                        echo '<div class="item">
                                                <a href="#" class="product_gallery_item" data-image="'.$url.'assets/images/productos/'.$imagen['imagen'].'" data-zoom-image="'.$url.'assets/images/productos/'.$imagen['imagen'].'">
                                                    <img src="'.$url.'assets/images/productos/'.$imagen['imagen'].'" />
                                                </a>
                                            </div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title"><a href="#"><?php echo $producto['nombre']; ?></a></h4>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="product_price">
                                            <span class="price">$<?php echo (($producto['oferta']) ? number_format($producto['oferta']) : number_format($producto['precio']) ); ?></span>
                                            <del><?php echo (($producto['oferta']) ? '$'.number_format($producto['precio']) : '' ); ?></del>
                                            <div class="on_sale">
                                                <span><?php echo (($producto['oferta']) ? (100-($producto['oferta']*100)/$producto['precio']).'% Off' : '' ); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:<?php echo (($producto['rating']/$producto['total_votos'])*20); ?>%"></div>
                                                </div>
                                                <span class="rating_num">(<?php echo $producto['total_votos']; ?>)</span>
                                            </div>
                                    </div>
                                </div>
                                <div class="pr_desc">
                                    <p><?php echo $producto['descripcion_corta']; ?></p>
                                </div>
                                <div class="product_sort_info">
                                    <ul>
                                        <li><i class="linearicons-shield-check"></i><?php echo $producto['garantia']; ?> de Garantía</li>
                                        <?php echo (($producto['tipo'] == 'fisico') ? '<li><i class="linearicons-sync"></i> '.$producto['devolucion_dinero'].' dias para devolución de dinero </li>' : '' ) ?>
                                        <?php echo (($producto['contra_entrega']) ? '<li><i class="linearicons-bag-dollar"></i> Disponible pago contra entrega.</li>' : '' ) ?>
                                    </ul>
                                </div>
                                <?php 
                                    $colores = ControladorProductos::ctrMostrarColores(null, $producto['id']);
                                    if(count($colores) > 0){
                                ?>
                                <div class="pr_switch_wrap">
                                    <span class="switch_lable">Color</span>
                                    <div class="product_color_switch" id="color_switch">
                                        <?php 
                                            foreach($colores as $color){
                                                echo '<span data-id="'.$color['id'].'" data-color="'.$color['hex'].'"></span>';
                                            } 
                                        ?>
                                    </div>
                                </div>
                                <?php 
                                    }
                                    $tallas = ControladorProductos::ctrMostrarTallas(null, $producto['id']);
                                    if(count($tallas) > 0){
                                ?>
                                <div class="pr_switch_wrap">
                                    <span class="switch_lable">Talla</span>
                                    <div class="product_size_switch" id="talla_switch">
                                        <?php 
                                            
                                            foreach($tallas as $talla){
                                                echo '<span data-id="'.$talla['id'].'">'.$talla['descripcion'].'</span> ';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <hr />
                            <div class="cart_extra">
                                <div class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" id="cantidad" value="1" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div>
                                <div class="alert alert-danger" role="alert" id="alertCarrito" style="display: none;">
                                    Debe seleccionar la talla y el color.
                                </div>
                                <div class="cart_btn">
                                    <input type="hidden" id="hdProducto" value="<?php echo $producto['id']; ?>">
                                    <button class="btn btn-fill-out btn-addtocart btnIngreso" type="button" onclick="agregarCarrito('<?php echo $url; ?>')"><i class="icon-basket-loaded"></i> Agregar al Carrito</button>
                                    <!-- <a class="add_compare" href="#"><i class="icon-shuffle"></i></a> -->
                                    <a class="add_wishlist" href="<?php echo $url.'deseos/'.$producto['id']; ?>"><i class="icon-heart"></i></a>
                                </div>
                            </div>
                            <hr />
                            <ul class="product-meta">
                                <li>SKU: <a href="#"><?php echo $producto['sku']; ?></a></li>
                                <li>Categoria: <a href="<?php echo $url.$producto['categoria_ruta']; ?>"><?php echo $producto['categoria']; ?></a></li>
                                <?php 
                                    $item = 'producto_id';
                                    $valor = $producto['id'];
                                    $tags = ControladorProductos::ctrConsultarTags($item, $valor);
                                    $tags_str = '';
                                    foreach($tags as $tag){
                                        $tags_str .= '<a href="'.$url.'tags/'.$tag['ruta'].'">'.$tag['descripcion'].'</a>, ';
                                    }
                                ?>
                                <li>Tags: <?php echo substr($tags_str, 0, -2); ?> </li>
                            </ul>
                            
                            <div class="product_share">
                                <!-- <span>Share:</span>
                                <ul class="social_icons">
                                    <div class="fb-share-button" data-href="http://app.tuferiavirtual.co" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fapp.tuferiavirtual.co%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
        		<div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Descripción</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Ficha Técnica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (2)</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    <p><?php echo $producto['descripcion_larga']; ?></p>
                                </div>
                                <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                    <?php 
                                        $item = 'producto_id';
                                        $valor = $producto['id'];
                                        $fichas = ControladorProductos::ctrConsultarFicha($item, $valor);
                                    ?>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php 
                                            foreach($fichas as $ficha) {
                                                echo '<tr><td>'.$ficha['descripcion'].'</td><td>'.$ficha['valor'].'</td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <div class="comments">
                                        <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                                        <ul class="list_none comment_list mt-4">
                                            <li>
                                                <div class="comment_img">
                                                    <img src="assets/images/user1.jpg" alt="user1"/>
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:80%"></div>
                                                        </div>
                                                    </div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">Alea Brooks</span>
                                                        <span class="comment-date">March 5, 2018</span>
                                                    </p>
                                                    <div class="description">
                                                        <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="comment_img">
                                                    <img src="assets/images/user2.jpg" alt="user2"/>
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating_wrap">
                                                        <div class="rating">
                                                            <div class="product_rate" style="width:60%"></div>
                                                        </div>
                                                    </div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">Grace Wong</span>
                                                        <span class="comment-date">June 17, 2018</span>
                                                    </p>
                                                    <div class="description">
                                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="review_form field_form">
                                        <h5>Add a review</h5>
                                        <form class="row mt-3">
                                            <div class="form-group col-12">
                                                <div class="star_rating">
                                                    <span data-value="1"><i class="far fa-star"></i></span>
                                                    <span data-value="2"><i class="far fa-star"></i></span> 
                                                    <span data-value="3"><i class="far fa-star"></i></span>
                                                    <span data-value="4"><i class="far fa-star"></i></span>
                                                    <span data-value="5"><i class="far fa-star"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <textarea required="required" placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                             </div>
                                            <div class="form-group col-md-6">
                                                <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                                            </div>
                                           
                                            <div class="form-group col-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        		<div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider"></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
        		<div class="row">
                    <div class="col-12">
                        <div class="heading_s1">
                            <h3>Releted Products</h3>
                        </div>
                        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "992":{"items": "2"}, "1199":{"items": "3"}}'>
                            <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="assets/images/product_img1.jpg" alt="product_img1">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="shop-product-detail.html">Blue Dress For Woman</a></h6>
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
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#87554B"></span>
                                                <span data-color="#333333"></span>
                                                <span data-color="#DA323F"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="assets/images/product_img2.jpg" alt="product_img2">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="shop-product-detail.html">Lether Gray Tuxedo</a></h6>
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
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#847764"></span>
                                                <span data-color="#0393B5"></span>
                                                <span data-color="#DA323F"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product">
                                    <span class="pr_flash">New</span>
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="assets/images/product_img3.jpg" alt="product_img3">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="shop-product-detail.html">woman full sliv dress</a></h6>
                                        <div class="product_price">
                                            <span class="price">$68.00</span>
                                            <del>$99.00</del>
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
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#333333"></span>
                                                <span data-color="#7C502F"></span>
                                                <span data-color="#2F366C"></span>
                                                <span data-color="#874A3D"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="assets/images/product_img4.jpg" alt="product_img4">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="shop-product-detail.html">light blue Shirt</a></h6>
                                        <div class="product_price">
                                            <span class="price">$69.00</span>
                                            <del>$89.00</del>
                                            <div class="on_sale">
                                                <span>20% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:70%"></div>
                                            </div>
                                            <span class="rating_num">(22)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#333333"></span>
                                                <span data-color="#A92534"></span>
                                                <span data-color="#B9C2DF"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="assets/images/product_img5.jpg" alt="product_img5">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="//bestwebcreator.com/shopping-zone/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="shop-product-detail.html">blue dress for woman</a></h6>
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
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#87554B"></span>
                                                <span data-color="#333333"></span>
                                                <span data-color="#5FB7D4"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-4 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">
                	<?php require_once 'categorias_sidebar.php'; ?>
                    <div class="widget">
                        <h5 class="widget_title">Productos Recientes</h5>
                        <ul class="widget_recent_post">
                            <?php 
                                $recientes = ControladorProductos::ctrConsultarRecientes(null, null, 3);
                                // print_r($recientes);
                                foreach($recientes as $reciente){
                                    echo '<li>
                                            <div class="post_img">
                                                <a href="#"><img src="'.$url.'assets/images/productos/'.(($reciente['imagen'] != '') ? $reciente['imagen'] : 'no-imagen.png').'" alt="shop_small1"></a>
                                            </div>
                                            <div class="post_content">
                                                <h6 class="product_title"><a href="'.$url.$reciente['ruta'].'">'.$reciente['nombre'].'</a></h6>
                                                <div class="product_price"><span class="price">$'.(($reciente['oferta']) ? number_format($reciente['oferta']) : number_format($reciente['precio']) ).'</span><del>'.(($reciente['oferta']) ? '$'.number_format($reciente['precio']) : '' ).'</del></div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:'.($reciente['total_votos'] > 0 ? ($reciente['rating']/$reciente['total_votos'])*20 : 0).'%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">tags</h5>
                        <div class="tags">
                            <?php 
                                $item = 'estado';
                                $valor = 1;
                                $tags = ControladorTags::ctrConsultarTags($item, $valor);
                                foreach($tags as $tag){
                                    echo '<a href="'.$url.'tags/'.$tag['ruta'].'">'.$tag['descripcion'].'</a> ';
                                }
                            ?>
                        </div>
                    </div>
                    <!-- <div class="widget">
                        <div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img src="assets/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
                            </div> 
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
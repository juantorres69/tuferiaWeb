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
<!-- SECTION PRODUCT INFORMATION -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">

            <!-- TITTLE -->
        	<div class="col-md-6">
                <div class="page-title">
            		<h1><?php echo $producto['nombre']; ?></h1>
                </div>
            </div>

            <!-- ROUTE -->
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active"><?php echo $producto['nombre']; ?></li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- SECTION INFORMATION -->
<div class="section">
	<div class="container">
    	<div>
        	<div>
				<div class="row">

                    <!-- PRODUCT IMAGE -->
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
						<div class="product-image">

                            <div class="product_img_box">
                                <img id="product_img" src='<?php echo $url.'assets/images/productos/'.((count($imagenes) > 0) ? $imagenes[0]['imagen'] : 'no-imagen.png'); ?>' data-zoom-image="<?php echo $url.'assets/images/productos/'.((count($imagenes) > 0) ? $imagenes[0]['imagen'] : 'no-imagen.png'); ?>" alt="product_img1" />
                                <a href="#" class="product_img_zoom" title="Zoom"><span class="linearicons-zoom-in"></span></a>
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

                    <!-- PRODUCT DETAILS -->
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">

                                <!-- PRODUCT NAME -->
                                <h4 class="product_title"><a href="#"><?php echo $producto['nombre']; ?></a></h4>

                                <!-- DESCRIPTION -->
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

                            <!-- OPCION -->
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
                                    <a class="add_wishlist" href="<?php echo $url.'deseos/'.$producto['id']; ?>"><i class="icon-heart"></i></a>
                                </div>

                            </div>

                            <hr/>

                            <!-- PRODUCT CATEGORY -->
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
                            
                        </div>
                    </div>
                </div>

                <!-- COMMENTS -->
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">

                            <!-- SEGMENTS -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Descripción</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Ficha Técnica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reseñas</a>
                                </li>
                            </ul>

                            <!-- CONTENTS -->
                            <div class="tab-content shop_info_tab">
                                
                                <!-- DESCRIPTION -->
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    <p><?php echo $producto['descripcion_larga']; ?></p>
                                </div>

                                <!-- DATA SHEET -->
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

                                <!-- REVIEWS -->
                                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <div class="comments">

                                        <!-- TITTLE -->
                                        <h5 class="product_tab_title">Reseñas de <span>usuarios</span></h5>

                                        <!-- LIST -->
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
                                        </ul>
                                    </div>

                                    <div class="review_form field_form">

                                        <!-- TITTLE -->
                                        <h5>Agregar una reseña</h5>
                                        
                                        <!-- FORMULARIO -->
                                        <form class="row mt-3">

                                            <!-- STARS -->
                                            <div class="form-group col-12">
                                                <div class="star_rating">
                                                    <span data-value="1"><i class="far fa-star"></i></span>
                                                    <span data-value="2"><i class="far fa-star"></i></span> 
                                                    <span data-value="3"><i class="far fa-star"></i></span>
                                                    <span data-value="4"><i class="far fa-star"></i></span>
                                                    <span data-value="5"><i class="far fa-star"></i></span>
                                                </div>
                                            </div>

                                            <!-- REVIEW DATA -->
                                            <div class="form-group col-12">
                                                <textarea required="required" placeholder="Añade tu reseña" class="form-control" name="message" rows="4"></textarea>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <input required="required" placeholder="Añade tu nombre" class="form-control" name="name" type="text">
                                             </div>

                                            <div class="form-group col-md-6">
                                                <input required="required" placeholder="Añade tu email" class="form-control" name="email" type="email">
                                            </div>
                                            <!-- BUTTON -->
                                            <div class="form-group col-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Enviar opinión</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- DIVIDER -->
        		<div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                    </div>
                </div>

                <div class="">
                    <div class="sidebar">

                        <div class="widget">
                            <!-- TITTLE -->
                            <h5 class="widget_title">Productos Recientes</h5>

                            <!-- LIST -->
                            <ul class="widget_recent_post">

                                <?php 
                                    $recientes = ControladorProductos::ctrConsultarRecientes(null, null, 5);
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

                        <!-- TAG -->
                        <div class="widget">
                            <h5 class="widget_title">Etiqueta</h5>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PRODUCT INFORMATION -->
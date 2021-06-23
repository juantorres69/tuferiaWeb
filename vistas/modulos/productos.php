<!-- SECTION PRODUCT -->
<div class="section">
	<div class="container">
    	<div class="row">
            <!-- RIGHT -->
			<div class="col-lg-9">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">

                            <div class="product_header_left">
                                <!-- <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="order">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div> -->
                            </div>

                            <div class="product_header_right">

                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list "><i class="ti-layout-list-thumb"></i></a>
                                </div>

                                <div class="custom_select">
                                    <select class="form-control form-control-sm" id="cbMostrar">
                                        <option value="">Mostrar</option>
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                echo '<input type="hidden" id="hdRuta" value="'.$_GET['ruta'].'">';
                echo '<input type="hidden" id="hdUrl" value="'.$url.'">';
                ?>

                <div class="row shop_container grid">

                    <?php
                        // $ruta = explode('/',$_GET['ruta']);
                        // if($ruta[0] == 'tags'){
                        //     $valor = $ruta[1];
                        // }else{
                        //     $valor = $ruta[0];
                        // }
                        // $productos = ControladorProductos::ctrMostrarProductos(null, $valor);
                        // foreach($productos as $producto){
                        //     $item = 'producto_id';
                        //     $prod_id = $producto['id'];
                        //     $imagenes = ControladorProductos::ctrConsultarImagenes($item, $prod_id);
                        //     echo '<div class="col-md-4 col-6">
                        //     <div class="product">
                        //         <div class="product_img">
                        //             <a href="'.$valor.'/'.$producto['id'].'">
                        //                 <img class="img-prod" src="'.$url.'assets/images/productos/'.((count($imagenes) > 0) ? $imagenes[0]['imagen'] : 'no-imagen.png').'" alt="product_img1">
                        //             </a>
                        //             <div class="product_action_box">
                        //                 <ul class="list_none pr_action_btn">
                        //                     <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                        //                     <li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                        //                     <li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                        //                     <li><a href="#"><i class="icon-heart"></i></a></li>
                        //                 </ul>
                        //             </div>
                        //         </div>
                        //         <div class="product_info">
                        //             <h6 class="product_title"><a href="'.$valor.'/'.$producto['id'].'">'.$producto['nombre'].'</a></h6>
                        //             <div class="product_price">
                        //                 <span class="price">$'.(($producto['oferta']) ? number_format($producto['oferta']) : number_format($producto['precio']) ).'</span>
                        //                 <del>'.(($producto['oferta']) ? '$'.number_format($producto['precio']) : '' ).'</del>
                        //                 <div class="on_sale">
                        //                     <span>'.(($producto['oferta']) ? (100-($producto['oferta']*100)/$producto['precio']).'% Off' : '' ).'</span>
                        //                 </div>
                        //             </div>
                        //             <div class="rating_wrap">
                        //                 <div class="rating">
                        //                     <div class="product_rate" style="width:'.(($producto['rating']/$producto['total_votos'])*20).'%"></div>
                        //                 </div>
                        //                 <span class="rating_num">('.$producto['total_votos'].')</span>
                        //             </div>
                        //             <div class="pr_desc">
                        //                 <p>'.$producto['descripcion_corta'].'</p>
                        //             </div>
                        //             <div class="pr_switch_wrap">
                        //                 <div class="product_color_switch">';
                        //                     $colores = ControladorProductos::ctrMostrarColores(null, $producto['id']);
                        //                     foreach($colores as $color){
                        //                         echo '<span data-color="'.$color['hex'].'"></span>';
                        //                     } 
                        //                 echo '</div>
                        //             </div>
                        //             <div class="list_product_action_box">
                        //                 <ul class="list_none pr_action_btn">
                        //                     <li class="add-to-cart"><a href="'.$valor.'/'.$producto['id'].'"><i class="icon-basket-loaded"></i> Agregar al Carrito</a></li>
                        //                     <li><a href="//bestwebcreator.com/shopwise/demo/shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                        //                     <li><a href="//bestwebcreator.com/shopwise/demo/shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                        //                     <li><a href="deseos/'.$producto['id'].'"><i class="icon-heart"></i></a></li>
                        //                 </ul>
                        //             </div>
                        //         </div>
                        //     </div>
                        // </div>';
                        // }
                    ?>
                </div>

        		<!--
                <div class="row">
                    <div class="col-12">
                        <ul class="pagination mt-3 justify-content-center pagination_style1">
                        </ul>
                    </div>
                </div>
                -->

        	</div>

            <!-- CATEGORY -->
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">

                	<?php require_once 'categorias_sidebar.php'; ?>

                    <!-- 
                    <div class="widget">
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
                    </div> 
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION PRODUCT -->
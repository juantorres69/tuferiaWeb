<?php 
if(!isset($_SESSION['rol'])){ ?>
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    <div class="section bg_default small_pt small_pb">
        <div class="custom-container">	
            <div class="row align-items-center">	
                <div class="col-md-6">
                    <div class="newsletter_text text_white">
                        <h3>Suscríbase a nuestro boletín ahora</h3>
                        <p> Regístrese ahora para obtener actualizaciones sobre promociones. </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form2 rounded_input">
                        <form>
                            <input type="text" required="" class="form-control" placeholder="Ingresa Correo Electronico">
                            <button type="submit" class="btn btn-dark btn-radius" name="submit" value="Submit">Suscribase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<!-- START FOOTER -->
<footer class="bg_gray">
<?php 
if(!isset($_SESSION['rol']) || $_SESSION['rol'] === 'usuario'){ ?>
    <!-- footer_top small_pt pb_20 -->
    <div class="">
        <!-- <div class="custom-container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img style="width:100px" src="<?php echo $url?>assets/images/logo-feria.png" alt="logo"/></a>
                        </div>
                        <ul class="contact_info">
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@tuferiavirtual.com">info@tuferiavirtal.com</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>+57 321 852 4007</p>
                            </li>
                        </ul>
                    </div>
        		</div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Menu</h6>
                        <ul class="widget_links">
                            <li><a href="#">Nosotros</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contactanos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Mi Cuenta</h6>
                        <ul class="widget_links">
                            <li><a href="#">Carrito</a></li>
                            <li><a href="#">Estado Envio</a></li>
                            <li><a href="#">Historico de Pedidos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="middle_footer">
    	<div class="custom-container">
        	<div class="row">
            	<div class="col-12">
                	<div class="shopping_info">
                        <div class="row justify-content-center">
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-shipped"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>Entregas</h5>
                                        <p>Las entregas son a cargo del expositor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-money-back"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>Garantia</h5>
                                        <p>La garantía mínimas son de 30 días.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>Soporte</h5>
                                        <p>El soporte técnico se responderá en maximo 24 horas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>    
    <div class="bottom_footer border-top-tran">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4">
                    <p class="mb-lg-0 text-center">© <?php echo date("Y") ?> todos los derechos reservados <strong>Peter Barranco Alfaro</strong> </p>
                </div>
                <div class="col-lg-4 order-lg-first">
                    <div class="widget mb-lg-0">
                        <ul class="social_icons text-center text-lg-left">
                            <li><a href="https://www.facebook.com/groups/246376623398909/" target="_blank" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCrJkhxx3WNVeHwhriaTQmIw/videos" class="sc_youtube" target="_blank"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="https://www.instagram.com/tu_feriavirtual/?hl=es-la" class="sc_instagram" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ul class="footer_payment text-center text-lg-right">
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->


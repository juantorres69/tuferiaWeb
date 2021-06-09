<?php 
//START SECTION SUBSCRIBE NEWSLETTER
if(!isset($_SESSION['rol'])){ ?>

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

    <div class=""></div>

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
                    <p class="mb-lg-0 text-center">© <?php echo date("Y") ?> todos los derechos reservados <strong>Luis Rodriguez Reales</strong> </p>
                </div>
                <div class="col-lg-4 order-lg-first">
                    <div class="widget mb-lg-0">
                        <ul class="social_icons text-center text-lg-left">
                            <li><a href="https://web.facebook.com/groups/276245050899609/" target="_blank" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCrJkhxx3WNVeHwhriaTQmIw/videos" class="sc_youtube" target="_blank"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="https://www.instagram.com/tu_feriavirtual/?hl=es-la" class="sc_instagram" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--
                <div class="col-lg-4">
                    <ul class="footer_payment text-center text-lg-right">
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="<?php echo $url; ?>vistas/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
                -->
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!-- START SUBCRIBE -->
<?php 
if(!isset($_SESSION['rol'])){ ?>
    <div class="section bg_default small_pt small_pb" style="padding: 20px 0px;">
        <div class="custom-container">	
            <div class="row align-items-center" style="justify-content: space-evenly; margin: 0px 5px;">	
                <!-- TEXT -->
                <div>
                    <div class="newsletter_text text_white">
                        <h3 style="margin: 0px;">¡Regístrate, es hora de emprender y comprar!</h3>
                    </div>
                </div>
                <!-- SUBSCRIBE -->
                <div>
                    <div>
                        <a href="registro">
                            <button class="btn btn-dark btn-radius" style="border-width: 2px; border-color: #fff; font-size:1.4rem !important">Registrate</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php 
if(!isset($_SESSION['rol']) || $_SESSION['rol'] === 'usuario'){ ?>
    <div class=""></div>
    <!-- cumplimiento -->
    <div class="middle_footer">
    	<div class="custom-container">
        	<div class="row">
            	<div class="col-12">
                	<div class="shopping_info">
                        <div class="row justify-content-center">
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <!-- ICON -->
                                    <div class="icon">
                                        <i class="flaticon-shipped"></i>
                                    </div>
                                    <!-- TEXT -->
                                    <div class="icon_box_content">
                                    	<h5>Envíos</h5>
                                        <p>Los envíos son a cargo del expositor por medio de envia.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <!-- ICON -->
                                    <div class="icon">
                                        <i class="flaticon-money-back"></i>
                                    </div>
                                    <!-- TEXT -->
                                    <div class="icon_box_content">
                                    	<h5>Garantia</h5>
                                        <p>Como herramienta de confianza en nuestra plataforma.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <!-- ICON -->
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <!-- TEXT -->
                                    <div class="icon_box_content">
                                    	<h5>Soporte</h5>
                                        <p>Escríbenos al correo tuferiavirtual19@gmail.com o al WhatsApp +57 3126128025 </p>
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
<!-- END SUBCRIBE -->
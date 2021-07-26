<!-- START SUBCRIBE -->
<?php 
if(!isset($_SESSION['rol'])){ ?>

    <div class="section bg_default small_pt small_pb" style="padding: 20px 0px;">
        <div class="custom-container">	
            <div class="row align-items-center" style="justify-content: space-evenly; margin: 0px 5px;">	

                <!-- TEXT -->
                <div>
                    <div class="newsletter_text text_white">
                        <h3>registrate ahora</h3>
                        <p> Regístrese ahora para ser parte de tu feria virtual. </p>
                    </div>
                </div>

                <!-- SUBSCRIBE -->
                <div>
                    <div>
                        <a href="registro"><button class="btn btn-dark btn-radius" >Registrate</button></a>
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
                                    	<h5>Entregas</h5>
                                        <p>Las entregas son a cargo del expositor</p>
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
                                        <p>La garantía mínimas son de 30 días.</p>
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
<!-- END SUBCRIBE -->
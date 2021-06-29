<!-- START SUBCRIBE -->
<?php 
if(!isset($_SESSION['rol'])){ ?>

    <div class="section bg_default small_pt small_pb" style="padding-top: 20px;">
        <div class="custom-container">	
            <div class="row align-items-center">	

                <!-- TEXT -->
                <div class="col-md-6">
                    <div class="newsletter_text text_white">
                        <h3>Suscríbase a nuestro boletín ahora</h3>
                        <p> Regístrese ahora para obtener actualizaciones sobre promociones. </p>
                    </div>
                </div>

                <!-- SUBSCRIBE -->
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
<!-- END SUBCRIBE -->
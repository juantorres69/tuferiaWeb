<!-- START COMERCIOS -->
<div class="main_content">    
    <div class="staggered-animation-wrap" style="margin-top: 18px;">
        <div class="custom-container">
            <div class="row">

                <!-- MENU -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    
                    <!-- OPTIONS -->
                    <?php include 'menu_super.php'; ?>
                </div>

                <div class="col-lg-9 ">
                    <input type="hidden" id="hdUrl" value="<?php echo $url; ?>">

                    <!-- TITTLE -->
                    <h4>Comercios</h4>

                    <table class="table" id="tbComercios">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Nit</th>
                                <th scope="col">Razon Social</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefono</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END COMERCIOS -->
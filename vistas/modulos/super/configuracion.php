<!-- START MAIN CONTENT -->
<div class="main_content">    
    <!-- START SECTION BANNER -->
    <div class="mt-4 staggered-animation-wrap">
        <div class="custom-container">
            <div class="row">
                <!-- categorias menu -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <!-- Seccion categorias -->
                    
                    <?php include 'menu_super.php'; ?>
                </div>
                <div class="col-lg-9 ">
                    <input type="hidden" id="hdUrl" value="<?php echo $url; ?>">
                    <h4>Configuración</h4>
                    <?php 
                    $config = ControladorConfig::ctrConsultarConfig();
                    ?>
                    <form id="frmConfig">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Impuesto</label>
                                    <input type="number" name="txtImpuesto" class="form-control form-custom" value="<?php echo $config['impuesto']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Modo</label>
                                    <select name="txtModo" class="form-control form-custom">
                                        <option value="prod" <?php echo (($config['modo'] == 'prod') ? 'selected' : '' ); ?>>Produccion</option>
                                        <option value="sandbox" <?php echo (($config['modo'] == 'sandbox') ? 'selected' : '' ); ?>>Sandbox</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ApiKey</label>
                                    <input type="text" name="txtApiKey" class="form-control form-custom" value="<?php echo $config['pubApiKey']; ?>">
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-action btn-danger" type="submit">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->


</div>
<!-- END MAIN CONTENT -->


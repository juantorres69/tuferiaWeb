<!-- START COFIGURACION -->
<div class="main_content container-heigth-fluid">    
    <div class="staggered-animation-wrap" style="margin-top: 18px;">
        <div class="custom-container">
            <div class="" >

                <!-- CONTENTS -->
                <div class="">
                    <input type="hidden" id="hdUrl" value="<?php echo $url; ?>">

                    <!-- TITTLE -->
                    <h4 style="margin-top: 10px;">Configuración</h4>

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

                            <div class="col-md-12 text-center" style="margin: 20px 0px;">
                                <button class="btn btn-action btn-danger" type="submit">Actualizar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONFIGURACION -->
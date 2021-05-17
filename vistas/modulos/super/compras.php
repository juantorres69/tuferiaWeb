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
                    <h4>Compras</h4>
                    <div class="row">
                        <div class="col-12">
                            <button id="DLtoExcel" class="btn btn-sm btn-success">Exportar</button>
                        </div>
                    </div>
                    <table class="table" id="tbCompras">
                        <thead>
                            <tr>
                            <!-- <th></th> -->
                            <th scope="col">Nit</th>
                            <th scope="col">Comercio</th>
                            <th scope="col">Referencia Compra</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Fecha Compra</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Metodo</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
    <div id="dvjson"></div>

</div>
<!-- END MAIN CONTENT -->
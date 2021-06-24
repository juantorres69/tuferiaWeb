<!-- START COMPRAS -->
<div class="main_content">    
    <div class="mt-4 staggered-animation-wrap">
        <div class="custom-container">
            <div class="row">

                <!-- MENU -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">

                    <!-- OPTION -->
                    <?php include 'menu_super.php'; ?>
                </div>

                <div class="col-lg-9 ">
                    <input type="hidden" id="hdUrl" value="<?php echo $url; ?>">

                    <!-- TITTLE -->
                    <h4>Compras</h4>

                    <!-- BUTTON -->
                    <div class="row">
                        <div class="col-12" style="margin-bottom: 10px;">
                            <button id="DLtoExcel" class="btn btn-sm btn-success">Exportar</button>
                        </div>
                    </div>

                    <!-- CONTENTS -->
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

    <div id="dvjson"></div>

</div>
<!-- END COMPRAR -->
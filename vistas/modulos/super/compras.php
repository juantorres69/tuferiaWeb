<!-- START COMPRAS -->
<div class="main_content container-heigth-fluid">    
    <div class="staggered-animation-wrap" style="margin-top: 18px;">
        <div class="custom-container">
            <div class="" >

                <div class="">
                    
                    <input type="hidden" id="hdUrl" value="<?php echo $url; ?>">

                    <div class="row">
                        <div class="col-12" style="margin-bottom: 10px; display:flex; justify-content: space-between; margin-top: 10px;">
                            <!-- TITTLE -->
                            <h4>Compras</h4>
                            <!-- BUTTON -->
                            <button id="DLtoExcel" class="btn btn-sm btn-success">Exportar</button>
                        </div>
                    </div>

                    <!-- CONTENTS -->
                    <div style="overflow-x: auto;">
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
    </div>

    <div id="dvjson"></div>

</div>
<!-- END COMPRAR -->
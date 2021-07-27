<!-- SECTION PRODUCT -->
<div class="section aj1" style="padding: 20px;">
	<div class="container">
    	<div class="">
            <!-- RIGHT -->
			<div class="">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">

                            <div class="product_header_left"></div>

                            <div class="product_header_right">

                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                </div>

                                <div class="custom_select">
                                    <select class="form-control form-control-sm" id="cbMostrar">
                                        <option value="">Mostrar</option>
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                echo '<input type="hidden" id="hdRuta" value="'.$_GET['ruta'].'">';
                echo '<input type="hidden" id="hdUrl" value="'.$url.'">';
                ?>

                <div class="row shop_container list"></div>
                
        	</div>
        </div>
    </div>
</div>
<!-- END SECTION PRODUCT -->
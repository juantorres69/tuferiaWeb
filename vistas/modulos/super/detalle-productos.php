<!-- START DETALLES -->
<div class="main_content">    
    <div class="staggered-animation-wrap" style="margin-top: 18px;">
        <div class="custom-container">
            <div class="" >

                <div class="">
                    <input type="hidden" id="hdUrl" value="<?php echo $url; ?>">
                    
                    <div class="" style="margin-top: 10px;">

                        <!-- TITTLE -->
                        <div class="heading_s2">
                            <h4>Detalles de Productos</h4>
                        </div>

                        <!-- OPTIONS -->
                        <div class="tab-style2">

                            <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist" style="z-index: 10000;">

                                <!-- COLORES -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="colores-tab" data-toggle="tab" href="#colores" role="tab" aria-controls="colores" aria-selected="true">Colores</a>
                                </li>
                                
                                <!-- TALLAS -->
                                <li class="nav-item">
                                    <a class="nav-link" id="tallas-tab" data-toggle="tab" href="#tallas" role="tab" aria-controls="tallas" aria-selected="false">Tallas</a>
                                </li>

                                <!-- ETIQUETAS -->
                                <li class="nav-item">
                                    <a class="nav-link" id="tags-tab" data-toggle="tab" href="#tags" role="tab" aria-controls="tags" aria-selected="false">Etiquetas</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <!-- TABLE -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab_slider">

                                <!-- COLORES -->
                                <div class="tab-pane fade show active" id="colores" role="tabpanel" aria-labelledby="colores-tab">
        
                                    <!-- VENTANA DE NUEVO COLORES -->
                                    <div class="modal fade" id="mdlColores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Colores</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                
                                                <form id="frmColores">
                                                    <input type="hidden" name="hdColor" id="hdColor">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Nombre</label>
                                                                    <input type="text" name="txtNombre" id="txtNombre" class="form-control form-custom" required>
                                                                    <small class="text-danger d-none" id="msjColor">Ya se encuentra registrado.</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Color</label>
                                                                    <input type="color" class="form-control form-custom" name="txtColor" id="txtColor">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 d-none" id="dvColorEstado">
                                                                <div class="chek-form">
                                                                    <div class="custome-checkbox">
                                                                        <input class="form-check-input" type="checkbox" name="chkEstado" id="chkEstadoColor" value="1">
                                                                        <label class="form-check-label" for="chkEstadoColor"><span>Estado</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-action" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger btn-action">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
        
                                    <table class="table">

                                        <thead>
                                            <tr>
                                                <th scope="col">Color</th>
                                                <th scope="col">Vista</th>
                                                <th scope="col">Estado</th>
                                                <th>
                                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false" style="margin: -5px; z-index: 10000000;"> 
                                                        <span class="ion-android-menu"></span>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody id="tbColores">
                                        </tbody>

                                    </table>

                                    <!-- BUTTON -->
                                    <div class="row">
                                        <div class="col-md-12 mb-3" style="margin: 20px 0px; text-align: center;">
                                            <button class="btn btn-danger btn-action" id="btnNuevoColor">Nuevo</button>
                                        </div>
                                    </div>

                                </div>

                                <!-- TALLAS -->
                                <div class="tab-pane fade" id="tallas" role="tabpanel" aria-labelledby="tallas-tab">
        
                                    <!-- VENTANA DE NUEVO TALLAS -->
                                    <div class="modal fade" id="mdlTallas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tallas</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="frmTallas">
                                                    <input type="hidden" name="hdTalla" id="hdTalla">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Talla</label>
                                                                    <input type="text" name="txtTalla" id="txtTalla" class="form-control form-custom" required>
                                                                    <small class="text-danger d-none" id="msjTalla">Ya se encuentra registrada.</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 d-none pt-5" id="dvTallaEstado">
                                                                <div class="chek-form">
                                                                    <div class="custome-checkbox">
                                                                        <input class="form-check-input" type="checkbox" name="chkEstado" id="chkEstadoTalla" value="1">
                                                                        <label class="form-check-label" for="chkEstadoTalla"><span>Estado</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-action" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger btn-action">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
        
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Talla</th>
                                                <th scope="col">Estado</th>
                                                <th>
                                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false" style="margin: -5px; z-index: 10000000;"> 
                                                        <span class="ion-android-menu"></span>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody id="tbTallas">
                                        </tbody>

                                    </table>

                                    <!-- BUTTON -->
                                    <div class="row">
                                        <div class="col-md-12 mb-3" style="margin: 20px 0px; text-align: center;">
                                            <button class="btn btn-danger btn-action" id="btnNuevaTalla">Nueva</button>
                                        </div>
                                    </div>

                                </div>

                                <!-- ETIQUETAS -->
                                <div class="tab-pane fade" id="tags" role="tabpanel">

                                    <!-- VENTANA DE NUEVA ETIQUETA -->
                                    <div class="modal fade" id="mdlTags" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Etiquetas</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="frmTags">
                                                    <input type="hidden" name="hdTags" id="hdTags">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Etiquetas</label>
                                                                    <input type="text" name="txtTag" id="txtTag" class="form-control form-custom" required>
                                                                    <small class="text-danger d-none" id="msjTag">Ya se encuentra registrado.</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 d-none pt-5" id="dvTagsEstado">
                                                                <div class="chek-form">
                                                                    <div class="custome-checkbox">
                                                                        <input class="form-check-input" type="checkbox" name="chkEstado" id="chkEstadoTag" value="1">
                                                                        <label class="form-check-label" for="chkEstadoTag"><span>Estado</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-action" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger btn-action">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
        
                                    <table class="table">
                                        
                                        <thead>
                                            <tr>
                                                <th scope="col">Etiquetas</th>
                                                <th scope="col">Estado</th>
                                                <th>
                                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false" style="margin: -5px; z-index: 10000000;"> 
                                                        <span class="ion-android-menu"></span>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody id="tbTags"></tbody>

                                    </table>

                                    <!-- BUTTON -->
                                    <div class="row">
                                        <div class="col-md-12 mb-3" style="margin: 20px 0px; text-align: center;">
                                            <button class="btn btn-danger btn-action" id="btnNuevoTag">Nuevo</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END DETALLES-PRODUCTOS -->
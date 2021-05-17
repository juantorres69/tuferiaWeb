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
                    
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>Detalles de Productos</h4>
                        </div>
                        <div class="tab-style2">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                                <span class="ion-android-menu"></span>
                            </button>
                            <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="colores-tab" data-toggle="tab" href="#colores" role="tab" aria-controls="colores" aria-selected="true">Colores</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tallas-tab" data-toggle="tab" href="#tallas" role="tab" aria-controls="tallas" aria-selected="false">Tallas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tags-tab" data-toggle="tab" href="#tags" role="tab" aria-controls="tags" aria-selected="false">Tags</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab_slider">
                                <div class="tab-pane fade show active" id="colores" role="tabpanel" aria-labelledby="colores-tab">
                                    <div class="row">
                                        <div class="col-md-12 text-right mb-3">
                                            <button class="btn btn-danger btn-action" id="btnNuevoColor">Nuevo</button>
                                        </div>
                                    </div>
        
                                    <!-- Modal colores -->
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
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbColores">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="tallas" role="tabpanel" aria-labelledby="tallas-tab">
                                    <div class="row">
                                        <div class="col-md-12 text-right mb-3">
                                            <button class="btn btn-danger btn-action" id="btnNuevaTalla">Nueva</button>
                                        </div>
                                    </div>
        
                                    <!-- Modal Tallas -->
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
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbTallas">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="tags" role="tabpanel">
                                <div class="row">
                                        <div class="col-md-12 text-right mb-3">
                                            <button class="btn btn-danger btn-action" id="btnNuevoTag">Nuevo</button>
                                        </div>
                                    </div>
        
                                    <!-- Modal Tags -->
                                    <div class="modal fade" id="mdlTags" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tags</h5>
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
                                                                <label>Tag</label>
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
                                            <th scope="col">Tag</th>
                                            <th scope="col">Estado</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbTags">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->


</div>
<!-- END MAIN CONTENT -->
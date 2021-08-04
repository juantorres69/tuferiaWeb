<!-- START CATEGORY -->
<div class="main_content container-heigth-fluid">    
    <div class="staggered-animation-wrap" style="margin-top: 18px;">
        <div class="custom-container">
            <div class="">

                <div class="">
                    <input type="hidden" id="hdUrl" value="<?php echo $url; ?>">

                    <div class="row">
                        <div class="col-md-12 text-right mb-3" style="display: flex; justify-content: space-between; margin-top: 10px;">
                            <!-- TITTLE -->
                            <h4>Categorias de Productos</h4>
                            <!-- BUTTON -->
                            <button class="btn btn-danger btn-action" id="btnNuevaCat">Nueva</button>
                        </div>
                    </div>

                    <!-- VENTANA EMERGENTE DE NUEVA CATEGORIA -->
                    <div class="modal fade" id="mdlCategorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="frmCategorias">
                                    <input type="hidden" name="hdCategoria" id="hdCategoria">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Categoria</label>
                                                    <input type="text" name="txtCategoria" id="txtCategoria" class="form-control form-custom" required>
                                                    <small class="text-danger d-none" id="msjCategoria">Ya se encuentra registrado.</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Icono</label>
                                                    <input type="hidden" name="txtIcono" id="txtIcono">
                                                    <div class="dv-icons">
                                                        <?php 
                                                            $iconos = ControladorCategorias::ctrConsultarIconos();
                                                            foreach($iconos as $icono){
                                                                echo '<div class="dv-icon" icono="'.$icono.'"><i class="'.$icono.'"></i></div>';
                                                            }
                                                        ?>
                                                    </div>
                                                    <small class="text-danger d-none" id="msjIconos">Debe seleccionar un icono.</small>
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

                    <!-- VENTANA EMERGENTE DE SUBCATEGORIAS -->
                    <div class="modal fade" id="mdlSubCategorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Subcategorias</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="hdCategoriaSub" id="hdCategoriaSub">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="form-group">
                                                <label>Subcategoria</label>
                                                <input type="text" name="txtSubCategoria" id="txtSubCategoria" class="form-control form-custom" required>
                                                <small class="text-danger d-none" id="msjSubCategoria">Debe ingresar una subcategoria.</small>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <table class="table mt-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Subcategoria</th>
                                                    <th scope="col">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbSubcategorias">
                                            </tbody>
                                        </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-action" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger btn-action" id="btnGuardarSubcat">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TABLE -->
                    <table class="table" id="tbCategorias" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Icono</th>
                                <th></th>
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
<!-- END CATEGORY -->
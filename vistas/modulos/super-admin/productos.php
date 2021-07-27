<!-- START MAIN CONTENT -->
<div class="main_content">    
    <!-- START SECTION BANNER -->
    <div class="staggered-animation-wrap" style="margin-top: 18px;">
        <div class="custom-container">
            <div class="row">
                <!-- categorias menu -->

                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    
                    <!-- Seccion categorias -->
                    <?php include 'menu_admin.php'; ?>

                </div>
                <div class="col-lg-9 ">

                    <input type="hidden" id="hdUrl" value="<?php echo $url; ?>">

                    <h4>Productos</h4>

                    <div class="row">
                        <div class="col-md-12 text-right mb-3">
                            <button class="btn btn-danger btn-action" id="btnNuevo">Nuevo</button>
                        </div>
                    </div>

                    <!-- Modal Productos -->
                    <div class="modal fade" id="mdlProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Información del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="formProductos" enctype="multipart/form-data">

                                    <input type="hidden" name="hdProducto" id="hdProducto">

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <img src="<?php echo $url; ?>assets/images/productos/no-imagen.png" class="img-thumbnail w-25 img-prod d-none">
                                                <div class="form-group">
                                                    <label>Imagen 1</label>
                                                    <input type="file" class="form-control-file" name="imagen_1">
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <img src="<?php echo $url; ?>assets/images/productos/no-imagen.png" class="img-thumbnail w-25 img-prod d-none">
                                                <div class="form-group">
                                                    <label>Imagen 2</label>
                                                    <input type="file" class="form-control-file" name="imagen_2">
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <img src="<?php echo $url; ?>assets/images/productos/no-imagen.png" class="img-thumbnail w-25 img-prod d-none">
                                                <div class="form-group">
                                                    <label>Imagen 3</label>
                                                    <input type="file" class="form-control-file" name="imagen_3">
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <img src="<?php echo $url; ?>assets/images/productos/no-imagen.png" class="img-thumbnail w-25 img-prod d-none">
                                                <div class="form-group">
                                                    <label>Imagen 4</label>
                                                    <input type="file" class="form-control-file" name="imagen_4">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control form-custom" name="txtNombre" id="txtNombre" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Descripción Corta</label>
                                                    <input type="text" class="form-control form-custom" name="txtDescCorta" id="txtDescCorta" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>SKU</label>
                                                    <input type="text" class="form-control form-custom" name="txtSKU" id="txtSKU" required>
                                                    <small class="text-danger d-none" id="msjSKU">Ya se encuentra registrado.</small>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php 
                                                        $categorias = ControladorProductos::ctrMostrarCategorias(null, null);
                                                    ?>
                                                    <label>Categoria</label>
                                                    <select id="cbCategoria" name="cbCategoria" class="form-control form-custom" required>
                                                        <option value="">Seleccione..</option>
                                                        <?php 
                                                            foreach($categorias as $categoria){
                                                                echo '<option value="'.$categoria['id'].'">'.$categoria['categoria'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Subcategoria</label>
                                                    <select id="cbSubcategoria" name="cbSubcategoria" class="form-control form-custom" required>
                                                        <option value="">Seleccione..</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Precio</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="number" class="form-control form-custom" name="txtPrecio" id="txtPrecio" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Oferta</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="number" class="form-control form-custom" name="txtOferta" id="txtOferta">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Garantia</label>
                                                    <input type="text" class="form-control form-custom" name="txtGarantia" id="txtGarantia" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Devolución de Dinero</label>
                                                    <input type="text" class="form-control form-custom" name="txtDevDinero" id="txtDevDinero" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Contra Entrega</label>
                                                    <select name="cbContraEntrega" id="cbContraEntrega" class="form-control form-custom" required>
                                                        <option value="">Seleccione..</option>
                                                        <option value="1">SI</option>
                                                        <option value="0">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tipo</label>
                                                    <select name="cbTipo" id="cbTipo" class="form-control form-custom" required>
                                                        <option value="">Seleccione..</option>
                                                        <option value="fisico">Fisico</option>
                                                        <option value="servicio">Servicio</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Descripción larga</label>
                                                    <textarea name="txtDescLarga" id="txtDescLarga" class="form-control" cols="30" rows="4" required></textarea>
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
                    <!-- Modal Variables -->
                    <div class="modal fade" id="mdlVariables" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Variables del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <input type="hidden" name="hdProductoVar" id="hdProductoVar">

                                <div class="modal-body">
                                    <div class="heading_tab_header">
                                        <div class="heading_s2">
                                            <h4></h4>
                                        </div>
                                        <div class="tab-style2">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                                                <span class="ion-android-menu"></span>
                                            </button>
                                            <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#colores" role="tab" aria-controls="arrival" aria-selected="true">Colores</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#tallas" role="tab" aria-controls="sellers" aria-selected="false">Tallas</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#tags" role="tab" aria-controls="sellers" aria-selected="false">Tags</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab_slider">
                                        <div class="tab-pane fade show active" id="colores" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php 
                                                        $tabla = 'colores';
                                                        $colores = ControladorProductos::crtConsultarVariables($tabla);
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Color</label>
                                                        <select id="cbColor" class="form-control form-custom">
                                                            <option value="">Seleccione..</option>
                                                            <?php 
                                                                foreach($colores as $color){
                                                                    echo '<option value="'.$color['id'].'">'.ucwords($color['descripcion']).'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger d-none" id="MsjColor">Debe Seleccionar un color.</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-danger btn-action" id="addColor">Agregar</button>
                                                </div>
                                            </div>
                                            <table class="table mt-3">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Color</th>
                                                    <th scope="col">Vista</th>
                                                    <th scope="col">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbColores">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tallas" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php 
                                                        $tabla = 'tallas';
                                                        $tallas = ControladorProductos::crtConsultarVariables($tabla);
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Talla</label>
                                                        <select id="cbTalla" class="form-control form-custom">
                                                            <option value="">Seleccione..</option>
                                                            <?php 
                                                                foreach($tallas as $talla){
                                                                    echo '<option value="'.$talla['id'].'">'.$talla['descripcion'].'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger d-none" id="MsjTalla">Debe Seleccionar una talla.</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-danger btn-action" id="addTalla">Agregar</button>
                                                </div>
                                            </div>
                                            <table class="table mt-3">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Talla</th>
                                                    <th scope="col">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbTalla">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tags" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php 
                                                        $tabla = 'tags';
                                                        $tags = ControladorProductos::crtConsultarVariables($tabla);
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Tag</label>
                                                        <select id="cbTag" class="form-control form-custom">
                                                            <option value="">Seleccione..</option>
                                                            <?php 
                                                                foreach($tags as $tag){
                                                                    echo '<option value="'.$tag['id'].'">'.$tag['descripcion'].'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                        <small class="text-danger d-none" id="MsjTag">Debe Seleccionar un Tag.</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-danger btn-action" id="addTag">Agregar</button>
                                                </div>
                                            </div>
                                            <table class="table mt-3">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">Tag</th>
                                                    <th scope="col">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbTag">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-action" data-dismiss="modal">Cancelar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <table class="table" id="tbProductos">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Categoria</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
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
</div>
<!-- END MAIN CONTENT -->
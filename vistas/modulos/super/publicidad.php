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
                    <h4>Publicidad y Banners</h4>
                    
                    <div class="row">
                        
                        <div class="col-md-12 text-right mb-3">
                            <button class="btn btn-danger btn-action" id="btnNuevoBanner">Nuevo</button>
                        </div>
                    </div>

                    <!-- Modal Banners -->
                    <div class="modal fade" id="mdlBanners" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Banners</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="frmBanners">
                                <input type="hidden" name="hdBanner" id="hdBanner">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Imagen</label>
                                                <label style="font-size:9px">Tamaño sugerido: 825 x 550 px</label>
                                                <input type="file" name="flImagen" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Subtitulo</label>
                                                <input type="text" name="txtSubtitulo" id="txtSubtitulo" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Oferta</label>
                                                <input type="number" name="txtOferta" id="txtOferta" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Precio</label>
                                                <input type="number" name="txtPrecio" id="txtPrecio" class="form-control form-custom">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ruta</label>
                                                <input type="text" name="txtRuta" id="txtRuta" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Texto Ruta</label>
                                                <input type="text" name="txtTextoRuta" id="txtTextoRuta" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Orden</label>
                                                <input type="number" name="txtOrden" id="txtOrden" class="form-control form-custom" >
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

                     <!-- Modal Mega Promo -->
                     <div class="modal fade" id="mdlMegaPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mega Promo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="frmMegaPromo">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Imagen</label>
                                                <label style="font-size:9px">Tamaño sugerido: 540 x 600 px</label>
                                                <input type="file" name="flImagen" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" name="txtTituloMP" id="txtTituloMP" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Subtitulo</label>
                                                <input type="text" name="txtSubtituloMP" id="txtSubtituloMP" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ruta</label>
                                                <input type="text" name="txtRutaMP" id="txtRutaMP" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Texto Ruta</label>
                                                <input type="text" name="txtTextoRutaMP" id="txtTextoRutaMP" class="form-control form-custom" >
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

                    <!-- Modal Promociones -->
                    <div class="modal fade" id="mdlPromociones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Promociones</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="frmPromociones">
                                <input type="hidden" name="hdPromo" id="hdPromo">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Imagen</label>
                                                <label style="font-size:9px">Tamaño sugerido: 419 x 220 px</label>
                                                <input type="file" name="flImagen" id="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" name="txtTituloPromo" id="txtTituloPromo" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Subtitulo</label>
                                                <input type="text" name="txtSubtituloPromo" id="txtSubtituloPromo" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ruta</label>
                                                <input type="text" name="txtRutaPromo" id="txtRutaPromo" class="form-control form-custom" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Texto Ruta</label>
                                                <input type="text" name="txtTextoRutaPromo" id="txtTextoRutaPromo" class="form-control form-custom" >
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

                    <div class="row" id="dvBanners">
                        
                    </div>
                    <hr>
                    <h4>Mega Promo</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="" id="mp_imagen">
                        </div>
                        <div class="col-md-8 border-left">
                            <h3 id="mp_titulo"></h3>
                            <h5 id="mp_subtitulo"></h5>
                            <span>Link: <strong id="mp_link_text"></strong></span><br>
                            <button class="btn btn-danger btn-action" id="btnEditMegaPromo">Editar</button>
                        </div>
                    </div>
                    <hr>
                    <h4>Promociones</h4>
                    <div class="row mb-5" id="dvPromociones">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->


</div>
<!-- END MAIN CONTENT -->


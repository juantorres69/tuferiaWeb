<!-- QUEJAS Y SUGERENCIAS SECTION -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <!-- TITTLE -->
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Quejas y sugerencias</h1>
                </div>
            </div>
            <!-- ROUTE -->
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active">Quejas y sugerencias</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- QUEJAS Y SUGERENCIAS -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <!-- TITTLE -->
                        <div class="heading_s1">
                            <h3>Quejas y sugerencias</h3>
                        </div>
                        <!-- QUEJAS Y SUGERENCIAS -->
                        <form id="frmQYS">
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="nombre" placeholder="Nombre"> <!-- nombre -->
                            </div>
                            <div class="form-group">
                                <div class="custom_select">
                                    <select required="" class="form-control" name="TipoUsuario"> <!-- tipo de usuario -->
                                        <option value="">¿Comprador o expositor?</option>
                                        <option value="comprador">Comprador</option>
                                        <option value="expositor">Expositor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="numero" placeholder="Numero de celular"> <!-- numero -->
                            </div>
                            <div class="form-group">
                                <input type="email" required="" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email"> <!-- email -->
                            </div>
                            <div class="form-group">
                                <div class="custom_select">
                                    <select required="" class="form-control" name="TipoQueja"> <!-- tipo de queja -->
                                        <option value="">¿Quejas ó sugerencia?</option>
                                        <option value="queja">Queja</option>
                                        <option value="sugerencia">Sugerencia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="dice" placeholder="Que quieres decirnos"> <!-- caja de texto -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="enviar">Enviar</button> <!-- enviar un correo con la cada -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END QUEJAS Y SUGERENCIAS SECTION -->
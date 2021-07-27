<!-- START SECTION REGISTRO -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">

            <!-- TITTLE -->
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Registro</h1>
                </div>
            </div>

            <!-- ROUTE -->
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active">Registro</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- SECTION REGISTRO -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">

                        <!-- TITTLE -->
                        <div class="heading_s1">
                            <h3>Crear Cuenta</h3>
                        </div>

                        <!-- FORM -->
                        <form id="frmRegistro">

                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="txtNombre" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <input type="email" required="" class="form-control" name="txtEmail" placeholder="Correo electrónico">
                            </div>

                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="txtPassword" id="txtPassword" placeholder="Contraseña">
                            </div>

                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="txtCPassword" id="txtCPassword" placeholder="Confirmar Contraseña">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="register">Guardar</button>
                            </div>
                        </form>

                        <!-- OR -->
                        <div class="different_login">
                            <span> ó </span>
                        </div>

                        <div class="form-note text-center"> ¿Ya estás registrado? <a href="<?php echo $url; ?>login">Iniciar Sesión</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION REGISTRO -->
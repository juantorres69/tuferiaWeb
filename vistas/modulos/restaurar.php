<!-- START LOGIN SECTION -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <!-- TITTLE -->
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Restaurar contraseña</h1>
                </div>
            </div>

            <!-- ROUTE -->
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active">Recuperar contraseña</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- SECTION LOGIN -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">

                        <!-- TITTLE -->
                        <div class="heading_s1">
                            <h3>Restaurar contraseña</h3>
                        </div>

                        <p>
                            Ingrese su nueva contraseña
                        </p>

                        <!-- FORM -->
                        <form id="frmLogin">

                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="txtEmail" placeholder="Nueva contraseña" require autofocus>
                            </div>

                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="txtEmail" placeholder="Confirme nueva contraseña">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Restaurar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
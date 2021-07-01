<!-- START LOGIN SECTION -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <div class="row align-items-center">
            <!-- TITTLE -->
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Inicio de Sesión</h1>
                </div>
            </div>

            <!-- ROUTE -->
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Inicio</a></li>
                    <li class="breadcrumb-item active">Iniciar Sesión</li>
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
                            <h3>Inicio de Sesión</h3>
                        </div>

                        <!-- FORM -->
                        <form id="frmLogin">

                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="txtEmail" placeholder="Ingrese su correo.">
                            </div>

                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="txtPassword" placeholder="Ingrese su contraseña.">
                            </div>

                            <div class="login_footer form-group"> <!-- no se como hacer hiper link para el componente de recuperar contraseña -->
                                <a href="---------">¿Olvidaste tu contraseña?</a>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Iniciar Sesión</button>
                            </div>

                        </form>

                        <!-- OR -->
                        <div class="different_login">
                            <span> ó </span>
                        </div>

                        <!-- 
                        <ul class="btn-login list_none text-center">
                            <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                        </ul> 
                        -->

                        <!-- SIGN UP -->
                        <div class="form-note text-center">¿No estas registrado? <a href="registro">Registrate</a></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

<?php 
    $rutas = explode("/", $_GET['ruta']) ;
    $id = $rutas[1];

    $existe = ModeloUsuario::mdlConsultarUsuarioPorId ("usuarios",$id);

    if (!$existe){      // puedes crear una alerta de usurio no existe
        echo "<script type='text/javascript'>alert('usuario no existe')</script>";
    }

?>
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
                        <form id="frmRestaurar"> <!-- le puse un id a cada imput para compararlos -->

                            <div class="form-group">
                                <input type="password" id="txtPass" required="" class="form-control" name="txtPass" placeholder="Nueva contraseña" require autofocus>
                            </div>

                            <div class="form-group">
                                <input type="password" id="txtPassC" required="" class="form-control" name="txtPassC" placeholder="Confirme nueva contraseña">
                            </div>

                            <input type="hidden" id="idUsuario" required="" class="form-control" name="idUsuario" value="<?php $id ?>">

                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="Restaurar">Restaurar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
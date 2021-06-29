<?php 
    if (session_status() === PHP_SESSION_NONE) session_start();
    
    // ruta fija del proyecto 
    $url = Ruta::ctrRuta();
    
    $rutas = explode("/", $_GET['ruta']) ;
   
    $session_list = ['deseos','carrito','checkout','perfil','admin','categorias','detalle-productos','configuracion', 'publicidad'];
    if($rutas[0] == 'cerrar'){
        ControladorUsuario::ctrLogout();
        header('Location:home');
    }else if(in_array($rutas[0], $session_list)){
        if(!isset($_SESSION['idUsuario'])){
            header('Location:'.$url.'home');
        }
    }else if($rutas[0] == 'activar'){
        $tabla = 'usuarios';
        $item = 'id';
        $valor = $rutas[1];
        $usuario = ModeloUsuario::activar($tabla, $item, $valor);
        if($usuario){
            $_SESSION['idUsuario'] = $usuario['id'];
            $_SESSION['nombreUsuario'] = $usuario['nombre'];
            $_SESSION['emailUsuario'] = $usuario['email'];
            $_SESSION['telefono'] = $usuario['telefono'];
            $_SESSION['direccion'] = $usuario['direccion'];
            $_SESSION['ciudad_id'] = $usuario['ciudad_id'];
            $_SESSION['estado'] = $usuario['estado'];
            header('Location:'.$url.'home');
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Meta -->
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="Luis Rodriguez Reales" name="author">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tu feria virtual es una plataforma de emprendimiento ">
        <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

        <!-- SITE TITLE -->
        <title>Tu Feria Virtual</title>

        <?php 
            $plantilla = ControladorPlantilla::ctrEstiloPlantilla();
            // var_dump($url);
        ?>

        <!-- Favicon Icon -->
        <link rel="shortcut icon" type="image/x-icon" href="./assets/images/LOGO.png <?php $plantilla['favicon'] ?>">

        <!-- Animation CSS -->
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/animate.css">	

        <!-- Latest Bootstrap min CSS -->
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/bootstrap/css/bootstrap.min.css">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 

        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/all.min.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/themify-icons.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/linearicons.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/flaticon.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/simple-line-icons.css">

        <!--- owl carousel CSS-->
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/owlcarousel/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/owlcarousel/css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/owlcarousel/css/owl.theme.default.min.css">

        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/magnific-popup.css">

        <!-- Slick CSS -->
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/slick.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/slick-theme.css">

        <!-- Style CSS -->
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/responsive.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/custom.css">

    </head>

    <body>

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v8.0&appId=1694904067256132&autoLogAppEvents=1" nonce="FKbJz4zu"></script>
            <?php
            // $sesion = ControladorUsuario::ctrValidateSession('xgdsgd','','');
            // var_dump($sesion); ?>

            <!-- LOADER -->
            <div class="preloader">
                <div class="lds-ellipsis">
                    <span></span>
                    <span style="background:#ef7236"></span>
                    <span style="background:#FFE800"></span>
                </div>
            </div>
            <!-- END LOADER -->

            <?php 

                /*
                 ____             _             _     _         ____  _                       _            
                / ___|___  _ __  | |__ __ _ __ (_) __| | ___   |  _ \(_)_ __   __ _ _ __ ___ (_) ___ ___   
                | |   / _ \| '_ \| __/ _ \ '_ \| |/ _` |/ _ \  | | | | | '_ \ / _` | '_ ` _ \| |/ __/ _ \  
                | |__| (_) | | | | ||  __/ | | | | (_| | (_) | | |_| | | | | | (_| | | | | | | | (_| (_) | 
                \____|\___/|_| |_|\__\___|_| |_|_|\__,_|\___/  |____/|_|_| |_|\__,_|_| |_| |_|_|\___\___/  

                */

                include "modulos/header.php";
                $sw_prods = false;
                $rutas = array();
                $ruta = null;
                if(isset($_GET['ruta']) && $_GET['ruta'] != 'home'){
                    $rutas = explode("/", $_GET['ruta']);
                    $item = "ruta";
                    $valor = $rutas[0];
                    
                        /*
                         ____       _                        _                     ____        _      ____      _                        _           
                        / ___| __ _| |_ ___  __ _  ___  _ __(_) __ _ ___   _   _  / ___| _   _| |__  / ___|__ _| |_ ___  __ _  ___  _ __(_) __ _ ___ 
                        | |   / _` | __/ _ \/ _` |/ _ \| '__| |/ _` / __| | | | | \___ \| | | | '_ \| |   / _` | __/ _ \/ _` |/ _ \| '__| |/ _` / __|
                        | |__| (_| | ||  __/ (_| | (_) | |  | | (_| \__ \ | |_| |  ___) | |_| | |_) | |__| (_| | ||  __/ (_| | (_) | |  | | (_| \__ \
                        \____|\__,_|\__\___|\__, |\___/|_|  |_|\__,_|___/  \__, | |____/ \__,_|_.__/ \____\__,_|\__\___|\__, |\___/|_|  |_|\__,_|___/
                                            |___/                          |___/                                        |___/                        
                        */

                        // Url's amigables catagorias
                        $rutasCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);
                        if(isset($rutasCategorias['ruta']) && $valor == $rutasCategorias['ruta']){
                            $ruta = $valor;
                        }

                        // Url's amigables subcategorias
                        $rutasSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
                        foreach ($rutasSubCategorias as $key => $value) {
                            if($valor == $value['ruta']){
                                $ruta = $valor;
                            }                           
                        }

                        // Url's amigables productos
                        $rutaProductos = ControladorProductos::ctrDetalleProducto('ruta', $valor);
                        // var_dump ($rutaProductos);
                        if(isset($rutaProductos["ruta"]) && $valor == $rutaProductos["ruta"]){
                            $infoProducto = $valor;
                        }
                        
                        // Url's amigables tags
                        $rutasTags = ControladorTags::ctrConsultarTags($item, $valor);
                        foreach ($rutasTags as $key => $value) {
                            if($valor == $value['ruta']){
                                $ruta = $valor;
                            }
                        }

                        /*
                         _     _     _          _     _                       
                        | |   (_)___| |_ __ _  | |__ | | __ _ _ __   ___ __ _ 
                        | |   | / __| __/ _` | | '_ \| |/ _` | '_ \ / __/ _` |
                        | |___| \__ \ || (_| | | |_) | | (_| | | | | (_| (_| |
                        |_____|_|___/\__\__,_| |_.__/|_|\__,_|_| |_|\___\__,_|
                                                                                
                        */

                        $whiteListGeneric = array("productos", "login", "registro-comercio", "registro", "carrito",  "deseos", "checkout", "error404", "buscar", "perfil","wompi-response");
                        if($ruta != null || $valor == "tags"){
                            include "modulos/productos.php";
                            $sw_prods = true;
                        }else if($valor == 'buscar'){
                            include "modulos/productos.php";
                            $sw_prods = true;
                        }else if(in_array($valor, $whiteListGeneric)){
                            if($valor == 'productos'){
                                $sw_prods = true;
                            }
                            include "modulos/".$valor.".php";    
                        }else if($infoProducto != null){
                            include "modulos/info_producto.php";
                        }else{
                            include "modulos/error404.php";
                        }
                }else{
                    include "modulos/home.php";
                }   
            ?>
            
            <?php include "modulos/footer.php" ?>

            <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

            <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha1.js"></script>
            
            <!-- Latest jQuery --> 
            <script src="<?php echo $url; ?>vistas/assets/js/jquery-1.12.4.min.js"></script> 

            <!-- popper min js -->
            <script src="<?php echo $url; ?>vistas/assets/js/popper.min.js"></script>

            <!-- Latest compiled and minified Bootstrap --> 
            <script src="<?php echo $url; ?>vistas/assets/bootstrap/js/bootstrap.min.js"></script> 

            <!-- owl-carousel min js  --> 
            <script src="<?php echo $url; ?>vistas/assets/owlcarousel/js/owl.carousel.min.js"></script> 

            <!-- magnific-popup min js  --> 
            <script src="<?php echo $url; ?>vistas/assets/js/magnific-popup.min.js"></script> 

            <!-- waypoints min js  --> 
            <script src="<?php echo $url; ?>vistas/assets/js/waypoints.min.js"></script> 

            <!-- parallax js  --> 
            <script src="<?php echo $url; ?>vistas/assets/js/parallax.js"></script> 

            <!-- countdown js  --> 
            <script src="<?php echo $url; ?>vistas/assets/js/jquery.countdown.min.js"></script> 

            <!-- fit video  -->
            <script src="<?php echo $url; ?>vistas/assets/js/Hoverparallax.min.js"></script>

            <!-- imagesloaded js --> 
            <script src="<?php echo $url; ?>vistas/assets/js/imagesloaded.pkgd.min.js"></script>

            <!-- isotope min js --> 
            <script src="<?php echo $url; ?>vistas/assets/js/isotope.min.js"></script>

            <!-- jquery.appear js  -->
            <script src="<?php echo $url; ?>vistas/assets/js/jquery.appear.js"></script>

            <!-- jquery.dd.min js -->
            <script src="<?php echo $url; ?>vistas/assets/js/jquery.dd.min.js"></script>

            <!-- slick js -->
            <script src="<?php echo $url; ?>vistas/assets/js/slick.min.js"></script>

            <!-- elevatezoom js -->
            <script src="<?php echo $url; ?>vistas/assets/js/jquery.elevatezoom.js"></script>

            <!-- scripts js --> 
            <script src="<?php echo $url; ?>vistas/assets/js/scripts.js"></script>

            <!-- custom -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

            <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

            <!-- plantilla js --> 
            <script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
            
            <script src="<?php echo $url; ?>vistas/js/header.js"></script>
            
            <script src="<?php echo $url; ?>vistas/js/home.js"></script>

            <script src="<?php echo $url; ?>vistas/js/login.js"></script>

            <script src="<?php echo $url; ?>vistas/js/usuario.js"></script>
            
            <script src="<?php echo $url; ?>vistas/js/deseos.js"></script>
            
            <script src="<?php echo $url; ?>vistas/js/info_producto.js"></script>

            <script src="<?php echo $url; ?>vistas/js/carrito.js"></script>

            <?php if($sw_prods){ ?>
            <script src="<?php echo $url; ?>vistas/js/productos.js"></script>
            <?php } ?>
            
            <script src="<?php echo $url; ?>vistas/js/registro_comercio.js"></script>

            <script src="<?php echo $url; ?>vistas/js/perfil.js"></script>
            
            <script src="<?php echo $url; ?>vistas/js/checkout.js"></script>

    </body>

</html>

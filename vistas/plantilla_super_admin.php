<?php 
    if (session_status() === PHP_SESSION_NONE) session_start();
    // ruta fija del proyecto 
    $url = Ruta::ctrRuta();
    $rutas = explode("/", $_GET['ruta']);
    if($rutas[0] == 'cerrar'){
        session_destroy();
        header('Location:home');
    }else if($rutas[0] == 'admin' || $rutas[0] == 'perfil'){
        if(!isset($_SESSION['idUsuario'])){
            header('Location:'.$url.'home');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="Anil z" name="author">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
        <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <!-- SITE TITLE -->
        <title>Tu Feria Virtual</title>
        <?php 
            $plantilla = ControladorPlantilla::ctrEstiloPlantilla();
            // var_dump($url);
        ?>
        <!-- Favicon Icon / cambiar el icono -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/LOGO.png <?php $plantilla['favicon'] ?>">
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
        <!-- DataTables js -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo $url; ?>vistas/assets/css/custom.css">
    </head>
    <body>
        <!-- LOADER -->
        <div class="preloader">
            <div class="lds-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- END LOADER -->
        <?php 
            /*
             ____             _             _     _         ____  _                       _            
            / ___|___   _ __ | |_ ___ _ __ (_) __| | ___   |  _ \(_)_ __   __ _ _ __ ___ (_) ___ ___   
            | |   / _ \| '_ \| __/ _ \ '_ \| |/ _` |/ _ \  | | | | | '_ \ / _` | '_ ` _ \| |/ __/ _ \  
            | |__| (_) | | | | ||  __/ | | | | (_| | (_) | | |_| | | | | | (_| | | | | | | | (_| (_) | 
            \____|\___/|_| |_|\__\___|_| |_|_|\__,_|\___/  |____/|_|_| |_|\__,_|_| |_| |_|_|\___\___/                                                                                         
    
            */
            include "modulos/header_admin.php";
            $rutas = array();
            $ruta = null;
            if(isset($_GET['ruta']) && $_GET['ruta'] != 'admin'){
                $rutas = explode("/", $_GET['ruta']);
                $item = "ruta";
                $valor = $rutas[0];
                $whiteListGeneric = array("productos","perfil");
                if(in_array($valor, $whiteListGeneric)){
                    include "modulos/super=admin/".$valor.".php";    
                }
            }else{
                include "modulos/super-admin/admin.php";
            }   
        ?>
        <?php include "modulos/footer.php" ?>
        <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 
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
        <script src="<?php echo $url; ?>vistas/js/aceptar.js"></script>
        <!-- custom -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
        <!-- plantilla js --> 
        <script src="<?php echo $url; ?>vistas/js/plantilla.js"></script>
        <script src="<?php echo $url; ?>vistas/js/header.js"></script>
        <?php if($rutas[0] == 'productos'){ ?>
            <script src="<?php echo $url; ?>vistas/js/admin/productos.js"></script>
        <?php } ?>
        <script src="<?php echo $url; ?>vistas/js/admin/perfil.js"></script> 
    </body>
</html>
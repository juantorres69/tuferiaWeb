<?php 

require_once '../modelos/home.modelo.php';

class AjaxPublicidad{

    public function consultarBanners(){
        $tabla = "banner_home";
        $resp = ModeloHome::mdlConsultarBanners($tabla);
        echo json_encode($resp);
    }

    public function guardarBanner($post, $imagen){
        $tabla = "banner_home";
        $resp = ModeloHome::mdlGuardarBanner($tabla, $post, $imagen);
        echo json_encode($resp);
    }

    public function consultarBanner($banner){
        $tabla = "banner_home";
        $resp = ModeloHome::mdlConsultarBanner($tabla, $banner);
        echo json_encode($resp);
    }

    public function eliminarBanner($banner){
        $tabla = "banner_home";
        $resp = ModeloHome::mdlEliminarBanner($tabla, $banner);
        echo json_encode($resp);
    }

    public function consultarMegaPromo(){
        $tabla = "mega_promo_home";
        $resp = ModeloHome::mdlConsultarMegaPromo($tabla);
        echo json_encode($resp);
    }

    public function editarMegaPromo($post, $imagen){
        $tabla = "mega_promo_home";
        $resp = ModeloHome::mdlEditarMegaPromo($tabla, $post, $imagen);
        echo json_encode($resp);
    }

    public function consultarPromociones(){
        $tabla = "promociones_home";
        $resp = ModeloHome::mdlConsultarPromos($tabla);
        echo json_encode($resp);
    }

    public function consultarPromocion($promo){
        $tabla = "promociones_home";
        $resp = ModeloHome::mdlConsultarPromocion($tabla, $promo);
        echo json_encode($resp);
    }

    public function editarPromocion($post, $imagen){
        $tabla = "promociones_home";
        $resp = ModeloHome::mdlEditarPromocion($tabla, $post, $imagen);
        echo json_encode($resp);
    }

}

if(isset($_POST['accion'])){
    $objeto = new AjaxPublicidad();
    if($_POST['accion'] == 'consultarBanners'){
        $objeto->consultarBanners();
    }else if($_POST['accion'] == 'guardarBanner'){
        $objeto->guardarBanner($_POST, $_FILES);
    }else if($_POST['accion'] == 'consultarBanner'){
        $objeto->consultarBanner($_POST['banner']);
    }else if($_POST['accion'] == 'eliminarBanner'){
        $objeto->eliminarBanner($_POST['banner']);
    }else if($_POST['accion'] == 'consultarMegaPromo'){
        $objeto->consultarMegaPromo();
    }else if($_POST['accion'] == 'editarMegaPromo'){
        $objeto->editarMegaPromo($_POST, $_FILES);
    }else if($_POST['accion'] == 'consultarPromociones'){
        $objeto->consultarPromociones();
    }else if($_POST['accion'] == 'consultarPromocion'){
        $objeto->consultarPromocion($_POST['promo']);
    }else if($_POST['accion'] == 'editarPromocion'){
        $objeto->editarPromocion($_POST, $_FILES);
    }
    
}

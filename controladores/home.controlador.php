<?php 

class ControladorHome{

    static public function ctrConsultarBanners(){
        $tabla = "banner_home";
        $resp = ModeloHome::mdlConsultarBanners($tabla);
        return $resp;
    }

    static public function ctrConsultarPromos(){
        $tabla = "promociones_home";
        $resp = ModeloHome::mdlConsultarPromos($tabla);
        return $resp;
    }

    static public function ctrConsultarMegaPromo(){
        $tabla = "mega_promo_home";
        $resp = ModeloHome::mdlConsultarMegaPromo($tabla);
        return $resp;
    }

}
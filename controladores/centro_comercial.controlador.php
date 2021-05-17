<?php 

class ControladorCentroComercial {

    static public function ctrConsultarCentrosComerciales(){
        $tabla = "centros_comerciales";
        $resp = ModeloCentroComercial::mdlConsultarCentrosComerciales($tabla);
        return $resp;
    }

}
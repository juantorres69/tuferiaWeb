<?php 

class ControladorConfig {

    static public function ctrConsultarConfig(){
        $tabla = "comercio";
        $resp = ModeloConfig::mdlConsultarConfig($tabla);
        return $resp;
    }

}
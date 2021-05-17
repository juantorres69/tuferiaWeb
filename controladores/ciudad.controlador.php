<?php 

class ControladorCiudad {

    static public function ctrConsultarCiudades(){
        $tabla = "ciudad";
        $resp = ModeloCiudad::mdlConsultarCiudades($tabla);
        return $resp;
    }

}
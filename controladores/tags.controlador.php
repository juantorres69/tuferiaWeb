<?php 

class ControladorTags {

    static public function ctrConsultarTags($item, $valor){
        $tabla = "tags";
        $resp = ModeloTags::mdlConsultarTags($tabla, $item, $valor);
        return $resp;
    }

}
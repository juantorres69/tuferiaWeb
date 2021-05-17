<?php 

require_once '../modelos/config.modelo.php';

class AjaxConfig{

    public function guardarConfig($post){
        $tabla = 'comercio';
        $resp = ModeloConfig::mdlGuardarConfig($tabla, $post);
        echo json_encode($resp);
    }

}

if(isset($_POST['accion'])){
    $objeto = new AjaxConfig();
    if($_POST['accion'] == 'guardarConfig'){
        $objeto->guardarConfig($_POST);
    }
}

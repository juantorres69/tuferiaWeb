<?php 

require_once '../modelos/usuario.modelo.php';

class AjaxPedidos{

    public function cambiarEstado($post){
        $tabla = 'compras';
        $resp = ModeloUsuario::mdlCambiarEstadoPedido($tabla, $post);
        echo json_encode($resp);
    }

}

if(isset($_POST['accion'])){
    $objeto = new AjaxPedidos();
    if($_POST['accion'] == 'cambiarEstado'){
        $objeto->cambiarEstado($_POST);
    }
}

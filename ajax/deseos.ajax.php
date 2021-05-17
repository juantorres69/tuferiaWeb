<?php 

require_once '../modelos/productos.modelo.php';

class AjaxDeseos{

    public function eliminarDeseo($lista){
        $tabla = 'lista_deseos';
        $item = 'id';
        ModeloProductos::mdlEliminarDeseo($tabla, $item, $lista);
        $result = array('ErrorStatus' => false, 'Msj' => 'Se ha eliminado el producto de la lista de deseos.');
        echo json_encode($result);
    }

}

if(isset($_POST['accion'])){

    $objeto = new AjaxDeseos();
    if($_POST['accion'] == 'eliminarDeseo'){
        $objeto->eliminarDeseo($_POST['id']);
    }
}


?>
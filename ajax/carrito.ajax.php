<?php 

if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../modelos/productos.modelo.php';

class AjaxCarrito{

    public function agregarCarrito($carrito){
        $tabla = 'carrito';
        ModeloProductos::mdlAgregarCarrito($tabla, $carrito);
        $result = array('ErrorStatus' => false, 'Msj' => 'Se ha agregado el producto al carrito.');
        echo json_encode($result);
    }

    public function eliminarCarrito($carrito){
        $tabla = 'carrito';
        $item = 'id';
        ModeloProductos::mdlEliminarCarrito($tabla, $item, $carrito);
        $result = array('ErrorStatus' => false, 'Msj' => 'Se ha eliminado el producto del carrito.');
        echo json_encode($result);
    }

    public function guardarCantidad($datos){
        $tabla = 'carrito';
        $item = 'cantidad';
        $valor = $datos['cantidad'];
        $carrito = $datos['carrito'];
        ModeloProductos::mdlGuardarCantidad($tabla, $item, $valor, $carrito);
        $result = array('ErrorStatus' => false, 'Msj' => 'Se ha modificado la cantidad en el carrito.');
        echo json_encode($result);
    }

}

if(isset($_POST['accion'])){

    $objeto = new AjaxCarrito();
    if($_POST['accion'] == 'agregarCarrito'){
        if(isset($_SESSION['idUsuario'])){
            $objeto->agregarCarrito($_POST);
        }else{
            echo json_encode(array('ErrorStatus'=>true, 'Debe Iniciar Sesion.'));
        }
    }else if($_POST['accion'] == 'eliminarCarrito'){
        $objeto->eliminarCarrito($_POST['id']);
    }else if($_POST['accion'] == 'guardarCantidad'){
        $objeto->guardarCantidad($_POST);
    }
}


?>
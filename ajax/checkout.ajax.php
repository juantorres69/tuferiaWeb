<?php 

require_once '../modelos/checkout.modelo.php';
require_once '../modelos/productos.modelo.php';

class AjaxCheckout{

    public function comercionSettings(){
        $tabla = 'comercio';
        $detalle = ModeloCheckout::mdlMostrarComercioSettings($tabla);
        echo json_encode($detalle);
    }

    public function guardarCompra($data){
        $tabla = 'compras';
        $detalle = ModeloCheckout::mdlGuardarCompra($tabla, $data);
        echo json_encode($detalle);
    }

    public function guardarDetalleCompra($data){
        $tabla = 'detalle_compra';
        $detalle = ModeloCheckout::guardarDetalleCompra($tabla, $data);
        echo json_encode($detalle);
    }

    public function detalleComprasAdmin($reporte){
        $tabla = 'detalle_compra';
        $detalle = ModeloProductos::mdlDetalleCompraComercios($tabla, $reporte);
        echo json_encode($detalle);
    }

}

if(isset($_POST['accion'])){
    $objeto = new AjaxCheckout();
    if($_POST['accion'] == 'comercionSettings'){
        $objeto->comercionSettings();
    }else if($_POST['accion'] == 'guardarCompra'){
        $objeto->guardarCompra($_POST);
    }else if($_POST['accion'] == 'guardarDetalleCompra'){
        $objeto->guardarDetalleCompra($_POST['data']);
    }else if($_POST['accion'] == 'detalle_compras_comercio_admin'){
        $objeto->detalleComprasAdmin($_POST['reporte']);
    }
}

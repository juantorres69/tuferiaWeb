<?php 

require_once '../modelos/detalles_productos.modelo.php';

class AjaxDetallesProductos{

    public function consultarDetalle($detalle){
        $resp = ModeloDetallesProductos::mdlConsultarDetalle($detalle);
        echo json_encode($resp);
    }

    public function guardarColor($color){
        $tabla = 'colores';
        $resp = ModeloDetallesProductos::mdlGuardarColor($tabla, $color);
        echo json_encode($resp);
    }

    public function guardarTalla($talla){
        $tabla = 'tallas';
        $resp = ModeloDetallesProductos::mdlGuardarTalla($tabla, $talla);
        echo json_encode($resp);
    }

    public function guardarTag($tag){
        $tabla = 'tags';
        $resp = ModeloDetallesProductos::mdlGuardarTag($tabla, $tag);
        echo json_encode($resp);
    }

}

if(isset($_POST['accion'])){
    $objeto = new AjaxDetallesProductos();
    if($_POST['accion'] == 'consultarDetalle'){
        $objeto->consultarDetalle($_POST['detalle']);
    }else if($_POST['accion'] == 'guardarColor'){
        $objeto->guardarColor($_POST);
    }else if($_POST['accion'] == 'guardarTalla'){
        $objeto->guardarTalla($_POST);
    }else if($_POST['accion'] == 'guardarTag'){
        $objeto->guardarTag($_POST);
    }
}

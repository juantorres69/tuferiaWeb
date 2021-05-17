<?php 

require_once '../modelos/productos.modelo.php';
require_once '../modelos/categorias.modelo.php';

class AjaxCategorias{

    public function consultarCategorias(){
        $tabla = "categorias";
        $resp = ModeloProductos::mdlMostrarCategorias($tabla, null, null);
        echo json_encode($resp);
    }

    public function guardarCategoria($categoria){
        $tabla = "categorias";
        $resp = ModeloCategorias::mdlGuardarCategoria($tabla, $categoria);
        echo json_encode($resp);
    }

    public function consultarCategoria($categoria){
        $tabla = "categorias";
        $item = 'id';
        $resp = ModeloCategorias::mdlConsultarCategoria($tabla, $item, $categoria);
        echo json_encode($resp);
    }

    public function guardarSubcategorias($subcat){
        $tabla = "subcategorias";
        $resp = ModeloCategorias::mdlGuardarSubCategoria($tabla, $subcat);
        echo json_encode($resp);
    }

    public function eliminarSubcategoria($subcategoria){
        $tabla = "subcategorias";
        $item = 'id';
        $resp = ModeloCategorias::mdlEliminarSubCategoria($tabla, $item, $subcategoria);
        echo json_encode($resp);
    }

    public function eliminarCategoria($categoria){
        $tabla = "categorias";
        $item = 'id';
        $resp = ModeloCategorias::mdlEliminarCategoria($tabla, $item, $categoria);
        echo json_encode($resp);
    }

}

if(isset($_POST['accion'])){
    $objeto = new AjaxCategorias();
    if($_POST['accion'] == 'consultarCategorias'){
        $objeto->consultarCategorias();
    }else if($_POST['accion'] == 'guardarCategoria'){
        $objeto->guardarCategoria($_POST);
    }else if($_POST['accion'] == 'consultarCategoria'){
        $objeto->consultarCategoria($_POST['categoria']);
    }else if($_POST['accion'] == 'guardarSubcategorias'){
        $objeto->guardarSubcategorias($_POST);
    }else if($_POST['accion'] == 'eliminarSubcategoria'){
        $objeto->eliminarSubcategoria($_POST['subcategoria']);
    }else if($_POST['accion'] == 'eliminarCategoria'){
        $objeto->eliminarCategoria($_POST['categoria']);
    }
}

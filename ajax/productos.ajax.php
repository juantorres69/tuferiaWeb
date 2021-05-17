<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../modelos/productos.modelo.php';

class AjaxProductos{

    public function consultarProductos($consulta){
        $tabla = 'productos';
        $tabla_color = 'producto_color';
        $tabla_image = 'producto_imagen';
        $item_color = 'producto_id';
        $item_image = 'producto_id';
        $item = 'ruta';
        $productos = ModeloProductos::mdlConsultarProductos($tabla,$consulta,$item);
        $products = [];
        foreach($productos as $prod){
            $colores = ModeloProductos::mdlConsultarColores($tabla_color, $item_color, $prod['id']);
            $prod['colores'] = $colores;
            $images = ModeloProductos::mdlConsultarImagenes($tabla_image, $item_image, $prod['id']);
            if(isset($images[0]))
                $prod['imagen'] = $images[0]['imagen'];
            $products[] = $prod;
        }
        $total = ModeloProductos::mdlProductosCount($tabla, $consulta, $item);
        $result = [];
        $result['total'] = $total['total'];
        $result['productos'] = $products;
        echo json_encode($result);
    }

    public function consultaDetalleProductos($id){
        $tabla = 'detalle_compra';
        $item = "id_compra";
        $detalle = ModeloProductos::mdlDetalleCompra($tabla, $item, $id);
        echo json_encode($detalle);
    }

    public function consultaDetalleProductosComercio($id){
        $tabla = 'detalle_compra';
        $item = "id_compra";
        $detalle = ModeloProductos::mdlDetalleCompraComercio($tabla, $item, $id);
        echo json_encode($detalle);
    }

    public function consultaCarrito($item, $id){
        $tabla = 'carrito';
        $detalle = ModeloProductos::mdlConsultarCarrito($tabla, $item, $id);
        echo json_encode($detalle);
    }

    public function consultarProductosAdmin(){
        $tabla = 'productos';
        $item = 'id_comercio';
        $valor = $_SESSION['comercio'];
        $productos = ModeloProductos::mdlConsultarProductosAdmin($tabla, $item, $valor);
        echo json_encode($productos);
    }

    public function consultarSubcategorias($categoria){
        $tabla = "subcategorias";
        $item = "id_categoria";
        $resp = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $categoria);
        echo json_encode($resp);
    }

    public function guardarProducto($producto, $images){
        $tabla = "productos";
        $resp = ModeloProductos::mdlGuardarProducto($tabla, $producto, $images);
        echo json_encode($resp);
    }

    public function consultarProducto($producto){
        $tabla = "productos";
        $item = 'id';
        $resp = ModeloProductos::mdlDetalleProducto($tabla, $item, $producto);
        $tabla = "producto_imagen";
        $item = 'producto_id';
        $images = ModeloProductos::mdlConsultarImagenes($tabla, $item, $producto);
        $resp['images'] = $images;
        echo json_encode($resp);
    }

    public function consultarColores($producto){
        $item = 'producto_id';
        $tabla = 'producto_color';
        $resp = ModeloProductos::mdlConsultarColores($tabla, $item, $producto);
        echo json_encode($resp);
    }

    public function agregarVariable($post){
        if($post['variable'] == 'color'){
            $tabla = 'producto_color';
            $item = 'color_id';
        }else if($post['variable'] == 'talla'){
            $tabla = 'producto_talla';
            $item = 'talla_id';
        }else if($post['variable'] == 'tag'){
            $tabla = 'productos_tags';
            $item = 'tag_id';
        }
        $resp = ModeloProductos::mdlAgregarVariable($tabla, $item, $post);
        echo json_encode($resp);
    }

    public function eliminarVariable($post){
        if($post['variable'] == 'color'){
            $tabla = 'producto_color';
            $item = 'color_id';
        }else if($post['variable'] == 'talla'){
            $tabla = 'producto_talla';
            $item = 'talla_id';
        }else if($post['variable'] == 'tag'){
            $tabla = 'productos_tags';
            $item = 'tag_id';
        }
        $resp = ModeloProductos::mdlEliminarVariable($tabla, $item, $post);
        echo json_encode($resp);
    }

    public function consultarTallas($producto){
        $item = 'producto_id';
        $tabla = 'producto_talla';
        $resp = ModeloProductos::mdlConsultarTallas($tabla, $item, $producto);
        echo json_encode($resp);
    }

    public function consultarTags($producto){
        $tabla = "productos_tags";
        $item = 'producto_id';
        $resp = ModeloProductos::mdlConsultarTags($tabla, $item, $producto);
        echo json_encode($resp);
    }

}

if(isset($_POST['accion'])){

    $objeto = new AjaxProductos();
    if($_POST['accion'] == 'consultarProductos'){
        $objeto->consultarProductos($_POST);
    }else if($_POST['accion'] == 'consultaDetalleCompra'){
        $objeto->consultaDetalleProductos($_POST['id']);
    }else if($_POST['accion'] == 'consultaDetalleCompraComercio'){
        $objeto->consultaDetalleProductosComercio($_POST['id']);
    }else if($_POST['accion'] == 'consultaCarrito'){
        $item = 'usuario_id';
        $objeto->consultaCarrito($item ,$_POST['usuarioId']);
    }else if($_POST['accion'] == 'consultarProductosAdmin'){
        $objeto->consultarProductosAdmin();
    }else if($_POST['accion'] == 'consultarSubcategorias'){
        $objeto->consultarSubcategorias($_POST['categoria']);
    }else if($_POST['accion'] == 'guardarProducto'){
        $objeto->guardarProducto($_POST, $_FILES);
    }else if($_POST['accion'] == 'consultarProducto'){
        $objeto->consultarProducto($_POST['producto']);
    }else if($_POST['accion'] == 'consultarColores'){
        $objeto->consultarColores($_POST['producto']);
    }else if($_POST['accion'] == 'agregarVariable'){
        $objeto->agregarVariable($_POST);
    }else if($_POST['accion'] == 'eliminarVariable'){
        $objeto->eliminarVariable($_POST);
    }else if($_POST['accion'] == 'consultarTallas'){
        $objeto->consultarTallas($_POST['producto']);
    }else if($_POST['accion'] == 'consultarTags'){
        $objeto->consultarTags($_POST['producto']);
    }
}


?>
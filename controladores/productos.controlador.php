<?php

class ControladorProductos {

    static public function ctrMostrarCategorias($item, $valor){
        $tabla = "categorias";
        $resp = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrMostrarSubCategorias($item, $valor){
        $tabla = "subcategorias";
        $resp = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);
        return $resp;
    }

    public static function ctrMostrarProductosSimple($item,$valor){
        $tabla = 'productos';
        $resp = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        return $resp;
    } 

    static public function ctrMostrarProductos($item, $valor){
        $ruta = $valor;
        $tabla = 'categorias';
        $item = 'ruta';
        $resp = ModeloProductos::mdlConsultarCategoria($tabla, $item, $valor);
        $item = 'id_categoria';
        $tabla = 'productos';
        $valor = $resp['id'];
        $resp = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        if(count($resp) > 0){
            return $resp;
        }
        $tabla = 'subcategorias';
        $item = 'ruta';
        $resp = ModeloProductos::mdlConsultarCategoria($tabla, $item, $ruta);
        $item = 'id_subcategoria';
        $tabla = 'productos';
        $valor = $resp['id'];
        $resp = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        if(count($resp) > 0){
            return $resp;
        }
        $item = 'ruta';
        $tabla = 'productos';
        $valor = $ruta;
        $resp = ModeloProductos::mdlConsultarProductosTag($tabla, $item, $valor);
        if(count($resp) > 0){
            return $resp;
        }
        $tabla = 'productos';
        $resp = ModeloProductos::mdlMostrarProductosAll($tabla);
        return $resp;
    }

    static public function ctrMostrarColores($item, $valor){
        $item = 'producto_id';
        $tabla = 'producto_color';
        $resp = ModeloProductos::mdlConsultarColores($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrDetalleProducto($item, $valor){
        $tabla = "productos";
        $resp = ModeloProductos::mdlDetalleProducto($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrMostrarTallas($item, $valor){
        $item = 'producto_id';
        $tabla = 'producto_talla';
        $resp = ModeloProductos::mdlConsultarTallas($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrConsultarImagenes($item, $valor){
        $tabla = "producto_imagen";
        $resp = ModeloProductos::mdlConsultarImagenes($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrConsultarTags($item, $valor){
        $tabla = "productos_tags";
        $resp = ModeloProductos::mdlConsultarTags($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrConsultarFicha($item, $valor){
        $tabla = 'criterios_productos';
        $resp = ModeloProductos::mdlConsultarFicha($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrConsultarRecientes($item, $valor, $limit){
        $tabla = 'productos';
        $resp = ModeloProductos::mdlConsultarRecientes($tabla, $item, $valor, $limit);
        return $resp;
    }

    static public function ctrConsultarDestacados($item, $valor, $limit){
        $tabla = 'productos';
        $resp = ModeloProductos::mdlConsultarDestacados($tabla, $item, $valor, $limit);
        return $resp;
    }

    static public function ctrConsultarMasVendidos($item, $valor, $limit){
        $tabla = 'productos';
        $resp = ModeloProductos::mdlConsultarMasVendidos($tabla, $item, $valor, $limit);
        return $resp;
    }

    static public function ctrAgregarDeseos($valor){
        $tabla = 'lista_deseos';
        ModeloProductos::mdlAgregarDeseos($tabla, $valor);
    }

    static public function ctrConsultarDeseos($item, $valor){
        $tabla = 'lista_deseos';
        $resp = ModeloProductos::mdlConsultarDeseos($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrConsultarCarrito($item, $valor){
        $tabla = 'carrito';
        $resp = ModeloProductos::mdlConsultarCarrito($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrEliminarCarrito($item, $valor){
        $tabla = 'carrito';
        $resp = ModeloProductos::mdlEliminarCarrito($tabla, $item, $valor);
        return $resp;
    }

    static public function crtConsultarVariables($tabla){
        $item = 'estado';
        $valor = 1;
        $resp = ModeloProductos::mdlConsultarVariables($tabla, $item, $valor);
        return $resp;
    }



    static public function ctrDetalleCompra($item, $valor){
        $tabla = 'detalle_compra';
        $resp = ModeloProductos::mdlDetalleCompra($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrDetalleCompraComercio($item, $valor){
        $tabla = 'detalle_compra';
        $resp = ModeloProductos::mdlDetalleCompraComercio($tabla, $item, $valor);
        return $resp;
    }

    static public function ctrDetalleCompraComercios($item){
        $tabla = 'detalle_compra';
        $resp = ModeloProductos::mdlDetalleCompraComercio($tabla);
        return $resp;
    }

}

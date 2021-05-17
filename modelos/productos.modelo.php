<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once "conexion.php";

class ModeloProductos{

    static public function mdlMostrarCategorias($tabla, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("select * from $tabla where $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            $stmt = Conexion::conectar()->prepare("select * from $tabla");
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlMostrarSubCategorias($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarCategoria($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarProductos($tabla, $consulta, $item){
        $mostrar = $consulta['mostrar'];
        $inicio = $mostrar * ($consulta['page']-1);
        $ruta = explode('/', $consulta['ruta']);
        $estado = 1;
        $valor = '';
        if($ruta[0] == 'productos'){
            $query = "select * from $tabla where estado = 1 limit $inicio,$mostrar";
        }else if($ruta[0] == 'tags'){
            $valor = $ruta[1];
            $query = "select t.*
                        from $tabla t 
                        inner join productos_tags pt on t.id = pt.producto_id
                        inner join tags tg on pt.tag_id=tg.id
                        where tg.ruta=:$item limit $inicio,$mostrar";
        }else if($ruta[0] == 'buscar'){
            $item = 'nombre';
            if(count($ruta) == 2){
                $valor = '%'.$ruta[1].'%';
                $query = "select * from $tabla where $item like :$item and estado = 1 limit $inicio,$mostrar";
            }else{
                $valor = '%'.$ruta[2].'%';
                $cat = $ruta[1];
                $query = "select t.*
                            from $tabla t
                            inner join categorias c on t.id_categoria=c.id
                            where t.$item like :$item and c.ruta='$cat' and t.estado = 1 limit $inicio,$mostrar";
            }
        }else{
            $tabla = 'categorias';
            $valor = $ruta[0];
            $resp = self::mdlConsultarCategoria($tabla,$item,$valor);
            if(!$resp){
                $tabla = 'subcategorias';
                $resp = self::mdlConsultarCategoria($tabla,$item,$valor);
                $item = 'id_subcategoria';
            }else{
                $item = 'id_categoria'; 
            }
            $tabla = 'productos';
            $valor = $resp['id'];
            $query = "select * from $tabla where $item = :$item limit $inicio,$mostrar";

        }
        $stmt = Conexion::conectar()->prepare($query);
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlMostrarProductos($tabla,$item,$valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlProductosCount($tabla, $consulta, $item){
        $ruta = explode('/', $consulta['ruta']);
        if($ruta[0] == 'productos'){
            $query = "select count(*) as total from $tabla where estado=1";
        }else if($ruta[0] == 'tags'){
            $valor = $ruta[1];
            $query = "select count(*) as total
                        from $tabla t 
                        inner join productos_tags pt on t.id = pt.producto_id
                        inner join tags tg on pt.tag_id=tg.id
                        where tg.ruta=:$item";
        }else if($ruta[0] == 'buscar'){
            $item = 'nombre';
            if(count($ruta) == 2){
                $valor = '%'.$ruta[1].'%';
                $query = "select count(*) as total from $tabla where $item like :$item and estado = 1";
            }else{
                $valor = '%'.$ruta[2].'%';
                $cat = $ruta[1];
                $query = "select count(*) as total
                            from $tabla t
                            inner join categorias c on t.id_categoria=c.id
                            where t.$item like :$item and c.ruta='$cat' and t.estado = 1";
            }
        }else{
            $tabla = 'categorias';
            $valor = $ruta[0];
            $resp = self::mdlConsultarCategoria($tabla,$item,$valor);
            if(!$resp){
                $tabla = 'subcategorias';
                $resp = self::mdlConsultarCategoria($tabla,$item,$valor);
                $item = 'id_subcategoria';
            }else{
                $item = 'id_categoria'; 
            }
            $tabla = 'productos';
            $valor = $resp['id'];
            $query = "select count(*) as total from $tabla where $item = :$item";
        }
        $stmt = Conexion::conectar()->prepare($query);
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarColores($tabla, $item, $valor){
        $estado = 1;
        $stmt = Conexion::conectar()->prepare("select c.* from $tabla t 
                                                inner join colores c on t.color_id = c.id 
                                                where t.$item = :$item and c.estado = :$estado");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":".$estado, $estado, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlDetalleProducto($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select t.*, c.categoria, c.ruta as categoria_ruta
                                                from $tabla t
                                                inner join categorias c on t.id_categoria=c.id
                                                where t.$item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarTallas($tabla, $item, $valor){
        $estado = 1;
        $stmt = Conexion::conectar()->prepare("select tl.* from $tabla t 
                                                inner join tallas tl on t.talla_id = tl.id 
                                                where t.$item = :$item and tl.estado = :$estado");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":".$estado, $estado, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarImagenes($tabla, $item, $valor){
        $estado = 1;
        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item = :$item and estado = :$estado");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":".$estado, $estado, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarTags($tabla, $item, $valor){
        $estado = 1;
        $stmt = Conexion::conectar()->prepare("select tg.* from $tabla t
                                                inner join tags tg on t.tag_id = tg.id
                                                where t.$item = :$item and tg.estado = :$estado");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":".$estado, $estado, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarFicha($tabla, $item, $valor){
        $estado = 1;
        $stmt = Conexion::conectar()->prepare("select ft.*, t.valor from $tabla t
                                                inner join criterios_ficha_tecnica ft on t.criterio_id = ft.id
                                                where t.$item = :$item and ft.estado = :$estado");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":".$estado, $estado, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarRecientes($tabla, $item, $valor, $limit){
        $estado = 1;
        $stmt = Conexion::conectar()->prepare("select *, (select imagen from producto_imagen where producto_id = t.id limit 1) as imagen
                                                from $tabla t
                                                where t.estado = :$estado order by t.id desc limit $limit");
        $stmt -> bindParam(":".$estado, $estado, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarMasVendidos($tabla, $item, $valor, $limit){
        $estado = 1;
        $stmt = Conexion::conectar()->prepare("select *, (select imagen from producto_imagen where producto_id = t.id limit 1) as imagen
                                                from $tabla t
                                                where t.estado = :$estado order by t.compados desc limit $limit");
        $stmt -> bindParam(":".$estado, $estado, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarDestacados($tabla, $item, $valor, $limit){
        $estado = 1;
        $stmt = Conexion::conectar()->prepare("select *, (select imagen from producto_imagen where producto_id = t.id limit 1) as imagen
                                                from $tabla t
                                                where t.estado = :$estado order by t.rating desc limit $limit");
        $stmt -> bindParam(":".$estado, $estado, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarProductosTag($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select t.*
                                                from $tabla t 
                                                inner join productos_tags pt on t.id = pt.producto_id
                                                inner join tags tg on pt.tag_id=tg.id
                                                where tg.ruta=:$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlAgregarDeseos($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("select count(*) as existe from productos where id = :producto");
        $stmt -> bindParam(":producto", $valor, PDO::PARAM_STR);
        $stmt -> execute();
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        if($existe['existe'] > 0){
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where producto_id = :producto and usuario_id = :usuario");
            $stmt -> bindParam(":producto", $valor, PDO::PARAM_STR);
            $stmt -> bindParam(":usuario", $_SESSION['idUsuario'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        values(
                                                            null,
                                                            :producto,
                                                            :usuario,
                                                            now()
                                                        )");
                $stmt -> bindParam(":producto", $valor, PDO::PARAM_STR);
                $stmt -> bindParam(":usuario", $_SESSION['idUsuario'], PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
            }
        }
    }

    static public function mdlConsultarDeseos($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select p.*, (select imagen from producto_imagen where producto_id = p.id limit 1) as imagen, t.id as id_lista, c.ruta as categoria
                                                from $tabla t
                                                inner join productos p on t.producto_id=p.id
                                                inner join categorias c on p.id_categoria = c.id
                                                where t.$item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlEliminarDeseo($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("delete from $tabla where $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
    }

    static public function mdlAgregarCarrito($tabla, $valor){
        $color = ($valor['color'] == '') ? 0 : $valor['color'];
        $talla = ($valor['talla'] == '') ? 0 : $valor['talla'];
        $stmt = Conexion::conectar()->prepare("select count(*) as existe 
                                                from $tabla 
                                                where usuario_id = :usuario 
                                                and producto_id = :producto 
                                                and color_id = :color 
                                                and talla_id = :talla");
        $stmt -> bindParam(":usuario", $_SESSION['idUsuario'], PDO::PARAM_STR);
        $stmt -> bindParam(":producto", $valor['producto'], PDO::PARAM_STR);
        $stmt -> bindParam(":color", $color, PDO::PARAM_STR);
        $stmt -> bindParam(":talla", $talla, PDO::PARAM_STR);
        $stmt -> execute();
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        if($existe['existe'] == 0){
            $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                    values(
                                                        null,
                                                        :usuario,
                                                        :producto,
                                                        :color,
                                                        :talla,
                                                        :cantidad,
                                                        now()
                                                    )");
            $stmt -> bindParam(":usuario", $_SESSION['idUsuario'], PDO::PARAM_STR);
            $stmt -> bindParam(":producto", $valor['producto'], PDO::PARAM_STR);
            $stmt -> bindParam(":color", $color, PDO::PARAM_STR);
            $stmt -> bindParam(":talla", $talla, PDO::PARAM_STR);
            $stmt -> bindParam(":cantidad", $valor['cantidad'], PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null;
        }
    }

    static public function mdlConsultarCarrito($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select p.*, (select imagen from producto_imagen where producto_id = p.id limit 1) as imagen, t.id as id_carrito, t.cantidad, c.ruta as categoria
                                                from $tabla t
                                                inner join productos p on t.producto_id=p.id
                                                inner join categorias c on p.id_categoria = c.id
                                                where t.$item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlEliminarCarrito($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("delete from $tabla where $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
    }

    static public function mdlGuardarCantidad($tabla, $item, $valor, $carrito){
        $stmt = Conexion::conectar()->prepare("update $tabla set $item=:$item where id=:id");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":id", $carrito, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
    }


    static public function mdlDetalleCompra($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla t
                                                        inner join productos p on t.id_producto=p.id
                                                        where t.$item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
        $stmt = null;
    }

    static public function mdlDetalleCompraComercio($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla t
                                                        inner join productos p on t.id_producto=p.id
                                                        where t.$item = :$item and p.id_comercio=:id_comercio");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> bindParam(":id_comercio", $_SESSION['comercio'], PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
        $stmt = null;
    }

    static public function mdlDetalleCompraComercios($tabla, $report){
        $stmt = Conexion::conectar()->prepare("select *, co.fecha as fecha_compra, t.valor as valor_compra from $tabla t
                                              inner join productos p on t.id_producto=p.id 
                                              inner join comercios c on p.id_comercio = c.id
                                              inner join compras co on t.id_compra = co.id
                                              inner join transacciones tr on co.referencia = tr.referencia");
        // $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        // $stmt -> bindParam(":id_comercio", $_SESSION['comercio'], PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
        $stmt = null;
    }


    static public function mdlConsultarProductosAdmin($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select t.*, c.categoria, (select imagen from producto_imagen where producto_id = t.id limit 1) as imagen
                                                from $tabla t
                                                inner join categorias c on t.id_categoria = c.id 
                                                where $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlGuardarProducto($tabla, $producto, $images){
        if($producto['hdProducto'] == ''){
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where sku = :txtSKU");
            $stmt -> bindParam(":txtSKU", $producto['txtSKU'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("insert into $tabla values
                                                            (
                                                                null,
                                                                :txtNombre,
                                                                :txtDescCorta,
                                                                :txtDescLarga,
                                                                :txtPrecio,
                                                                :txtOferta,
                                                                :txtSKU,
                                                                0,
                                                                0,
                                                                :txtGarantia,
                                                                :txtDevDinero,
                                                                :cbContraEntrega,
                                                                :cbCategoria,
                                                                :cbSubcategoria,
                                                                :cbTipo,
                                                                1,
                                                                :ruta,
                                                                :comercio,
                                                                0
                                                            )");
                $stmt -> bindParam(":txtNombre", $producto['txtNombre'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtDescCorta", $producto['txtDescCorta'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtDescLarga", $producto['txtDescLarga'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtPrecio", $producto['txtPrecio'], PDO::PARAM_STR);
                $oferta = ($producto['txtOferta'] == '') ? null : $producto['txtOferta'];
                $stmt -> bindParam(":txtOferta", $oferta, PDO::PARAM_STR);
                $stmt -> bindParam(":txtSKU", strtoupper($producto['txtSKU']), PDO::PARAM_STR);
                $stmt -> bindParam(":txtGarantia", $producto['txtGarantia'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtDevDinero", $producto['txtDevDinero'], PDO::PARAM_STR);
                $stmt -> bindParam(":cbContraEntrega", $producto['cbContraEntrega'], PDO::PARAM_STR);
                $stmt -> bindParam(":cbCategoria", $producto['cbCategoria'], PDO::PARAM_STR);
                $stmt -> bindParam(":cbSubcategoria", $producto['cbSubcategoria'], PDO::PARAM_STR);
                $stmt -> bindParam(":cbTipo", $producto['cbTipo'], PDO::PARAM_STR);
                $date = new DateTime();
                $ruta = str_replace(' ','-',$producto['txtNombre']).'-'.$date->getTimestamp();
                $stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
                $stmt -> bindParam(":comercio", $_SESSION['comercio'], PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                $stmt = Conexion::conectar()->prepare("select * from $tabla order by id desc limit 1");
                $stmt -> execute();
                $producto_new = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt = null;
                $i = 1;
                $tabla = 'producto_imagen';
                foreach($images as $img){
                    if($img['error'] == 0){
                        $original = explode('.', $img['name']);
                        $ext = $original[count($original)-1];
                        $file_name = strtoupper($producto['txtSKU']).'_'.$date->getTimestamp().'_'.$i.'.'.$ext;
                        move_uploaded_file($img['tmp_name'],'../assets/images/productos/'.$file_name);
                        $stmt = Conexion::conectar()->prepare("insert into $tabla values
                                                                    (
                                                                        null,
                                                                        :producto,
                                                                        :imagen,
                                                                        1
                                                                    )");
                        $stmt -> bindParam(":producto", $producto_new['id'], PDO::PARAM_STR);
                        $stmt -> bindParam(":imagen", $file_name, PDO::PARAM_STR);
                        $stmt -> execute();
                        $stmt = null;
                        $i++;
                    }
                }
                return array('ErrorStatus' => false, 'Msj' => 'El producto se ha guardado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'El SKU ya se encuentra registrado.');
            }
        }else{
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where sku = :txtSKU and id <> :hdProducto");
            $stmt -> bindParam(":txtSKU", $producto['txtSKU'], PDO::PARAM_STR);
            $stmt -> bindParam(":hdProducto", $producto['hdProducto'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("update $tabla set
                                                                nombre=:txtNombre,
                                                                descripcion_corta=:txtDescCorta,
                                                                descripcion_larga=:txtDescLarga,
                                                                precio=:txtPrecio,
                                                                oferta=:txtOferta,
                                                                sku=:txtSKU,
                                                                garantia=:txtGarantia,
                                                                devolucion_dinero=:txtDevDinero,
                                                                contra_entrega=:cbContraEntrega,
                                                                id_categoria=:cbCategoria,
                                                                id_subcategoria=:cbSubcategoria,
                                                                tipo=:cbTipo
                                                            where id = :hdProducto");
                $stmt -> bindParam(":txtNombre", $producto['txtNombre'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtDescCorta", $producto['txtDescCorta'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtDescLarga", $producto['txtDescLarga'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtPrecio", $producto['txtPrecio'], PDO::PARAM_STR);
                $oferta = ($producto['txtOferta'] == '') ? null : $producto['txtOferta'];
                $stmt -> bindParam(":txtOferta", $oferta, PDO::PARAM_STR);
                $stmt -> bindParam(":txtSKU", strtoupper($producto['txtSKU']), PDO::PARAM_STR);
                $stmt -> bindParam(":txtGarantia", $producto['txtGarantia'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtDevDinero", $producto['txtDevDinero'], PDO::PARAM_STR);
                $stmt -> bindParam(":cbContraEntrega", $producto['cbContraEntrega'], PDO::PARAM_STR);
                $stmt -> bindParam(":cbCategoria", $producto['cbCategoria'], PDO::PARAM_STR);
                $stmt -> bindParam(":cbSubcategoria", $producto['cbSubcategoria'], PDO::PARAM_STR);
                $stmt -> bindParam(":cbTipo", $producto['cbTipo'], PDO::PARAM_STR);
                $stmt -> bindParam(":hdProducto", $producto['hdProducto'], PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                $tabla = 'producto_imagen';
                $stmt = Conexion::conectar()->prepare("select * from $tabla where producto_id=:producto");
                $stmt -> bindParam(":producto", $producto['hdProducto'], PDO::PARAM_STR);
                $stmt -> execute();
                $imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt = null;
                $i = 1;
                $tabla = 'producto_imagen';
                foreach($images as $img){
                    $sw_insert = false;
                    if($img['error'] == 0){
                        if(isset($imagenes[$i-1]['imagen'])){
                            unlink('../assets/images/productos/'.$imagenes[$i-1]['imagen']);
                        }else{
                            $sw_insert = true;
                        }
                        $original = explode('.', $img['name']);
                        $ext = $original[count($original)-1];
                        $date = new DateTime();
                        $file_name = strtoupper($producto['txtSKU']).'_'.$date->getTimestamp().'_'.$i.'.'.$ext;
                        move_uploaded_file($img['tmp_name'],'../assets/images/productos/'.$file_name);
                        if($sw_insert){
                            $stmt = Conexion::conectar()->prepare("insert into $tabla values
                                                                    (
                                                                        null,
                                                                        :producto,
                                                                        :imagen,
                                                                        1
                                                                    )");
                            $stmt -> bindParam(":producto", $producto['hdProducto'], PDO::PARAM_STR);
                            $stmt -> bindParam(":imagen", $file_name, PDO::PARAM_STR);
                            $stmt -> execute();
                            $stmt = null;
                        }else{
                            $stmt = Conexion::conectar()->prepare("update $tabla set imagen=:imagen where id=:id");
                            $stmt -> bindParam(":imagen", $file_name, PDO::PARAM_STR);
                            $stmt -> bindParam(":id", $imagenes[$i-1]['id'], PDO::PARAM_STR);
                            $stmt -> execute();
                            $stmt = null;
                        }
                    }
                    $i++;
                }
                return array('ErrorStatus' => false, 'Msj' => 'El producto se ha actualizado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'El SKU ya se encuentra registrado.');
            }
        }
    }

    static public function mdlConsultarVariables($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item = :$item and estado=1");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null; 
    }

    static public function mdlAgregarVariable($tabla, $item, $post){
        $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where producto_id=:producto_id and $item=:$item");
        $stmt -> bindParam(":producto_id", $post['producto'], PDO::PARAM_STR);
        $stmt -> bindParam(":".$item, $post['valor'], PDO::PARAM_STR);
        $stmt -> execute();
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        if($existe['existe'] == 0){
            $stmt = Conexion::conectar()->prepare("insert into $tabla values(
                                                                        null,
                                                                        :producto,
                                                                        :valor,
                                                                        1
                                                                    )");
            $stmt -> bindParam(":producto", $post['producto'], PDO::PARAM_STR);
            $stmt -> bindParam(":valor", $post['valor'], PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null; 
            return array('ErrorStatus' => false, 'Msj' => 'Se ha agregado la variable con exito.');
        }else{
            return array('ErrorStatus' => false, 'Msj' => 'La variable ya existe.');
        }
    }

    static public function mdlEliminarVariable($tabla, $item, $post){
        $stmt = Conexion::conectar()->prepare("delete from $tabla where producto_id=:producto_id and $item=:$item");
        $stmt -> bindParam(":producto_id", $post['producto'], PDO::PARAM_STR);
        $stmt -> bindParam(":".$item, $post['valor'], PDO::PARAM_STR);
        $stmt -> execute();
        return array('ErrorStatus' => false, 'Msj' => 'Se ha eliminado la variable con exito.');
        $stmt -> close();
        $stmt = null; 
    }

}


<?php 

require_once "conexion.php";

class ModeloHome {

    static public function mdlConsultarBanners($tabla){
        $stmt = Conexion::conectar()->prepare("select * from $tabla order by orden");
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarPromos($tabla){
        $stmt = Conexion::conectar()->prepare("select * from $tabla order by orden");
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlConsultarMegaPromo($tabla){
        $stmt = Conexion::conectar()->prepare("select * from $tabla");
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    public static function mdlGuardarBanner($tabla, $banner, $imagen){
        if($banner['hdBanner'] == ''){
            $stmt = Conexion::conectar()->prepare("select count(*) as count from $tabla");
            $stmt -> execute();
            $count = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            $file_name = '';
            if($count['count'] < 3){
                if($imagen['flImagen']['error'] == 0){
                    $original = explode('.', $imagen['flImagen']['name']);
                    $ext = $original[count($original)-1];
                    $date = new DateTime();
                    $file_name = $date->getTimestamp().'.'.$ext;
                    move_uploaded_file($imagen['flImagen']['tmp_name'],'../vistas/assets/images/banners/'.$file_name);
                }
                $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        values(
                                                            null,
                                                            :imagen,
                                                            :txtTitulo,
                                                            :txtSubtitulo,
                                                            :txtOferta,
                                                            :txtPrecio,
                                                            :txtRuta,
                                                            :txtTextoRuta,
                                                            :txtOrden
                                                        )");
                $stmt -> bindParam(":imagen", $file_name, PDO::PARAM_STR);
                $stmt -> bindParam(":txtTitulo", $banner['txtTitulo'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtSubtitulo", $banner['txtSubtitulo'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtOferta", $banner['txtOferta'], PDO::PARAM_STR);
                $precio = ($banner['txtPrecio'] == '') ? null : $banner['txtPrecio'];
                $stmt -> bindParam(":txtPrecio", $precio, PDO::PARAM_STR);
                $stmt -> bindParam(":txtRuta", $banner['txtRuta'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtTextoRuta", $banner['txtTextoRuta'], PDO::PARAM_STR);
                $stmt -> bindParam(":txtOrden", $banner['txtOrden'], PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                return array('ErrorStatus' => false, 'Msj' => 'El banner se ha guardado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'Solo se pueden registrar 3 banners.');
            }
        }else{
            $stmt = Conexion::conectar()->prepare("select * from $tabla where id=:id");
            $stmt -> bindParam(":id", $banner['hdBanner'], PDO::PARAM_STR);
            $stmt -> execute();
            $banner_reg = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            $file_name = $banner_reg['imagen'];
            if($imagen['flImagen']['error'] == 0){
                if(isset($banner_reg['imagen'])){
                    unlink('../vistas/assets/images/banners/'.$banner_reg['imagen']);
                }
                $original = explode('.', $imagen['flImagen']['name']);
                $ext = $original[count($original)-1];
                $date = new DateTime();
                $file_name = $date->getTimestamp().'.'.$ext;
                move_uploaded_file($imagen['flImagen']['tmp_name'],'../vistas/assets/images/banners/'.$file_name);
            }
            $stmt = Conexion::conectar()->prepare("update $tabla set imagen=:imagen,
                                                                        titulo=:txtTitulo,
                                                                        subtitulo=:txtSubtitulo,
                                                                        oferta=:txtOferta,
                                                                        precio=:txtPrecio,
                                                                        link=:txtRuta,
                                                                        link_texto=:txtTextoRuta,
                                                                        orden=:txtOrden
                                                                where id = :id");
            $stmt -> bindParam(":imagen", $file_name, PDO::PARAM_STR);
            $stmt -> bindParam(":txtTitulo", $banner['txtTitulo'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtSubtitulo", $banner['txtSubtitulo'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtOferta", $banner['txtOferta'], PDO::PARAM_STR);
            $precio = ($banner['txtPrecio'] == '') ? null : $banner['txtPrecio'];
            $stmt -> bindParam(":txtPrecio", $precio, PDO::PARAM_STR);
            $stmt -> bindParam(":txtRuta", $banner['txtRuta'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtTextoRuta", $banner['txtTextoRuta'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtOrden", $banner['txtOrden'], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $banner['hdBanner'], PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null;
            return array('ErrorStatus' => false, 'Msj' => 'El banner se ha actualizado exitosamente.');
        }
    }

    static public function mdlConsultarBanner($tabla, $banner){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where id=:id");
        $stmt -> bindParam(":id", $banner, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlEliminarBanner($tabla, $banner){
        $stmt = Conexion::conectar()->prepare("select count(*) as count from $tabla");
        $stmt -> execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        if($count['count'] > 1){
            $stmt = Conexion::conectar()->prepare("select * from $tabla where id=:id");
            $stmt -> bindParam(":id", $banner, PDO::PARAM_STR);
            $stmt -> execute();
            $banner_reg = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if(isset($banner_reg['imagen'])){
                unlink('../vistas/assets/images/banners/'.$banner_reg['imagen']);
            }
            $stmt = Conexion::conectar()->prepare("delete from $tabla where id=:id");
            $stmt -> bindParam(":id", $banner, PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null;
            return array('ErrorStatus' => false, 'Msj' => 'El banner se ha eliminado exitosamente.');
        }else{
            return array('ErrorStatus' => true, 'Msj' => 'No puede eliminar todos los banners.');
        }
    }

    public static function mdlEditarMegaPromo($tabla, $mp, $imagen){ 
        $stmt = Conexion::conectar()->prepare("select * from $tabla");
        $stmt -> execute();
        $mp_reg = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        $file_name = $mp_reg['imagen'];
        if($imagen['flImagen']['error'] == 0){
            if(isset($mp_reg['imagen'])){
                unlink('../vistas/assets/images/promos/'.$mp_reg['imagen']);
            }
            $original = explode('.', $imagen['flImagen']['name']);
            $ext = $original[count($original)-1];
            $date = new DateTime();
            $file_name = $date->getTimestamp().'.'.$ext;
            move_uploaded_file($imagen['flImagen']['tmp_name'],'../vistas/assets/images/promos/'.$file_name);
        }
        $stmt = Conexion::conectar()->prepare("update $tabla set imagen=:imagen,
                                                                    titulo=:txtTituloMP,
                                                                    subtitulo=:txtSubtituloMP,
                                                                    link=:txtRutaMP,
                                                                    link_texto=:txtTextoRutaMP
                                                            ");
        $stmt -> bindParam(":imagen", $file_name, PDO::PARAM_STR);
        $stmt -> bindParam(":txtTituloMP", $mp['txtTituloMP'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtSubtituloMP", $mp['txtSubtituloMP'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtRutaMP", $mp['txtRutaMP'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtTextoRutaMP", $mp['txtTextoRutaMP'], PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
        return array('ErrorStatus' => false, 'Msj' => 'La mega Promo se ha actualizado exitosamente.');
    }

    static public function mdlConsultarPromocion($tabla, $banner){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where id=:id");
        $stmt -> bindParam(":id", $banner, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    public static function mdlEditarPromocion($tabla, $promo, $imagen){ 
        $stmt = Conexion::conectar()->prepare("select * from $tabla where id=:id");
        $stmt -> bindParam(":id", $promo['hdPromo'], PDO::PARAM_STR);
        $stmt -> execute();
        $promo_reg = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        $file_name = $promo_reg['imagen'];
        if($imagen['flImagen']['error'] == 0){
            if(isset($promo_reg['imagen'])){
                unlink('../vistas/assets/images/promos/'.$promo_reg['imagen']);
            }
            $original = explode('.', $imagen['flImagen']['name']);
            $ext = $original[count($original)-1];
            $date = new DateTime();
            $file_name = $date->getTimestamp().'.'.$ext;
            move_uploaded_file($imagen['flImagen']['tmp_name'],'../vistas/assets/images/promos/'.$file_name);
        }
        $stmt = Conexion::conectar()->prepare("update $tabla set imagen=:imagen,
                                                                    titulo=:txtTituloPromo,
                                                                    subtitulo=:txtSubtituloPromo,
                                                                    link=:txtRutaPromo,
                                                                    link_texto=:txtTextoRutaPromo
                                                                where id=:id");
        $stmt -> bindParam(":imagen", $file_name, PDO::PARAM_STR);
        $stmt -> bindParam(":txtTituloPromo", $promo['txtTituloPromo'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtSubtituloPromo", $promo['txtSubtituloPromo'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtRutaPromo", $promo['txtRutaPromo'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtTextoRutaPromo", $promo['txtTextoRutaPromo'], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $promo['hdPromo'], PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
        return array('ErrorStatus' => false, 'Msj' => 'La Promoción se ha actualizado exitosamente.');
    }


}
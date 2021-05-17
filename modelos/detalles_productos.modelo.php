<?php 

require_once "conexion.php";

class ModeloDetallesProductos {

    static public function mdlConsultarDetalle($tabla){
        $stmt = Conexion::conectar()->prepare("select * from $tabla");
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    public static function mdlGuardarColor($tabla, $color){
        if($color['hdColor'] == ''){
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where descripcion = :txtNombre");
            $stmt -> bindParam(":txtNombre", $color['txtNombre'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        values(
                                                            null,
                                                            :txtNombre,
                                                            :txtColor,
                                                            1
                                                        )");
                $stmt -> bindParam(":txtNombre", strtoupper($color['txtNombre']), PDO::PARAM_STR);
                $stmt -> bindParam(":txtColor", $color['txtColor'], PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                return array('ErrorStatus' => false, 'Msj' => 'El color se ha guardado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'El color ya se encuentra registrada.');
            }
        }else{
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where descripcion = :txtNombre and id <> :id");
            $stmt -> bindParam(":txtNombre", $color['txtNombre'], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $color['hdColor'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("update $tabla set descripcion=:txtNombre,
                                                                         hex=:txtColor,
                                                                         estado=:estado
                                                                    where id = :id");
                $stmt -> bindParam(":txtNombre", strtoupper($color['txtNombre']), PDO::PARAM_STR);
                $stmt -> bindParam(":txtColor", $color['txtColor'], PDO::PARAM_STR);
                $estado = isset($color['chkEstado']) ? 1 : 0 ;
                $stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
                $stmt -> bindParam(":id", $color['hdColor'], PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                return array('ErrorStatus' => false, 'Msj' => 'El color se ha actualizado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'El color ya se encuentra registrada.');
            }
        }
    }

    public static function mdlGuardarTalla($tabla, $talla){
        if($talla['hdTalla'] == ''){
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where descripcion = :txtTalla");
            $stmt -> bindParam(":txtTalla", $talla['txtTalla'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        values(
                                                            null,
                                                            :txtTalla,
                                                            1
                                                        )");
                $stmt -> bindParam(":txtTalla", strtoupper($talla['txtTalla']), PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                return array('ErrorStatus' => false, 'Msj' => 'La talla se ha guardado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'La talla ya se encuentra registrada.');
            }
        }else{
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where descripcion = :txtTalla and id <> :id");
            $stmt -> bindParam(":txtTalla", $talla['txtTalla'], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $talla['hdTalla'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("update $tabla set descripcion=:txtTalla,
                                                                         estado=:estado
                                                                    where id = :id");
                $stmt -> bindParam(":txtTalla", strtoupper($talla['txtTalla']), PDO::PARAM_STR);
                $estado = isset($talla['chkEstado']) ? 1 : 0 ;
                $stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
                $stmt -> bindParam(":id", $talla['hdTalla'], PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                return array('ErrorStatus' => false, 'Msj' => 'La talla se ha actualizado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'La talla ya se encuentra registrada.');
            }
        }
    }

    public static function mdlGuardarTag($tabla, $tag){
        if($tag['hdTags'] == ''){
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where descripcion = :txtTag");
            $stmt -> bindParam(":txtTag", $tag['txtTag'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        values(
                                                            null,
                                                            :txtTag,
                                                            :ruta,
                                                            1
                                                        )");
                $stmt -> bindParam(":txtTag", strtoupper($tag['txtTag']), PDO::PARAM_STR);
                $ruta = str_replace(' ','-',strtolower($tag['txtTag']));
                $stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                return array('ErrorStatus' => false, 'Msj' => 'El tag se ha guardado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'El tag ya se encuentra registrado.');
            }
        }else{
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where descripcion = :txtTag and id <> :id");
            $stmt -> bindParam(":txtTag", $tag['txtTag'], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $tag['hdTags'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("update $tabla set descripcion=:txtTag,
                                                                         ruta=:ruta,
                                                                         estado=:estado
                                                                    where id = :id");
                $stmt -> bindParam(":txtTag", strtoupper($tag['txtTag']), PDO::PARAM_STR);
                $ruta = str_replace(' ','-',strtolower($tag['txtTag']));
                $stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
                $estado = isset($tag['chkEstado']) ? 1 : 0 ;
                $stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
                $stmt -> bindParam(":id", $tag['hdTags'], PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                return array('ErrorStatus' => false, 'Msj' => 'El tag se ha actualizado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'El tag ya se encuentra registrada.');
            }
        }
    }

}
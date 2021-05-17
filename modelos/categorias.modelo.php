<?php 

require_once "conexion.php";

class ModeloCategorias {

    static public function mdlGuardarCategoria($tabla, $categoria){
        if($categoria['hdCategoria'] == ''){
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where categoria = :txtCategoria");
            $stmt -> bindParam(":txtCategoria", $categoria['txtCategoria'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        values(
                                                            null,
                                                            :txtCategoria,
                                                            :ruta,
                                                            :txtIcono,
                                                            :fecha
                                                        )");
                $stmt -> bindParam(":txtCategoria", strtoupper($categoria['txtCategoria']), PDO::PARAM_STR);
                $stmt -> bindParam(":ruta", str_replace(' ','-',strtolower($categoria['txtCategoria'])), PDO::PARAM_STR);
                $stmt -> bindParam(":txtIcono", $categoria['txtIcono'], PDO::PARAM_STR);
                $stmt -> bindParam(":fecha", date('Y-m-d'), PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                return array('ErrorStatus' => false, 'Msj' => 'La categoria se ha guardado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'La categoria ya se encuentra registrada.');
            }
        }else{
            $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where categoria = :txtCategoria and id <> :id");
            $stmt -> bindParam(":txtCategoria", $categoria['txtCategoria'], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $categoria['hdCategoria'], PDO::PARAM_STR);
            $stmt -> execute();
            $existe = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            $catUppercase = mb_strtoupper($categoria['txtCategoria']);
            // $catRuta = str_replace(' ','-',mb_strtolower($categoria['txtCategoria']));
            $catRuta =  preg_replace("/[^a-zA-Z0-9\_\-]+/", "", self::eliminar_tildes($categoria['txtCategoria']));
            $catRuta = str_replace(' ','-',mb_strtolower($catRuta));
            if($existe['existe'] == 0){
                $stmt = Conexion::conectar()->prepare("update $tabla set categoria=:txtCategoria,
                                                                         ruta=:ruta,
                                                                         icono=:txtIcono
                                                                    where id = :id");
                $stmt -> bindParam(":txtCategoria", $catUppercase , PDO::PARAM_STR);
                $stmt -> bindParam(":ruta", $catRuta , PDO::PARAM_STR);
                $stmt -> bindParam(":txtIcono", $categoria['txtIcono'], PDO::PARAM_STR);
                $stmt -> bindParam(":id", $categoria['hdCategoria'], PDO::PARAM_STR);
                $stmt -> execute();
                $stmt = null;
                return array('ErrorStatus' => false, 'Msj' => 'La categoria se ha actualizado exitosamente.');
            }else{
                return array('ErrorStatus' => true, 'Msj' => 'La categoria ya se encuentra registrada.');
            }
        }
    }

    public static function mdlConsultarCategoria($tabla, $item,$valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item=:$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    public static function mdlGuardarSubCategoria($tabla, $subcat){
        $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where subcategoria = :subcategoria");
        $stmt -> bindParam(":subcategoria", $subcat['subcategoria'], PDO::PARAM_STR);
        $stmt -> execute();
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        $subUppercase = mb_strtoupper($subcat['subcategoria']);
        $subRuta =  preg_replace("/[^a-zA-Z0-9\_\-]+/", "", self::eliminar_tildes($subcat['subcategoria']));
        $subRuta = str_replace(' ','-',mb_strtolower($subRuta));
        $date = date('Y-m-d');
        if($existe['existe'] == 0){
            $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                    values(
                                                        null,
                                                        :subcategoria,
                                                        :categoria,
                                                        :ruta,
                                                        :fecha
                                                    )");
            $stmt -> bindParam(":subcategoria", $subUppercase, PDO::PARAM_STR);
            $stmt -> bindParam(":categoria", $subcat['categoria'], PDO::PARAM_STR);
            $stmt -> bindParam(":ruta", $subRuta, PDO::PARAM_STR);
            $stmt -> bindParam(":fecha", $date, PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null;
            return array('ErrorStatus' => false, 'Msj' => 'La subcategoria se ha guardado exitosamente.');
        }else{
            return array('ErrorStatus' => true, 'Msj' => 'La subcategoria ya se encuentra registrada.');
        }
    }

    public static function mdlEliminarSubCategoria($tabla, $item,$valor){
        $stmt = Conexion::conectar()->prepare("delete from $tabla where $item=:$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
        return array('ErrorStatus' => false, 'Msj' => 'La subcategoria se ha eliminado exitosamente.');
    }

    public static function mdlEliminarCategoria($tabla, $item,$valor){ 
        $stmt = Conexion::conectar()->prepare("delete from subcategorias where id_categoria=:$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
        $stmt = Conexion::conectar()->prepare("delete from $tabla where $item=:$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
        return array('ErrorStatus' => false, 'Msj' => 'La categoria se ha eliminado exitosamente.');
    }

    private static function eliminar_tildes($cadena){

        //Codificamos la cadena en formato utf8 en caso de que nos de errores
        // $cadena = utf8_encode($cadena);
    
        //Ahora reemplazamos las letras
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );
    
        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena );
    
        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena );
    
        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena );
    
        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena );
    
        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );
    
        return $cadena;
    }

}

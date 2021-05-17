<?php 

require_once "conexion.php";

class ModeloTags {

    static public function mdlConsultarTags($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

}
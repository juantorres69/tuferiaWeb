<?php 

require_once "conexion.php";

class ModeloCiudad {

    static public function mdlConsultarCiudades($tabla){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where estado = 1");
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

}
<?php

require_once "conexion.php";

class ModeloPlantilla{

    static public function mdlEstiloPlantilla($tabla){
        $stmt = Conexion::conectar()->prepare("select * from $tabla");
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
    }
}

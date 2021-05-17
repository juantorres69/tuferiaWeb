<?php 

require_once "conexion.php";

class ModeloConfig {

    static public function mdlConsultarConfig($tabla){
        $stmt = Conexion::conectar()->prepare("select * from $tabla");
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    public static function mdlGuardarConfig($tabla, $config){
        $stmt = Conexion::conectar()->prepare("update $tabla set impuesto=:txtImpuesto,
                                                                modo=:txtModo,
                                                                pubApiKey=:txtApiKey
                                                                ");
        $stmt -> bindParam(":txtImpuesto", $config['txtImpuesto'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtModo", $config['txtModo'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtApiKey", $config['txtApiKey'], PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
        return array('ErrorStatus' => false, 'Msj' => 'Se ha actualizado la configuracion exitosamente.');
    }

}
<?php

if (session_status() === PHP_SESSION_NONE) session_start();
require_once "conexion.php";

class ModeloCheckout{
    

    public static function mdlMostrarComercioSettings($tabla){
        $stmt = Conexion::conectar()->prepare("select * from $tabla");
        // $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;

    }

    public static function mdlGuardarTransacciones($tabla, $data){
        $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where id_transaccion = :id");
        $stmt -> bindParam(":id", $data->id, PDO::PARAM_STR);
        $stmt -> execute();
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        $valor = settype($data->amount_in_cents, 'string');
        $ref = settype($data->reference, 'string');

        $precio = substr($data->amount_in_cents, 0 , -2);
        if($existe['existe'] == 0){
            $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        (
                                                            id_transaccion,
                                                            referencia,
                                                            currency,
                                                            valor,
                                                            metodo,
                                                            status
                                                        )
                                                    values(
                                                        :id,
                                                        :referencia,
                                                        :currency,
                                                        :valor,
                                                        :metodo,
                                                        :status
                                                    )");
            $stmt -> bindParam(":id", $data->id);
            $stmt -> bindParam(":referencia", $data->reference);
            $stmt -> bindParam(":currency", $data->currency);
            $stmt -> bindParam(":valor", $precio);
            $stmt -> bindParam(":metodo", $data->payment_method_type);
            $stmt -> bindParam(":status", $data->status);
            $stmt -> execute();
            $stmt = null;
            $stmt = Conexion::conectar()->prepare("select * from $tabla order by id desc limit 1");
            $stmt -> execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
        }else{
            echo 'existe';
            $stmt = Conexion::conectar()->prepare("update $tabla set status=:status
                                                            where id_transaccion=:id
                                                            ");
            $stmt -> bindParam(":status", $data->status, PDO::PARAM_STR);
            $stmt -> bindParam(":id", $data->id, PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null;
            return array('ErrorStatus' => false, 'Msj' => 'Se ha actualizado la información del comercio exitosamente.');
        }

    }

    static public function guardarDetalleCompra($tabla, $valor){
        $data = json_decode($valor);

        
        // valor

        // ,
        // :id_producto,
        // :cantidad,
        // :valor
        for($i = 0; $i < count($data); $i++ ){            
            $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                            (
                                                                id_compra,
                                                                id_producto,
                                                                cantidad,
                                                                valor
                                                            )
                                                        values(
                                                            :id_compra,
                                                            :id_producto,
                                                            :cantidad,
                                                            :valor
                                                        )");
                                          
            $stmt -> bindParam(":id_compra", $data[$i]->id_compra, PDO::PARAM_INT);
            $stmt -> bindParam(":id_producto", $data[$i]->id_producto, PDO::PARAM_INT);
            $stmt -> bindParam(":cantidad", $data[$i]->cantidad, PDO::PARAM_INT);
            $stmt -> bindParam(":valor", $data[$i]->valor, PDO::PARAM_INT);
            $stmt -> execute();
        }
        // return true;
        $stmt = Conexion::conectar()->prepare("select * from $tabla order by id desc limit 1");
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
    }


    static public function mdlGuardarCompra($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        (
                                                            id_usuario,
                                                            total_compra,
                                                            metodo,
                                                            envio,
                                                            direccion,
                                                            pais,
                                                            referencia
                                                        )
                                                    values(
                                                        :id,
                                                        :total,
                                                        :metodo,
                                                        0,
                                                        :direccion,
                                                        'co',
                                                        :referencia
                                                    )");

        $stmt -> bindParam(":id", $_SESSION['idUsuario'], PDO::PARAM_STR);
        $stmt -> bindParam(":total", $valor['total'], PDO::PARAM_STR);
        $stmt -> bindParam(":metodo", $valor['metodo'], PDO::PARAM_STR);
        $stmt -> bindParam(":direccion", $_SESSION['direccion'], PDO::PARAM_STR);
        $stmt -> bindParam(":referencia", $valor['referencia'], PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = Conexion::conectar()->prepare("select * from $tabla order by id desc limit 1");
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
    }

}
<?php

class ControladorCheckout{

    public static function ctrMostrarComercioSettings(){
        $tabla = 'comercio';
        $res = ModeloCheckout::mdlMostrarComercioSettings($tabla); 
        return $res;
    }

    public static function guardarTransaccion($data){
        $tabla= 'transacciones';
        $res = ModeloCheckout::mdlGuardarTransacciones($tabla,$data); 
        return $res;
    }

    static public function ctrGuardarCompra($valor){
        $tabla = 'compras';
        $resp = ModeloCheckout::mdlGuardarCompra($tabla, $valor);
        return $resp;
    }

}
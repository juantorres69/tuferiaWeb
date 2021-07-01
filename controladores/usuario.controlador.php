<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once "log.controlador.php";

class ControladorUsuario{

    static public function ctrMostrarCompras($item, $valor){
        $tabla = "compras";
        $response = ModeloUsuario::mdlMostrarCompras($tabla, $item, $valor) ;
        return $response;
    }

    static public function ctrMostrarComprasComercio($item, $valor){
        $tabla = "compras";
        $response = ModeloUsuario::mdlMostrarComprasComercio($tabla, $item, $valor) ;
        return $response;
    }

    static public function ctrMostrarComprasPendientesComercio($item, $valor){
        $tabla = "compras";
        $response = ModeloUsuario::mdlMostrarComprasPendientesComercio($tabla, $item, $valor) ;
        return $response;
    }

    public static function ctrLogout(){
        session_unset();
        session_destroy();
        session_regenerate_id(true);
    }

    public static function setSecuritySessions() {
        $_SESSION['isLogged'] = true;
        // $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
        // $_SESSION['SKey'] = uniqid(mt_rand(), true);
        // $_SESSION['IPaddress'] = ControladorLog::get_client_ip();
        // $_SESSION['LastActivity'] = $_SERVER['REQUEST_TIME'];
    }

    public static function ctrValidateSession($ip, $date, $browser){
        // $sessionNav = $_SESSION['userAgent'];
        // $sessionKey = $_SESSION['SKey'] ;
        // $sessionIp = $_SESSION['IPaddress'] ;
        // $sessionDate = $_SESSION['LastActivity'] ;

        // var_dump(array("nav"=>$sessionNav,"key"=>$sessionKey ,"ip"=> $sessionIp,"date"=>$sessionDate ));
    }

}
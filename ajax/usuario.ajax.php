<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../modelos/usuario.modelo.php';

class AjaxUsuarios{

    public function consultarUsuario(){
        $item = 'id';
        $tabla = 'usuarios';
        $valor = $_SESSION['idUsuario'];
        $resp = ModeloUsuario::mdlConsultarComercio($tabla, $item, $valor);
        echo json_encode($resp);
    }

    public function actualizarUsuario($usuario){
        $tabla = 'usuarios';
        $resp = ModeloUsuario::mdlActualizarUsuario($tabla, $usuario);
        echo json_encode($resp);
    }

}

if(isset($_POST['accion'])){

    $objeto = new AjaxUsuarios();
    if($_POST['accion'] == 'consultarUsuario'){
        $objeto->consultarUsuario();
    }else if($_POST['accion'] == 'actualizarUsuario'){
        $objeto->actualizarUsuario($_POST);
    }
}


?>
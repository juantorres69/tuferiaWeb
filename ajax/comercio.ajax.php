<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../modelos/usuario.modelo.php';
require_once '../modelos/mail.php';
require_once '../modelos/rutas.php';
require_once '../lib/PHPMailer/PHPMailerAutoload.php';

class AjaxComercios{

    public function consultarComercio(){
        $item = 'id';
        $tabla = 'comercios';
        $valor = $_SESSION['comercio'];
        $resp = ModeloUsuario::mdlConsultarComercio($tabla, $item, $valor);
        echo json_encode($resp);
    }

    public function actualizarComercio($comercio, $logo){
        $tabla = 'comercios';
        $resp = ModeloUsuario::mdlActualizarComercio($tabla, $comercio, $logo);
        echo json_encode($resp);
    }

    public function consultarComercios(){
        $tabla = 'comercios';
        $resp = ModeloUsuario::mdlConsultarComercios($tabla);
        echo json_encode($resp);
    }

    public function cambiarEstado($post){
        $tabla = 'comercios';
        $url = ruta::ctrRuta();
        $comercio = ModeloUsuario::mdlCambiarEstado($tabla, $post);
        if($post['estado'] == 2){
            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP ();
            $mail->SMTPDebug  = 0;
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host       = "smtp.gmail.com";
            $mail->Port       = 465;
            $mail->Username   = Mail::getUser();
            $mail->Password   = Mail::getPassword();
            $mail->From = Mail::getUser();
            $mail->FromName = "Activacion cuenta - tuferia virtual";  
            $mail->Subject = 'Activacion cuenta - tuferia virtual';                                            
            $mail->AddAddress($comercio['email']);                                                            
            $mail->MsgHTML(file_get_contents(str_replace(' ','%20',$url.'vistas/mails/activacion_comercio.mail.php?nombre='.$comercio['razon_social'])));                                   

            $mail->AltBody = 'Activación Cuenta - TUFERIA VIRTUAL';        

            $mail->Send();
        }
        $resp = array('Msj' => 'Se ha actualizado el estado del comercio exitosamente.');
        echo json_encode($resp);
    }

}

if(isset($_POST['accion'])){

    $objeto = new AjaxComercios();
    if($_POST['accion'] == 'consultarComercio'){
        $objeto->consultarComercio();
    }else if($_POST['accion'] == 'actualizarComercio'){
        $objeto->actualizarComercio($_POST, $_FILES['logo']);
    }else if($_POST['accion'] == 'consultarComercios'){
        $objeto->consultarComercios();
    }else if($_POST['accion'] == 'cambiarEstado'){
        $objeto->cambiarEstado($_POST);
    }
}


?>
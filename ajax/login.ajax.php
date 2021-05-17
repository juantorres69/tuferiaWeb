<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../modelos/usuario.modelo.php';
require_once "../controladores/usuario.controlador.php";
require_once '../modelos/mail.php';
require_once '../modelos/rutas.php';
require_once '../lib/PHPMailer/PHPMailerAutoload.php';

class AjaxLogin{

    public function registro($usuario){
        $tabla = 'usuarios';
        $url = ruta::ctrRuta();
        $usuario = ModeloUsuario::registro($tabla,$usuario);
        if(!isset($usuario['ErrorStatus'])){
            // ControladorUsuario::setSecuritySessions();
            $_SESSION['idUsuario'] = $usuario['id'];
            $_SESSION['nombreUsuario'] = $usuario['nombre'];
            $_SESSION['emailUsuario'] = $usuario['email'];
            $_SESSION['telefono'] = $usuario['telefono'];
            $_SESSION['direccion'] = $usuario['direccion'];
            $_SESSION['ciudad_id'] = $usuario['ciudad_id'];
            $_SESSION['estado'] = $usuario['estado'];
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
			$mail->FromName = "Registro tuferia virtual";  
			$mail->Subject = 'Registro tuferia virtual';                                            
			$mail->AddAddress($usuario['email']);                                                            
			$mail->MsgHTML(file_get_contents(str_replace(' ','%20',$url.'vistas/mails/registro.mail.php?id='.$usuario['id'].'&nombre='.$usuario['nombre'])));                                   

            $mail->AltBody = 'REGISTRO TUFERIA VIRTUAL';        

            $mail->Send();
            $result = array('ErrorStatus' => false, 'Msj' => 'Se ha registrado con exito en nuestra plataforma, le enviamos un correo electronico para activar su cuenta.');
        }else{
            $result = $usuario;
        }
        echo json_encode($result);
    }

    public function login($usuario){
        $tabla = 'usuarios';
        $usuario = ModeloUsuario::login($tabla,$usuario);
        if($usuario && count($usuario) > 0){
            ControladorUsuario::setSecuritySessions();
            $_SESSION['idUsuario'] = $usuario['id'];
            $_SESSION['nombreUsuario'] = $usuario['nombre'];
            $_SESSION['emailUsuario'] = $usuario['email'];
            $_SESSION['estado'] = $usuario['estado'];
            $_SESSION['comercio'] = $usuario['comercio_id'];
            $_SESSION['rol'] = $usuario['rol'];
            if($usuario['rol'] == 'usuario'){
                $url = 'home';
            }else{
                $url = 'admin';
            }
            $result = array('ErrorStatus' => false, 'Msj' => 'Inicio de sesión correcto.', 'url' => $url);
        }else{
            $result = array('ErrorStatus' => true, 'Msj' => 'Correo electrónico y/o contraseña incorrecta.');
        }
        echo json_encode($result);
    }

    public function registroComercio($comercio){
        $tabla = 'comercios';
        $url = ruta::ctrRuta();
        $comercio = ModeloUsuario::registroComercio($tabla,$comercio);
        if(!isset($comercio['ErrorStatus'])){
            // ControladorUsuario::setSecuritySessions();
            // $_SESSION['idUsuario'] = $usuario['id'];
            // $_SESSION['nombreUsuario'] = $usuario['nombre'];
            // $_SESSION['emailUsuario'] = $usuario['email'];
            // $_SESSION['telefono'] = $usuario['telefono'];
            // $_SESSION['direccion'] = $usuario['direccion'];
            // $_SESSION['ciudad_id'] = $usuario['ciudad_id'];
            // $_SESSION['estado'] = $usuario['estado'];
            // $_SESSION['txtNit'] = $usuario['txtNit'];
            // $_SESSION['rdLocal'] = $usuario['rdLocal'];
            // $_SESSION['cbCentroComercial'] = $usuario['cbCentroComercial'];
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
			$mail->FromName = "Registro tuferia virtual";  
			$mail->Subject = 'Registro tuferia virtual';                                            
			$mail->AddAddress($comercio['email']);                                                            
			$mail->MsgHTML(file_get_contents(str_replace(' ','%20',$url.'vistas/mails/registro_comercio.mail.php?nombre='.$comercio['razon_social'])));                                   

            $mail->AltBody = 'REGISTRO TUFERIA VIRTUAL';        

            // $mail->Send();
            if($mail->Send()){
                $mail->ClearAddresses();
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
                $mail->FromName = "Registro tuferia virtual";  
                $mail->Subject = 'Registro tuferia virtual';                                            
                $mail->AddAddress(Mail::getUser());                                                            
			    $mail->MsgHTML(file_get_contents(str_replace(' ','%20',$url.'vistas/mails/nuevo_comercio.mail.php?nombre='.$comercio['razon_social'])));                                   
   

                $mail->Send();
            }

            $result = array('ErrorStatus' => false, 'Msj' => 'Se ha registrado con exito en nuestra plataforma, le enviamos un correo electronico con la información de su registro.');
        
            
        }else{
            $result = $comercio;
        }
        echo json_encode($result);
    }

}

if(isset($_POST['accion'])){

    $objeto = new AjaxLogin();
    if($_POST['accion'] == 'registro'){
        $objeto->registro($_POST);
    }else if($_POST['accion'] == 'login'){
        $objeto->login($_POST);
    }else if($_POST['accion'] == 'registroComercio'){
        $objeto->registroComercio($_POST);
    }
}


?>
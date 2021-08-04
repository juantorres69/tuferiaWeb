<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../modelos/usuario.modelo.php';
require_once "../controladores/usuario.controlador.php";
require_once '../modelos/mail.php';
require_once '../modelos/rutas.php';
require_once '../lib/PHPMailer/PHPMailerAutoload.php';

class Ajaxrecuperar{

    public function validarEmail($email){
        $tabla = 'usuarios';
        $url = ruta::ctrRuta();
        $usuario = ModeloUsuario::mdlConsultarUsuarioPorEmail($tabla,$email);

        if($usuario){
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
			$mail->FromName = "Recuperar contraseña";  
			$mail->Subject = 'Recuperar contraseña'; 
			$mail->AddAddress($email);                               

			$mail->MsgHTML(file_get_contents(str_replace(' ','%20',$url.'vistas/mails/recuperar_pass.mail.php?id='.$usuario[0]['id'].'&nombre='.$usuario[0]['nombre'].''))); //                 

            $mail->AltBody = 'Correo enviado';        

            $mail->Send();
            $result = array('ErrorStatus' => false, 'Msj' => 'Se le ha enviado un correo para restaurar su contraseña');
        }else{
            $result = $usuario;
        }
        echo json_encode($result);
    }

}

if(isset($_POST['accion'])){

    $objeto = new Ajaxrecuperar();
    if($_POST['accion'] == 'recuperar'){
        $email = $_POST["txtEmail"];
        $objeto->validarEmail($email);
    }
}
?>
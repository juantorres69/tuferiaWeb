<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../modelos/usuario.modelo.php';
require_once "../controladores/usuario.controlador.php";
require_once '../modelos/mail.php';
require_once '../modelos/rutas.php';
require_once '../lib/PHPMailer/PHPMailerAutoload.php';

class AjaxQYS{

    public function QYS($email){
        $tabla = 'usuarios';
        $url = ruta::ctrRuta();
        $usuario = ModeloUsuario::mdlConsultarUsuarioPorEmail($tabla,$email); // cambiar el modulo (posibilidad)
        
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
			$mail->From       = Mail::getUser();
			$mail->FromName   = "Enviado con exito";  
			$mail->Subject    = 'Enviado con exito'; 
			$mail->AddAddress($email);                               

			$mail->MsgHTML(file_get_contents(str_replace(' ','%20',$url.'vistas/mails/QYS.mail.php?nombre='.$usuario[0]['nombre'].'')));

            $mail->AltBody = 'Correo enviado';        

            $mail->Send();
            $result = array('ErrorStatus' => false, 'Msj' => 'Enviado con exito');
        }else{
            $result = $usuario;
        }
        echo json_encode($result);
    }
}
if(isset($_POST['accion'])){
    $objeto = new AjaxQYS();
    if($_POST['accion'] == 'QYS'){        // no recuerdo esta linea
        $email = $_POST["txtEmail"];
        $objeto->QYS($email);
    }
}
?>
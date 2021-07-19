<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
require_once '../modelos/usuario.modelo.php';
require_once "../controladores/usuario.controlador.php";
require_once '../modelos/mail.php';
require_once '../modelos/rutas.php';
require_once '../lib/PHPMailer/PHPMailerAutoload.php';

class Ajaxrestaurar{

    public function validarId($id){ //
        $tabla = 'usuarios';
        $url = ruta::ctrRuta();
        $usuario = ModeloUsuario::mdlConsultarUsuarioPorId($tabla, $id); //

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
			$mail->FromName = "Restaurar contraseña"; //
			$mail->Subject = 'Restaurar contraseña'; //
			$mail->AddAddress($usuario['email']);   //  así sería? 

			$mail->MsgHTML(file_get_contents(str_replace(' ','%20',$url.'vistas/mails/restaurar_pass.mail.php?id='.$usuario['id'].'&nombre='.$usuario['nombre'].''))); //                 

            $mail->AltBody = 'Correo enviado';        

            $mail->Send();
            $result = array('ErrorStatus' => false, 'Msj' => 'se ha restaurado su contraseña.');
        }else{
            $result = $usuario;
        }
        echo json_encode($result);
    }

}

if(isset($_POST['accion'])){

    $objeto = new Ajaxrestaurar(); //
    if($_POST['accion'] == 'restaurar'){ //
        $email = $_POST["txtPass"];
        $objeto->validarId($id);
    }
}
?>
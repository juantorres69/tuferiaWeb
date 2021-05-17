<?php 
if (session_status() === PHP_SESSION_NONE) session_start();
require_once "conexion.php";

class ModeloUsuario {

    static public function registro($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where email = :txtEmail");
        $stmt -> bindParam(":txtEmail", $valor['txtEmail'], PDO::PARAM_STR);
        $stmt -> execute();
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        if($existe['existe'] == 0){
            $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        (
                                                            nombre,
                                                            email,
                                                            password,
                                                            estado,
                                                            comercio_id,
                                                            rol
                                                        )
                                                    values(
                                                        :txtNombre,
                                                        :txtEmail,
                                                        :txtPassword,
                                                        1,
                                                        0,
                                                        'usuario'
                                                    )");
            $stmt -> bindParam(":txtNombre", $valor['txtNombre'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtEmail", $valor['txtEmail'], PDO::PARAM_STR);
            $password = sha1($valor['txtPassword']);
            $stmt -> bindParam(":txtPassword", $password, PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null;
            $stmt = Conexion::conectar()->prepare("select * from $tabla order by id desc limit 1");
            $stmt -> execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
        }else{
            return array('ErrorStatus' => true, 'Msj' => 'El usuario ya está registrado.');
        }
    }

    static public function login($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("select * from usuarios where email = :txtEmail and password = :txtPassword and estado <> 0");
        $stmt -> bindParam(":txtEmail", $valor['txtEmail'], PDO::PARAM_STR);
        $password = sha1($valor['txtPassword']);
        $stmt -> bindParam(":txtPassword", $password, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    static public function activar($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item=:$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        if($usuario){
            $stmt = Conexion::conectar()->prepare("update $tabla set estado=2 where $item=:$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null;
        }
        return $usuario;
    }

    static public function registroComercio($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where email = :txtEmail or nit = :txtNit");
        $stmt -> bindParam(":txtEmail", $valor['txtEmail'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtNit", $valor['txtNit'], PDO::PARAM_STR);
        $stmt -> execute();
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        if($existe['existe'] == 0){
            $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        (
                                                            razon_social,
                                                            nit,
                                                            email,
                                                            direccion,
                                                            ciudad_id,
                                                            telefono,
                                                            local,
                                                            centro_comercial_id,
                                                            estado
                                                        )
                                                    values(
                                                        :txtNombre,
                                                        :txtNit,
                                                        :txtEmail,
                                                        :txtDireccion,
                                                        :cbCiudad,
                                                        :txtTelefono,
                                                        :rdLocal,
                                                        :cbCentroComercial,
                                                        1
                                                    )");
            $stmt -> bindParam(":txtNombre", $valor['txtNombre'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtNit", $valor['txtNit'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtEmail", $valor['txtEmail'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtDireccion", $valor['txtDireccion'], PDO::PARAM_STR);
            $stmt -> bindParam(":cbCiudad", $valor['cbCiudad'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtTelefono", $valor['txtTelefono'], PDO::PARAM_STR);
            $stmt -> bindParam(":rdLocal", $valor['rdLocal'], PDO::PARAM_STR);
            $cc = ($valor['cbCentroComercial'] != '') ? $valor['cbCentroComercial'] : null ;
            $stmt -> bindParam(":cbCentroComercial", $cc, PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null;
            $stmt = Conexion::conectar()->prepare("select * from $tabla order by id desc limit 1");
            $stmt -> execute();
            $comercio = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            $tabla = 'usuarios';
            $stmt = Conexion::conectar()->prepare("insert into $tabla
                                                        (
                                                            nombre,
                                                            email,
                                                            password,
                                                            estado,
                                                            comercio_id,
                                                            rol
                                                        )
                                                    values(
                                                        :txtNombre,
                                                        :txtEmail,
                                                        :txtPassword,
                                                        0,
                                                        :comercio,
                                                        'comercio'
                                                    )");
            $stmt -> bindParam(":txtNombre", $valor['txtNombre'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtEmail", $valor['txtEmail'], PDO::PARAM_STR);
            $password = sha1($valor['txtPassword']);
            $stmt -> bindParam(":txtPassword", $password, PDO::PARAM_STR);
            $stmt -> bindParam(":comercio", $comercio['id'], PDO::PARAM_STR);
            $stmt -> execute();
            $stmt = null;
            return $comercio;
        }else{
            return array('ErrorStatus' => true, 'Msj' => 'El usuario ya está registrado.');
        }
    }

    public static function mdlMostrarCompras($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select c.id, c.total_compra, c.metodo, c.referencia, c.fecha, c.envio, t.status  
                                                from $tabla c
                                                left join transacciones t on c.referencia = t.referencia
                                                where $item = :valor order by c.fecha desc" );
        $stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;

    }

    public static function mdlMostrarComprasComercio($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * 
                                                from $tabla c 
                                                where (select count(*) 
                                                        from detalle_compra dc
                                                        inner join productos p on dc.id_producto=p.id 
                                                        where dc.id_compra = c.id and p.$item=:valor) > 0 and c.envio=3");
        $stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;

    }

    public static function mdlMostrarComprasPendientesComercio($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * 
                                                from $tabla c 
                                                where (select count(*) 
                                                        from detalle_compra dc
                                                        inner join productos p on dc.id_producto=p.id 
                                                        where dc.id_compra = c.id and p.$item=:valor) > 0 and c.envio<>3");
        $stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    public static function mdlConsultarComercio($tabla, $item, $valor){
        $stmt = Conexion::conectar()->prepare("select * from $tabla where $item = :$item");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    public static function mdlActualizarComercio($tabla, $comercio, $logo){
        $file_name = null;
        if($logo['error'] == 0){
            $stmt = Conexion::conectar()->prepare("select * from $tabla where id=:id");
            $stmt -> bindParam(":id", $_SESSION['comercio'], PDO::PARAM_STR);
            $stmt -> execute();
            $comercioE = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            if($comercioE['logo']){
                unlink('../assets/images/comercios/'.$comercioE['logo']);
            }
            $date = new DateTime();
            $original = explode('.', $logo['name']);
            $ext = $original[count($original)-1];
            $file_name = $comercioE['nit'].'_'.$date->getTimestamp().'.'.$ext;
            move_uploaded_file($logo['tmp_name'],'../assets/images/comercios/'.$file_name);
        }
        $stmt = Conexion::conectar()->prepare("update $tabla set direccion=:txtDireccion,
                                                                 ciudad_id=:cbCiudad,
                                                                 email=:txtCorreo,
                                                                 telefono=:txtTelefono,
                                                                 telefono_fijo=:txtTelFijo,
                                                                 local=:cbLocal,
                                                                 centro_comercial_id=:cbCentroComercial,
                                                                 logo=:logo,
                                                                 facebook=:txtFacebook,
                                                                 instagram=:txtInstagram,
                                                                 twitter=:txtTwitter,
                                                                 video_promocional=:txtVideo
                                                            where id=:id
                                                            ");
        $stmt -> bindParam(":txtDireccion", $comercio['txtDireccion'], PDO::PARAM_STR);
        $stmt -> bindParam(":cbCiudad", $comercio['cbCiudad'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtCorreo", $comercio['txtCorreo'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtTelefono", $comercio['txtTelefono'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtTelFijo", $comercio['txtTelFijo'], PDO::PARAM_STR);
        $stmt -> bindParam(":cbLocal", $comercio['cbLocal'], PDO::PARAM_STR);
        $stmt -> bindParam(":cbCentroComercial", $comercio['cbCentroComercial'], PDO::PARAM_STR);
        $stmt -> bindParam(":logo", $file_name, PDO::PARAM_STR);
        $stmt -> bindParam(":txtFacebook", $comercio['txtFacebook'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtInstagram", $comercio['txtInstagram'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtTwitter", $comercio['txtTwitter'], PDO::PARAM_STR);
        $stmt -> bindParam(":txtVideo", $comercio['txtVideo'], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $_SESSION['comercio'], PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
        return array('ErrorStatus' => false, 'Msj' => 'Se ha actualizado la información del comercio exitosamente.');
    }

    public static function mdlActualizarUsuario($tabla, $usuario){
        
        $stmt = Conexion::conectar()->prepare("select count(*) as existe from $tabla where email = :txtCorreo and id=:id");
        $stmt -> bindParam(":txtCorreo", $usuario['txtCorreo'], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $_SESSION['idUsuario'], PDO::PARAM_STR);
        $stmt -> execute();
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        // return $existe;
        if($existe['existe'] != 0){
            if($usuario['txtPassword'] != ''){
                $sql = "update $tabla set
                            nombre=:txtNombre,
                            email=:txtCorreo,
                            telefono=:txtTelefono,
                            direccion=:txtDireccion,
                            ciudad_id=:cbCiudad,
                            password=:txtPassword
                        where id=:id
                            ";
            }else{
                $sql = "update $tabla set
                            nombre=:txtNombre,
                            email=:txtCorreo,
                            telefono=:txtTelefono,
                            direccion=:txtDireccion,
                            ciudad_id=:cbCiudad
                        where id=:id
                            ";
            }
            $stmt = Conexion::conectar()->prepare($sql);
            $stmt -> bindParam(":txtNombre", $usuario['txtNombre'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtCorreo", $usuario['txtCorreo'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtTelefono", $usuario['txtTelefono'], PDO::PARAM_STR);
            $stmt -> bindParam(":txtDireccion", $usuario['txtDireccion'], PDO::PARAM_STR);
            $ciudad = ($usuario['cbCiudad'] == '') ? null : $usuario['cbCiudad'];
            $stmt -> bindParam(":cbCiudad", $ciudad, PDO::PARAM_STR);
            $stmt -> bindParam(":id", $_SESSION['idUsuario'], PDO::PARAM_STR);
            if($usuario['txtPassword'] != ''){
                $password = sha1($usuario['txtPassword']);
                $stmt -> bindParam(":txtPassword", $password, PDO::PARAM_STR);
            }
            $stmt -> execute();
            
            $stmt = null;
            return array('ErrorStatus' => false, 'Msj' => 'Se ha actualizado la información del usuario exitosamente.');
        }else{
            return array('ErrorStatus' => true, 'Msj' => 'El email ya está registrado.  '. $usuario['cbCiudad']);
        }
    }

    public static function mdlCambiarEstadoPedido($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("update $tabla set envio=:envio where id=:id");
        $stmt -> bindParam(":envio", $valor['estado'], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $valor['pedido'], PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
        return array('ErrorStatus' => false, 'Msj' => 'Se ha actualizado el pedido exitosamente.');
    }

    public static function mdlConsultarComercios($tabla){
        $stmt = Conexion::conectar()->prepare("select * from $tabla");
        $stmt -> bindParam(":valor", $valor, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt -> close();
        $stmt = null;
    }

    public static function mdlCambiarEstado($tabla, $valor){
        $stmt = Conexion::conectar()->prepare("update $tabla set estado=:estado where id=:id");
        $stmt -> bindParam(":estado", $valor['estado'], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $valor['comercio'], PDO::PARAM_STR);
        $stmt -> execute();
        $stmt = null;
        $stmt = Conexion::conectar()->prepare("select * from $tabla where id=:id");
        $stmt -> bindParam(":id", $valor['comercio'], PDO::PARAM_STR);
        $stmt -> execute();
        $comercio = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        return $comercio;
    }

}
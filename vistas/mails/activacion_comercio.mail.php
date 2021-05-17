<?php 
require_once '../../modelos/rutas.php';
$url = ruta::ctrRuta();
?>
<div style="width: 700px;border: 1px solid #eee; border-radius: 5px;margin: auto;box-shadow: 0 0 10px rgba(0,0,0,0.2);text-align: center;color: #505050;margin-top: 50px;">
    <div style="padding: 20px;">
        <img src="<?php echo $url; ?>assets/images/logo_dark.png">
    </div>
    <div style="padding: 20px;">
        <p><strong><?php echo $_GET['nombre']; ?></strong>, hemos activado su cuenta.</p>
        <p>Ahora podrás comercializar tus productos en nuestra plataforma.</p>
    </div>
    <div style="background-color: red;height: 50px; display: flex; justify-content: center; align-items:center">
        <div style="background-color: red;height: 20px;color: white;text-align: center;text-decoration: none;">www.tuferiavirtual.co</div>
    </div>
</div>
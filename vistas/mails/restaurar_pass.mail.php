<?php 
require_once '../../modelos/rutas.php';
$url = ruta::ctrRuta();
?>
<div style="width: 700px;border: 1px solid #eee; border-radius: 5px;margin: auto;box-shadow: 0 0 10px rgba(0,0,0,0.2);text-align: center;color: #505050;margin-top: 50px;">
    <div style="padding: 20px;">
        <img src="https://tuferiavirtual.co/images/LOGO%202021-ABRIL.png" style="width: 150px;">
    </div>
    <div style="padding: 20px;">

        <p><strong><?php echo $_GET['nombre']?></strong>, se ha restaurado su contraseña</p> 

        <br>

        <p>Hemos restaurado tu contraseña con exito
        <br> regresa a Tu Feria Virtual</p>

        <p> 
            <a href="<?php echo $url; ?>login"> <!-- prentendo que regrese a login -->
                <button style="background-color: #ef7236;border: none; padding: 5px 20px;color: white; border-radius: 15px;">intenta iniciar seccion</button>
            </a>
        </p>

    </div>
    <div style="background-color: #2e385e;height: 20px; display: flex; justify-content: center; align-items:center">
        <div style="background-color: #2e385e;height: 10px;color: white;text-align: center;text-decoration: none;"></div>
    </div>
</div>
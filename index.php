<?php
// session_start();

// modelos
require_once "modelos/plantilla.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/tags.modelo.php";
require_once "modelos/ciudad.modelo.php";
require_once "modelos/usuario.modelo.php";
require_once "modelos/centro_comercial.modelo.php";
require_once "modelos/home.modelo.php";
require_once "modelos/rutas.php";
require_once "modelos/mail.php";
require_once "modelos/checkout.modelo.php";
require_once "modelos/config.modelo.php";

// controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/tags.controlador.php";
require_once "controladores/ciudad.controlador.php";
require_once "controladores/centro_comercial.controlador.php";
require_once "controladores/home.controlador.php";
require_once "controladores/usuario.controlador.php";
require_once "controladores/log.controlador.php";
require_once "controladores/checkout.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/config.controlador.php";


// $log = new ControladorLog();
// $log -> visitasLog();

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();
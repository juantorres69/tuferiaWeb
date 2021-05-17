<?php

class ControladorPlantilla{

    public function plantilla(){
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == 'usuario'){
            include "vistas/plantilla.php";
        }else if($_SESSION['rol'] == 'comercio'){
            include "vistas/plantilla_comercio.php";
        }else if($_SESSION['rol'] == 'admin'){
            include "vistas/plantilla_admin.php";
        }
    }

    public function ctrEstiloPlantilla(){
        $tabla = "plantilla";
        $resp = ModeloPlantilla::mdlEstiloPlantilla($tabla);
        return $resp;
    }

}

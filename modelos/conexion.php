<?php

class Conexion{

	static public function conectar(){

        try {
            $link = new PDO("mysql:host=localhost;dbname=tuferiav_adminDB",
						"root",
						"",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);     
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
		
                        
		return $link;

	}


}


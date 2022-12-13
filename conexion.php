<?php
date_default_timezone_set("America/Bogota");
  $contrasena = "";
    $usuario = "root";
    $nombre_bd = "santi-pro";
    $mysqli = new mysqli("localhost","root","","santi-pro");
  
 $ruta_path = "http://localhost/santi-pro"; 

    try {
       /* $bd = new PDO (
            'mysql:localhost;
            dbname='.$nombre_bd,
            $usuario,
            $contrasena,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );*/
		
		$bd = new PDO("mysql:host=localhost;dbname=".$nombre_bd."", $usuario, $contrasena,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		

    } catch (Exception $e) {
        echo "Problema con la conexion: ".$e->getMessage();
    }


?>
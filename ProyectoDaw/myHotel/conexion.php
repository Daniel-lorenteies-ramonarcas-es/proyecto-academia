<?php
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "datos";

function abrir_conexion_PDO(){
    try {
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $conexion = new PDO('mysql:host=localhost;dbname=bd_hotel', 'root', '', $opciones);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        return $conexion;
} catch(PDOException $e) {
        echo $conexion . "<br>" . $e->getMessage();
    }
   
}

?>
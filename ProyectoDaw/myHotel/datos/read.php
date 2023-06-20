<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../db/bd.php');
require_once('../clases/datos_usuario.php');

$database = new Database();
$db = $database->getConnection();
$datos = new Datos($db);

$datos->id_usuario = (isset($_GET['id_usuario']) && $_GET['id_usuario']) ? $_GET['id_usuario'] : '0';

$resultado = $datos->read();

if($resultado){
    $datosRecords=array();
    $datosRecords["datos_usuario"]=array(); 
	while ($dato = $resultado->fetch_assoc()) { 
        extract($dato); 
        $datosDetails=array(
            "id_usuario" => $id_usuario,
            "email" => $email,
            "telefono" => $telefono,
			"pass" => $password,
            "tipo_usuario" => $tipo_usuario,            
			// "created" => $created,
            // "modified" => $modified			
        ); 
       array_push($datosRecords["datos_usuario"], $datosDetails);
    }    
    http_response_code(200);     
    echo json_encode($datosRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No item found.")
    );
} 
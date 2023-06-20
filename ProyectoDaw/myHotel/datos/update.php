<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
require_once('../conexion.php');
include_once './clases/datos_usuario.php';
 
$conexion=abrir_conexion_PDO();
 

$datos = new datos_usuario($conexion);
 
$datos = json_decode(file_get_contents("php://input"));

if(!empty($dato->email) && !empty($dato->password) &&
!empty($dato->telefono) && !empty($dato->id)&& !empty($dato->tipo)){
	
    $datos->id = $dato->id;
    $datos->email = $dato->email;
    $datos->password = $dato->password;
    $datos->telefono = $dato->telefono; 
    $datos->tipo = $dato->tipo;
    $datos->created = date('Y-m-d H:i:s'); 
	
	
	if($datos->update()){     
		http_response_code(200);   
		echo json_encode(array("message" => "Item was updated."));
	}else{    
		http_response_code(503);     
		echo json_encode(array("message" => "Unable to update datos."));
	}
	
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Unable to update datos. datos is incomplete."));
}
?>
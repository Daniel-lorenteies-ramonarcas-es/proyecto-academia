<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../db/bd.php');
require_once('../clases/datos_hotel.php');

$database = new Database();
$db = $database->getConnection();
$datos = new Datos_Hotel($db);

$datos->id_hotel = (isset($_GET['id_hotel']) && $_GET['id_hotel']) ? $_GET['id_hotel'] : '0';

$resultado = $datos->read_hotel();

if($resultado){
    $datosRecords=array();
    $datosRecords["datos_hotel"]=array(); 
    $fotosRecords=array();
    $fotosRecords["fotos_hotel"]=array(); 
	while ($dato = $resultado->fetch_assoc()) { 
        extract($dato); 
        $datosDetails=array(
            "id_hotel" => $id_hotel,
            "nombre_hotel" => $nombre_hotel,
            "pais" => $pais,
            "ciudad" => $ciudad,
            "direccion"=> $direccion,
            "telefono"=> $telefono,
            "numero_personas"=> $numero_personas,
            "numero_habitaciones"=>$numero_habitaciones,
            "descripcion"=>$descripcion,
            "precio_dia"=>$precio_dia,
            "fotos"=> $fotos,
        ); 
             
            
			// "pass" => $password,
            // "tipo_usuario" => $tipo_usuario,            
			// "created" => $created,
            // "modified" => $modified	
            
        		
        
       array_push($datosRecords["datos_hotel"], $datosDetails);
      
    }    
    http_response_code(200);     
    echo json_encode($datosRecords); 
    //echo json_encode($fotosRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No item found.")
    );
} 
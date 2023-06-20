<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../db/bd.php');
require_once('../clases/datos_reserva.php');

$database = new Database();
$db = $database->getConnection();
$datos = new Datos_Reserva($db);

$datos->id_reserva = (isset($_GET['id_usuario']) && $_GET['id_usuario']) ? $_GET['id_usuario'] : '0';

$resultado = $datos->read_reserva();

if($resultado){
    $datosRecords=array();
    $datosRecords["datos_reserva"]=array();  
	while ($dato = $resultado->fetch_assoc()) { 
        extract($dato); 
        $datosDetails=array(
            "id_reserva" => $id_reserva,
            "id_hotel"=> $id_hotel,
            "id_usuario"=> $id_usuario,
            "nombre_hotel"=>$nombre_hotel,
            "dni" => $dni,
            "nombre" => $nombre,
            "apellidos" => $apellidos,
            "telefono" => $telefono,
            "fecha_inicio" => $fecha_inicio,   
            "fecha_fin" => $fecha_fin,   
            "num_personas" => $num_personas ,
            "num_habitaciones" => $num_habitaciones,
            "precio_total" => $precio_total,
        ); 
             
            
			// "pass" => $password,
            // "tipo_usuario" => $tipo_usuario,            
			// "created" => $created,
            // "modified" => $modified	
            
        		
        
       array_push($datosRecords["datos_reserva"], $datosDetails);
      
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
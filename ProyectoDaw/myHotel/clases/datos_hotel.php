<?php
require_once('../conexion.php');
require_once('../funciones.php');
$conexion=abrir_conexion_PDO();
class Datos_Hotel{   
    
    private $table_usuario = "datos_usuario";      
    public $id_hotel;
    public $nombre;
    public $ciudad;
    public $telefono;
    public $direccion;   
    public $disponibilidad;
    public $numero_personas ;
	public $numero_habitacion;
	public $descripcion;
	public $fotos;
	public $precio_dia;
	
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function read_hotel(){	
		if($this->id_hotel) {
			$consulta = $this->conn->prepare("SELECT * FROM datos_hotel WHERE id_hotel = ?");
			$consulta->bind_param("i", $this->id_hotel);					
		} else {
			$consulta = $this->conn->prepare("SELECT * FROM datos_hotel");	
						
			
		}	
		$consulta->execute();	
		$resultado = $consulta->get_result();
		return $resultado;	
	}


	function read_pais(){	
		if($this->pais) {
			$consulta = $this->conn->prepare("SELECT * FROM datos_hotel ");
			$consulta->bind_param("s", $this->pais);					
		} else {
			$consulta = $this->conn->prepare("SELECT * FROM datos_hotel");	
						
			
		}	
		$consulta->execute();	
		$resultado = $consulta->get_result();
		return $resultado;	
	}

	function read_hotel_pais(){	
		if($this->pais) {
			$consulta = $this->conn->prepare("SELECT * FROM datos_hotel WHERE pais = ?");
			$consulta->bind_param("s", $this->pais);					
		} else {
			$consulta = $this->conn->prepare("SELECT * FROM datos_hotel");	
						
			
		}	
		$consulta->execute();	
		$resultado = $consulta->get_result();
		return $resultado;	
	}

	function read_fotos(){	
		if($this->id_hotel) {
			$consulta = $this->conn->prepare("SELECT fotos FROM `fotos_hotel` INNER JOIN datos_hotel dh WHERE dh.id_hotel =?");
			$consulta->bind_param("i", $this->id_hotel);					
		}	else {
			$consulta = $this->conn->prepare("SELECT * FROM datos_hotel");	
						
			
		}				
			
		
		$consulta->execute();	
		$resultado = $consulta->get_result();
		return $resultado;	
	}

	// function read(){	
	// 	if($this->id) {
	// 		$conexion=abrir_conexion_PDO();
    //         $sql='SELECT * FROM datos_usuario where id_usuario=:id_usuario';
	// 		$consulta = $conexion->prepare($sql);
    //         $consulta->bindParam(':id_usuario', $id_usuario);
           	
	// 		$consulta->execute();		
	// 	} else {
	// 		$conexion=abrir_conexion_PDO();
    //         $sql= 'SELECT * FROM datos_usuario';
	// 		$consulta = $conexion->prepare($sql);
    //         $consulta->execute();
	// 		// while($resultado = $consulta->fetch()) {
	// 		// 	return $resultado;
    //         }
			
	// 		return $consulta;
	// 	}
		// $conexion=abrir_conexion_PDO();
		// $consulta->execute();		
		// 
		
		// return $resultado;	
	
	function create(){
        $sql ="INSERT INTO datos_usuario( id_usuario, email, pass, tefefono,tipo_usuario)VALUES ( :id_usuario,:email,:pass,:telefono,:tipo_usuario)";
        $consulta = $conexion->prepare($sql); 
        $consulta->bindParam(':id_usuario', $this->id_usuario);
        $consulta->bindParam(':email', $this->email_user);
        $consulta->bindParam(':pass', $this->password);
        $consulta->bindParam(':telefono', $this->$telefono);
        $consulta->bindParam(':tipo_usuario', $this->$tipo);
        $consulta->execute(); //$this->description, $this->price, $this->category_id, $this->created);
		
		if($consulta->execute()){
			return true;
		}
	 
		return false;		 
	}
		
	function update(){
        $sql= 'UPDATE datos_usuario SET id_usuario=:id_usuario,email=:email,pass=:pass,tefefono=:telefono,tipo_usuario=:tipo WHERE id_usuario=:id_usuario';
		$consulta = $conexion->prepare($sql); 
        
		$this->id = htmlspecialchars(strip_tags($this->id_usuario));
		$this->email_user = htmlspecialchars(strip_tags($this->email_user));
		$this->password = htmlspecialchars(strip_tags($this->password));
		$this->telefono = htmlspecialchars(strip_tags($this->telefono));
		$this->tipo = htmlspecialchars(strip_tags($this->tipo));

        $consulta->bindParam(':id_usuario', $this->id_usuario);
        $consulta->bindParam(':email', $this->email_user);
        $consulta->bindParam(':pass', $this->password);
        $consulta->bindParam(':telefono', $this->$telefono);
        $consulta->bindParam(':tipo_usuario', $this->$tipo);
        $consulta->execute();
		
		if($consulta->execute()){
			return true;
		}
	 
		return false;
	}
	
	function delete(){
		
		$sql='DELETE FROM datos_usuario WHERE id = id_usuario=:id_usuario';
        $consulta = $conexion->prepare($sql); 	
		$this->id = htmlspecialchars(strip_tags($this->id_usuario));
	 
		$consulta->bindParam(':id_usuario', $this->id_usuario);
        
	 
		if($consulta->execute()){
			return true;
		}
	 
		return false;		 
	}
}
?>
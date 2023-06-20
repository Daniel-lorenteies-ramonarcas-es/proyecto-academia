<?php
function create(){
    $conexion= abrir_conexion_PDO();
    $sql ="INSERT INTO datos_usuario( id_usuario, email, pass, tefefono,tipo_usuario)VALUES ( :id_usuario,:email,:pass,:telefono,:tipo_usuario)";
    $consulta = $conexion->prepare($sql); 
    $consulta->bindParam(':id_usuario', $id);
    $consulta->bindParam(':email', $email_user);
    $consulta->bindParam(':pass', $password);
    $consulta->bindParam(':telefono', $telefono);
    $consulta->bindParam(':tipo_usuario', $tipo);
    $consulta->execute();


$stmt->bind_param("ssiis", $this->name, $this->description, $this->price, $this->category_id, $this->created);

if($stmt->execute()){
return true;
}

return false; 
}
?>
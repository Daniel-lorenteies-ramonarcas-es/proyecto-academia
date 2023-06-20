<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
<?php
require_once('conexion.php');
require_once('funciones.php');
session_start();
$id_reserva = $_GET['id_reserva'] ;
?><script>
Swal.fire({
    title: 'Estas seguro de cancelar la reserva?',
    text: "se borrán los datos",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí',
    cancelButtonText: 'NO'
  }).then((result) => {
    
    if (result.isConfirmed) {
        <?php
    borrar_Reserva($id_reserva);
    
    ?>
    //   Swal.fire(
    //     'Se ha cancelado su reserva',
    //     'success'
        

 
        
        
    //   )
    }
    
  })</script>

    <?php
   
    function borrar_Reserva($id_reserva){
        
        echo $id_reserva;
            $conexion =abrir_conexion_PDO();
        $sql='DELETE   FROM datos_reserva WHERE id_reserva='.$_GET['id_reserva'];
        $consulta = $conexion->prepare($sql);

        $consulta->execute();

        if($consulta->rowCount() > 0){
            header('Location:./listareservas.php');
        //     echo '<p>No  se ha borrado ningún contacto</p>';
        // }else{
        //     echo '<p>Se ha borrado un contacto</p>';
         }
        }
        // function volverLista(){
        //     header('Location:./listareservas.php');
           
        // }
        //   
    ?>
   
</body>
</html>


<?php
require_once 'conexion.php';
$conexion=abrir_conexion_PDO();

?>


<?php

    

   


?>

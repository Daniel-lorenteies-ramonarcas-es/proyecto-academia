<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    
<?php
require_once('conexion.php');
require_once('funciones.php');
    session_start();

    
    if(isset($_SESSION['usuario'])){

        include './formularios/form_listareserva.php';
        // $_SESSION['id_hotel'] =$_POST['session_hotel'];
        // $_SESSION['num_personas'] =$_POST['session_num_personas'];
        // $_SESSION['num_habitaciones'] =$_POST['session_num_habitaciones'];
        $id_usuario=$_SESSION['usuario'];
    
        // header('Location:./confirmar_reserva.php');
    }else{
        header('Location:./login.php');
    }
    

    //      echo'</tr>';
    //      echo '</div>';
    
    // echo '</table>';?>
</body>
</html>
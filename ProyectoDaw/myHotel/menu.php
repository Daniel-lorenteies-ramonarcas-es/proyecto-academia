<?php
require_once('conexion.php');
require_once('funciones.php');
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="./style/menu.css">
<body>
<?php
    // echo $_SESSION['usuario'];
    
    // ;
    if($_POST){
        echo $_SESSION['nombre'];
            if(isset($_SESSION['usuario'])){
               
                $_SESSION['id_hotel'] =$_POST['session_hotel'];
                $_SESSION['num_personas'] =$_POST['session_num_personas'];
                $_SESSION['num_habitaciones'] =$_POST['session_num_habitaciones'];
                header('Location:./confirmar_reserva.php');
            }else{
                header('Location:./login.php');
            }
           
        
      
        
        
        //echo $_SESSION['id_hotel'];
        // echo $_SESSION['id_hotel'];
        // echo $_POST['id_hotel'];
        // $_SESSION['id_hotel'] =$_POST['id_hotel'];
        // echo $_SESSION['id_hotel'];
        // $id_usuario=$_SESSION['id_usuario'];
        // $fecha_entrada=$_POST['fecha_entrada'];
        // $fecha_salida=$_POST['fecha_salida'];
        // $num_adultos=$_POST['num_adultos'];
        // $num_ninos=$_POST['num_ninos'];
        // $precio_dia=BuscarPrecioDelHotel($id_hotel);
        // $metodo_pago=$_POST['metodo_pago'];
        // $total_precio=calcularPrecio($fecha_entrada,$fecha_salida,$precio_dia);
        // $total_personas=calcularTotalPersona($num_adultos,$num_ninos);
        // crearReserva($id_usuario,$id_hotel,$fecha_entrada,$fecha_salida,$num_adultos,$num_ninos);
        // echo $total_personas;
        // echo '<br>';
        // echo $total_precio;
       
    }else{
        // if($_POST['boton']){
        //     echo'o';
        // }
        include "./formularios/form_reserva.php";
        ?>
       
        <!-- <div id="nDivHoteles" class="hoteles"></div> -->
        
    <!-- <nav></nav>
    <main>
     <div  class="datos">
            <div id="nDIvSelect"></div>
        </div>
    </main> -->
    <!-- <aside></aside> 
    <footer class="footer">MyHotel</footer>-->
        <?php
    }
    ?>
   
  

</body>
</html>
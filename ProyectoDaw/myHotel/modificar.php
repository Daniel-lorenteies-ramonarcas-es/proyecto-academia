<!DOCTYPE html>
<html lang="en">
<?php
require_once('conexion.php');
    require_once('funciones.php');
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location:./menu.php');
    }
    $id_usuario=$_SESSION['usuario'];
    
    $errores=[];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script src="" type ="module">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    </script>
     <!-- <script type=module> Swal.fire('Any fool can use a computer')</script> -->
    <?php

    if($_POST){
       
        $id_hotel= $_SESSION['id_hotel'];
        $id_reserva = $_SESSION['id_reserva'] ;
        $id_usuario=$_SESSION['usuario'];
        $conexion =abrir_conexion_PDO();
        $patronN ="/^[a-zA-ZñáéíóúÁÉÍÓÚ ]{3,20}$/";
        $patronA ="/^[a-zA-ZñáéíóúÁÉÍÓÚ ]{3,50}$/";
        $patronPhone="/^(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}$/";
        $patronDni="/[0-9]{8}[A-Za-z]{1}/";
 
        
        // echo $_SESSION['id_hotel'];
        $dni=$_POST['dni'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
       
        $telefono=$_POST['telefono'];
        $fecha_inicio=$_POST['fechaentrada'];
        $fecha_fin=$_POST['fechasalida'];
        $correo=$_POST['correo'];
        $total_dias=calcularDias( $fecha_inicio,$fecha_fin);
        $precio_dia= BuscarPrecioDelHotel($id_hotel);
        $precio_total=calcularPrecio($fecha_inicio,$fecha_fin,$precio_dia);
        
        // $num_personas=$_SESSION['num_personas'];
        // $num_habitaciones=$_SESSION['num_habitaciones'];
        $num_personas=obtenerNumeroHabitacionesPorId($id_hotel);
        $num_habitaciones=obtenerNumeroHabitacionesPorId($id_hotel);


        $errores['dni']=checkDni('dni', $patronDni);
        $errores['nombre']=validar_string('nombre', $patronN);
        $errores['apellidos']=validar_string('apellidos', $patronA);
        $errores['telefono']=checkPhone('telefono', $patronPhone);
        $errores['fechaentrada']=comprobar_fecha_inicio($_POST['fechaentrada'],$_POST['fechasalida']);
        $errores['fechasalida']=comprobar_fecha_fin($_POST['fechaentrada'],$_POST['fechasalida']);
        $errores['numeropersonas']=comprobar_numero($num_personas);
        $errores['numerohabitaciones']=comprobar_numero($num_habitaciones);
        // $errores['pago']=comprobar_checked('pago');
        $erroresLimpio = array_diff($errores, array("", 0, null));
        
        //2.- Compruebo si se ha generado algun error
        if(!$erroresLimpio){
           
            modificarReserva($id_reserva,$dni,$nombre,$apellidos,$correo,$telefono,
            $fecha_inicio,$fecha_fin,$num_personas,$num_habitaciones ,$total_dias ,$precio_total)
          ?>
          <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
     Swal.fire({
  title: 'Custom animation with Animate.css',
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
})         // Swal.fire(Lista_de_errores($errores)        
             // );
               
               </script> -->
               <?php     
            
                //2.1.- Si hay errores, vuelvo a cargar el formulario
                //include('./form_confirmar_reserva.php');
            //2.1.- Si hay errores, vuelvo a cargar el formulario

        }
        else{
           
          
            include('./formularios/form_modificar.php');
           
            //header('Location:menu.php');
            //2.2.- Si  hay errores, proceso la información
            // $creditos=ComprobarNota('nota');
            // echo Calcular_Destino('destinos',$creditos);
            // echo  showErrors('user', $errores);
            // echo  showErrors('pass', $errores);
            // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        }
             
        
    }else{
        $_SESSION['id_reserva'] = $_GET['id_reserva'];
        $_SESSION['id_hotel']= $_GET['id_hotel'];
        include('./formularios/form_modificar.php');
    }
    ?>
</body>
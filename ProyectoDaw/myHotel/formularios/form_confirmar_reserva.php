<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/confirmar_reserva.css">
</head>
<!-- <script>
    function getId(){
        const id_hotel =window.sessionStorage.getItem("id_hotel");
        console.log(id_hotel);
        const nvalor=document.createElement('span');
        nvalor.setAttribute('name',`id`);
        nvalor.setAttribute('id',`${id_hotel}`);
    }

</script> -->


<?php 

$errores;
    require_once('funciones.php');
    
    $id_usuario= $_SESSION['usuario'];
    $id_hotel = $_SESSION['id_hotel'];
// echo $_GET['id_hotel'];
// if (isset($_GET['id_hotel'])){
//     $_SESSION['id_hotel']= $_GET['id_hotel']; 
// }

// echo $_SESSION['id_hotel'];
// echo'<script>';
// echo' getId';
// echo '</script> ';

// $_SESSION['id_hotel']= echo window.sessionStorage.getItem("id_hotel");<?php';
?>
<script src='./CalcularPrecioDias.js'>
  
</script>
<body>

<div class= "titulo">
            <h2>Rellene los campos vacíos para hacer su reserva</h2>
        </div> 
<div class =formulario>
<!-- <fieldset>
    <legend>Rellene los campos vacíos para hacer su reserva</legend> -->
        
        
<form action="./confirmar_reserva.php" method="post">


<div class=datosusuario>     
         <div class ="dni">
         
             <label for="">Dni : </label> 
            <input type="text" name="dni" id="">  
            <label class=error > <?php mostrar_error_campo("dni", $errores)?></label>  
        </div>
        
         <!-- <div class ="nombrecompleto"> -->
        
            <div class ="nombre"> 
            
            <label for="">Nombre : </label> 
            <input type="text" name="nombre" id=""  > <label class=error > <?php mostrar_error_campo("nombre", $errores)?></label>  
            </div>
            
            <div class ="apellidos">
             
            <label for="">Apellidos : </label> 
            <input type="text" name="apellidos" id=""   class ="apellidos"> 
            <label class=error > <?php mostrar_error_campo("apellidos", $errores)?></label>  
            </div>  
         <!-- </div>  -->
        
         <!-- <div class ="tlf_correo"> -->
           
            <div class ="correo">  
            
            <label for="">Correo electrónico :  </label> 
            <input type="text" name="correo" id=""  maxlength="60" value=  <?php echo  obtenerEmailPorId($id_usuario)?>>
            <label class=error > <?php mostrar_error_campo("correo", $errores)?></label>  
            </div>
            
            <div class ='telefono'>
            
            <label for="">Teléfono :</label> 
            <input type="text" name="telefono" id="" maxlength="90"  class ="telefono"> 
            <label class=error > <?php mostrar_error_campo("telefono", $errores)?></label>  
            </div>  
         <!-- </div>  -->


        <!-- <div class=fechas> -->
           
            <div class ="fechaentrada">
            
            <h3>Fecha de entrada : </h3>
          
            <!-- <label for="">Fecha de Entrada</label>  -->
            <input type="date" name="fechaentrada" id="ndatefechainicio" min= <?php echo fechaActual() ?> max =<?php echo fechaFin() ?>>
            <label class=error > <?php mostrar_error_campo("fechaentrada", $errores)?></label>  
            </div>  
            
            <div class ="fechasalida">
            
            <h3>Fecha de salida : </h3>
        
            <!-- <label for="">Fecha de Salida</label>  -->
            <input type="date" name="fechasalida" id="ndatefechafin"  min= <?php echo fechaDiaSiguiente() ?>  max =<?php echo fechaFin() ?>>
            <label class=error > <?php mostrar_error_campo("fechasalida", $errores)?></label>  
            </div>  
       

 
        </div> 
        <div class =hotel>
        
        <div class ="fila1">
            <div class ="nombrehotel">
            <label><?php echo obtenerNombreHotelPorId($id_hotel) ;?> </label>
            </div>
        </div>
        <div class ="fila2">
            <div class ="direccionhotel">
            <label for="">Dirección : </label> 
            <label> <?php echo obtenerDirecionHotelPorId($id_hotel) ;?> </label>
            </div>
        </div>
        <div class="fila3">
         <div class ="numeropersonas">
        <label class="num_personas" for="">Numero de Personas : <?php echo  obtenerNumeroPersonasPorId($id_hotel)//$_SESSION['num_personas']?> </label> 
        </div>  
        <div class ="numerohabitaciones">
        <label for="" class="num_habitaciones">Numero de Habitaciones : <?php echo  obtenerNumeroHabitacionesPorId($id_hotel)  //$_SESSION['num_habitaciones'] ?> </label> 
      
        </div>  
        </div>
        <!-- <div class ="hotel-nombrehotel">
        <label for="">Hotel : </label> 
        <input type="text" name="hotel" id=""  disabled placeholder=  <?php  ?> > 
        </div>   -->
        <div class="fila4">
        <div class ="telefonohotel">
        <label for="">Teléfono: </label> 
        <input type="text" name="tlfhotel" id=""  disabled class="tlfhotel" value=   <?php  echo  obtenerNumeroTelefonoPorId($id_hotel)?>>
        </div>  
        <div class ="precio">
        <label for="">Precio por día : </label>
        <input type="text" name="precio_dia" class="precio_dia" disabled id="nInputprecioDia"  value= <?php echo  obtenerNumeroPrecioPorId($id_hotel).'€' ; ?>>
        </div>  
        </div>  
        <div class="fila5">
        <div class ="preciototal">
        <label for="">Precio Total : </label>
        <input type="text" name="precio_total" class="precio_total" disabled id="nInputprecioTotal"  value=<?php  echo  "0.00".'€' ?>>
        </div>
        </div>
        <div class ="informacion">
        <p class="descripcion"><?php echo obtenerDescripcionHotelPorId($id_hotel) ;?></p>
        </div>
   </div>
   </div>

        
   <div class="botones">
            <div >
                <button class="botonvolver" disabled> <a class="volver" href="./menu.php"> volver</a></button>
            </div>
            <!-- <div class="botonvolver">
                <a class="enlace-registro"  href="">Volver</a> 
            </div> -->
            <div class="">
                <button class="botonconfirmar" disabled><input type="submit" class="confirmar" value ="confirmar" click='alertaRealizarReserva()'></button>
            </div>
    </div>

    </div> 


        
        <!-- </fieldset> -->
<!--         
        -->
   <!-- <div class=metodo_pago>
   
        <input type="radio" name="pago" value="efectivo"/>
        <label>efectivo</label>
        <input type="radio" name="pago" value="metálico"> 
        <label>metálico</label>
        <input type="radio" name="pago" value="tarjeta"> 
        <label>tarjeta</label>
        <br/><br/> 
        <?php //mostrar_error_campo("pago", $errores)?>
    </div> -->

   <!-- </div> -->
 
  
  
   </div>




    
   
   </form>
   </div>
</body>
<script>
  
</script>
</html>


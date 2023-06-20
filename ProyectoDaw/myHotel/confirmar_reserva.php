<!DOCTYPE html>
<html lang="en">
<?php
require_once('conexion.php');
require_once('funciones.php');
    session_start();
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
        // echo $_SESSION['usuario'];
        // // echo $_SESSION['id_reserva'];
        // echo $_SESSION['id_hotel'];
        $id_usuario= $_SESSION['usuario'];
         $id_hotel = $_SESSION['id_hotel'];
    if($_POST){

        $conexion =abrir_conexion_PDO();
        $patronN ="/^[a-zA-ZñáéíóúÁÉÍÓÚ ]{3,20}$/";
        $patronA ="/^[a-zA-ZñáéíóúÁÉÍÓÚ ]{3,50}$/";
        $patronPhone="/^(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}$/";
        $patronDni="/[0-9]{8}[A-Za-z]{1}/";
        $id_usuario= $_SESSION['usuario'];
        $id_hotel = $_SESSION['id_hotel'];
        
        // echo $_SESSION['id_hotel'];
        $dni=$_POST['dni'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        // $pago =$_POST['pago'];
        $nombre_hotel =obtenerNombreHotelPorId($id_hotel) ;
        $telefono=$_POST['telefono'];
        $fecha_inicio=$_POST['fechaentrada'];
        $fecha_fin=$_POST['fechasalida'];
        $total_dias=calcularDias($_POST['fechasalida'],$_POST['fechaentrada']);
        $precio_dia= BuscarPrecioDelHotel($id_hotel);
        $precio_total=calcularPrecio($fecha_inicio,$fecha_fin,$precio_dia);
        // $num_personas=$_SESSION['num_personas'];
        // $num_habitaciones=$_SESSION['num_habitaciones'];
        $num_personas=getNumerodePersonas($id_hotel);
        $num_habitaciones=getNumerodeHabitanciones($id_hotel);


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
          
          insertar_nueva_reserva($id_reserva,$id_usuario,$id_hotel,$dni,$nombre,$apellidos,$telefono,$nombre_hotel,
          $fecha_inicio,$fecha_fin,$num_personas,$num_habitaciones ,$total_dias ,$precio_total);
          ?>
      <?php   
          header('Location:menu.php');
//           
            
                //2.1.- Si hay errores, vuelvo a cargar el formulario
                //include('./form_confirmar_reserva.php');
            //2.1.- Si hay errores, vuelvo a cargar el formulario

        }
        else{
           
          
            include('./formularios/form_confirmar_reserva.php');
           
            //header('Location:menu.php');
            //2.2.- Si  hay errores, proceso la información
            // $creditos=ComprobarNota('nota');
            // echo Calcular_Destino('destinos',$creditos);
            // echo  showErrors('user', $errores);
            // echo  showErrors('pass', $errores);
            // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        }
             
        
    }else{
        include('./formularios/form_confirmar_reserva.php');
    }
    ?>
</body>
<!-- <script type=module>


  function alertaRealizarReserva(){
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: '¿Confirmar Reserva?',
  text: "¿Desea Confirmar la reseva?",
  showCancelButton: true,
  confirmButtonText: 'SÍ',
  cancelButtonText: 'NO',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})}
</script> -->
</html>
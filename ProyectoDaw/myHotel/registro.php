<?php
$errores=[];
require_once('conexion.php');
    require_once('funciones.php');
if($_POST){
        $conexion =abrir_conexion_PDO();
        $patronUser="/^[a-zA-ZñáéíóúÁÉÍÓÚ ]{3,20}$/";
        $patronPassword ="/^[0-9a-zA-ZñáéíóúÁÉÍÓÚ ]{8,20}$/";
        //$patronPhone="/^(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}$/";
        // $errores['user']=checkUser('user', $patronUser);
        $errores['user']=validar_email($_POST['user']);
        $errores['pass']=checkPassword('pass', $patronPassword);
        //$errores['tlf']=checkPhone('tlf', $patronPhone);
        $erroresLimpio = array_diff($errores, array("", 0, null));
            
        //2.- Compruebo si se ha generado algun error
        if(!$erroresLimpio){
            
            // $id=generarId_Usuario();
            // $pass=encriptarPass($_POST['pass']);
            

            //2.1.- Si hay errores, vuelvo a cargar el formulario
            insertar_nuevo_usuario($_POST['user'],$_POST['pass']);
            header('Location:./login.php');
                //
            
            
        }
        else{
            include './formularios/form_registro.php';
            //2.2.- Si  hay errores, proceso la información
            // $creditos=ComprobarNota('nota');
            // echo Calcular_Destino('destinos',$creditos);
            // echo  showErrors('user', $errores);
            // echo  showErrors('pass', $errores);
            // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
            
             
        }
    // if( (!empty($_POST['user'])) && (!empty($_POST['pass']))){
       
    // }else{
    //     echo $_POST['user'];
    // }
}else{
   include './formularios/form_registro.php';
   
}
?>
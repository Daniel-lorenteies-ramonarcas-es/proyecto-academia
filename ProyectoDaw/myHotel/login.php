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
$errores=[];
if($_POST){
        $conexion =abrir_conexion_PDO();
     
        $patronUser="/^[a-zA-ZñáéíóúÁÉÍÓÚ ]{3,20}$/";
        $patronPassword ="/^[0-9a-zA-ZñáéíóúÁÉÍÓÚ ]{8,20}$/";
        // $errores['user']=checkUser('user', $patronUser);
        $errores['user']=validar_email($_POST['user']);
        $errores['pass']=checkPassword('pass', $patronPassword);

        $erroresLimpio = array_diff($errores, array("", 0, null));
            
        //2.- Compruebo si se ha generado algun error
        if($erroresLimpio){
            include './formularios/form.php';
                //2.1.- Si hay errores, vuelvo a cargar el formulario
                
            //2.1.- Si hay errores, vuelvo a cargar el formulario

        }
        else{
            $_SESSION['usuario']= buscarId_UsuarioPorEmeailYContraseña($_POST['user'],$_POST['pass']);
            if(isset( $_SESSION['usuario'])){
                header('Location:menu.php');
            } else{
                mostrarError_login();
                include './formularios/form.php';
            }
            // 
            
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
    include './formularios/form.php';
   
}
?>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./style/login.css">
</head>
<?php 
// $errores ;
    require_once('funciones.php');
?>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script> -->

<body>
        <div class =banner>
            <h1 class ="header-logo">
                <img src="./imagenes_hoteles/logo.png" alt="">
            </h1>
            <div class="inicio">
                <a href="menu.php">Inicio</a>
            </div>
        </header>
        </div>
    <div class="form">
        <form action="login.php" method="post">
        <h1 class="encabezado">Inicar Sesión</h1>
        <div class="informacion" >
            <p>Para realizar o ver sus reservas ,inicie sessión </p>
        </div>
        <div class="mostraerrores">
            <div class="errores-user">
                <?php mostrar_error_campo("user", $errores)?> 
            </div> 
            <div class="errores-pass">
                <?php mostrar_error_campo("pass", $errores)?>
            </div> 
        </div> 
        <div class ='datos-login'> 
            <div class="user">
                
                <input type="text" name="user" id="tTxtuser" placeholder='Usuario@gmail.com' >
            </div> 
            <div class="password">
                <input type="password" name="pass" id="tPasPassord" placeholder='contraseña' >
            </div>
        </div>
       
        <div class="botones">
            <div class="enviar">
            <input class="boton-enviar" type="submit" value="enviar"> 
            </div>
            <div class="registrar">
            <button class="enlace-registro" disabled><a  href="registro.php">registrarse</a></button>
            </div>
        </div>
    </form>    
</div>
<div class="footer"> <footer>
<p class="">Myhotel© all copyright reserved </p>
    </footer> </div>
        
    <script type="module">
        
    </script>
</body>
</html>
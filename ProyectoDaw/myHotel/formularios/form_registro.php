<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="./style/registro.css">
<?php 
    require_once('funciones.php');
?>
<body>
<div class =banner>
            <h1 class ="header-logo">
                <img src="./imagenes_hoteles/logo.png" alt="">
            </h1>
            <div class="inicio">
                <a href="./menu.php">Inicio</a>
            </div>
        </header>
        </div>
<div class="form">
        <form action="./registro.php" method="post">
        <h1 class="encabezado">Registro</h1>
        <div class="informacion" >
            <p>Escriba un correo Electrócnico y contraseña para registrarse </p>
        </div>
        <div class="mostraerrores">
            <div class="errores-user">
                <?php mostrar_error_campo("user", $errores)?> 
            </div> 
            <div class="errores-pass">
                <?php mostrar_error_campo("pass", $errores)?>
            </div> 
            </div> 
        <div class ='datos-registrar'> 
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
            <!-- <div class="login">
            <button class="enlace-login" disabled><a  href="login.php">volver</a></button>
            </div> -->
        </div>
    </form>    
</div>
<div class="footer"> <footer>
        <p class="textofooter">Myhotel all reserved.</p>
    </footer> </div>
    </form>    
</div>
</body>
</html>
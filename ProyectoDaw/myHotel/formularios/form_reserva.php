<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/menu.css">
</head>
<script src="./menu.js"></script>
<?php 
    require_once('conexion.php');
 
    require_once('funciones.php');
    // session_start();
    
    // $id_usuario=$_SESSION['usuario'];
    // echo $id_usuario;
?>
<body>
    <div class="container">
    <div class =banner>
    <header class="header">
        <div class="container-header">
            <h1 class ="header-logo">
                <img src="./imagenes_hoteles/logo.png" alt="">
            </h1>
            <ul class="nav-menu">
                <!-- <li><a href="./menu.php">Inicio</a></li> -->
                <li><a href="./listareservas.php">Mis Reservas</a></li>
                
                <li><a href="./registro.php">Registrarse</a></li>
                <li><a href="./login.php">Inciar Sesión</a></li>
                <li><a href="./cerrarsession.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </header>
    </div>
    <!-- <div id="nDivdatos" class="datos"></div> -->

    <div id="nDivHoteles" class="form"></div>
    <!--<nav></nav>
    <main>
    
    </main>
     <aside></aside>  -->
     <!-- <div class="footer"> <footer>
        <p class="">Myhotel all reserved.</p>
    </footer> </div> -->
        
    </div>
    <div class="footer"> <footer>
        <p class="">Myhotel© all copyright reserved </p>
    </footer> </div>
</body>
</html>
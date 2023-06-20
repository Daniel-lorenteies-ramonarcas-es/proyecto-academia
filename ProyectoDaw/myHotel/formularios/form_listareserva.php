<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    require_once('conexion.php');
    require_once('funciones.php');

?>
<link rel="stylesheet" href="./style/listareserva.css">
<body>

    <div class =banner>
    <header class="header">
        <div class="container-header">
            <h1 class ="header-logo">
                <img src="./imagenes_hoteles/logo.png" alt="">
            </h1>
            <ul class="nav-menu">
                <li><a href="./menu.php">Inicio</a></li>
                <!-- <li><a href="./listareservas.php">Mis Reservas</a></li> -->
                <li><a href="./cerrarsession.php">Cerrar Sesion</a></li>
                <!-- <li><a href="./login.php">Iniciar Sesión</a></li> -->
            </ul>
        </div>
    </header>
    </div>
    <?php
    MostrarReservas();
    ?>
    <div class="footer"> <footer>
    <p class="">Myhotel© all copyright reserved </p>
    </footer> </div>
</body>
</html>
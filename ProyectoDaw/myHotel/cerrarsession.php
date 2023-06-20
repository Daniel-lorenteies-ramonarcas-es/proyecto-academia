<?php
 session_start();
 if(!empty($_SESSION['usuario'])){
    session_destroy();
    header('Location:menu.php');
 }else{
   header('Location:menu.php');
 }

?>
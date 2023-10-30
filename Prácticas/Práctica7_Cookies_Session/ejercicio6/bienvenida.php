<?php
    session_start();
    if(isset($_SESSION['nombre'])){
        echo 'Hola ' . $_SESSION['nombre'] . '. Bienvenido al sitio';
    }
    else{
        echo 'Usted no puede visitar esta página!';
    }
?>
<br>
<br>
<a href="index.php">Volver al inicio<a>
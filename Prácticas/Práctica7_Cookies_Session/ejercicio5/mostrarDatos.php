<?php
    session_start();
    if(!empty($_SESSION['usuario']) and !empty($_SESSION['contrasena'])){
        echo 'Hola ' . $_SESSION['usuario'] . ' . No olvides tu contraseña: ' . $_SESSION['contrasena'];
    }
    else{
        echo 'No hay ninguna sesión iniciada';
    }
?>
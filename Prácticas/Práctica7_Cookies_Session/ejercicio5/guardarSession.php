<?php
    if(!empty($_POST['usuario']) and !empty($_POST['contrasena'])){
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['contrasena'] = $_POST['contrasena'];
        echo "<a href='mostrarDatos.php'>Recuperar clave y usuario</a>";
    }
    else{
        echo 'Error al iniciar la sesión';
    }
?>
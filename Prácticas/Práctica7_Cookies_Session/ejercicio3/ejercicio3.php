<?php
    $usuario;
    if(!empty($_POST['usuario'])){
        $usuario = $_POST['usuario'];
        setcookie("usuario", $usuario, time() + 60 * 60 * 20 * 10);
    }
    else if (!empty($_COOKIE['usuario'])){
        $usuario = $_COOKIE['usuario'];
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ejercicio 3</title>
    </head>
    <body>
    <?php
    if (!empty($usuario))
        echo "<p>Bienvenido $usuario!!!</p>";
    ?>
        <form action="" method="POST">
            <label>Ingrese el nuevo nombre de usuario</label>
            <input type="text" name="usuario">
            <input type="submit">
        </form>
    </body>
</html>
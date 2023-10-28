<?php
    $mensaje;
    $cant;
    if(!empty($_COOKIE['contador'])){
        $mensaje = "Usted ha visitado nuestra página " . $_COOKIE['contador'] + 1 . " veces";
        $cant = $_COOKIE['contador'] + 1;
    }
    else{
        $mensaje = "Bienvenido, esta es la primera vez que visita esta página!";
        $cant = 1;
    }
    setcookie('contador', $cant, time() + 60 * 60 * 24 * 365);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>EJERCICIO 2</title>
    </head>
    <body>
        <p style="background-color:#FF5D5D;">
            <?php echo $mensaje; ?>
        </p>
    </body>
</html>
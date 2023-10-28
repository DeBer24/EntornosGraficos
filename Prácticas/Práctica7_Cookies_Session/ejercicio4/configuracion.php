<?php
    $tipo = "todos";
    if(!empty($_POST['tipo'])){
        $tipo = $_POST['tipo'];
        setcookie('tipoTitular', $tipo, time() + 60 * 60 * 20 * 365 * 10);
    }
    else if (!empty($_COOKIE['tipoTitular'])){
        $tipo = $_COOKIE['tipoTitular'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Configuración Periódico</title>
    </head>
    <body>
        <form action="" method="POST">
            <fieldset>
                <legend>¿Qué noticias desea visualizar?</legend>
                <div>
                    <input id="rdPoliticas" type="radio" name="tipo" value="politica" <?php if($tipo == 'politica') echo 'checked'; ?>>
                    <label for="rdPoliticas">Políticas</label>
                </div>
                <div>
                    <input id="rdEconomia" type="radio" name="tipo" value="economia" <?php if($tipo == 'economia') echo 'checked'; ?>>
                    <label for="rdEconomia">Económicas</label>
                </div>
                <div>
                    <input id="rdDeportes" type="radio" name="tipo" value="deportes" <?php if($tipo == 'deportes') echo 'checked'; ?>>
                    <label for="rdDeportes">Deportivas</label>
                </div>
            </fieldset>
            <input type="submit" value="Guardar">
        </form>
        <br>
        <a href="index.php">Volver al inicio<a>
        <br>
        <a href="borrarConfiguracion.php">Borrar configuración</a>
    </body>
<html>
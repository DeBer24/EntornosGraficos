<?php
    $modo;
    if(!empty($_POST['diseno']))
    {
        $modo = $_POST['diseno'];
        setcookie("disenoPagina", $modo, time() + (10 * 365 * 24 * 60 * 60));
    }
    else if(empty($_COOKIE['disenoPagina'])){
        $modo = "claro";
    }else{
        $modo = $_COOKIE['disenoPagina'];
    }

    if ($modo == "lgbt"){
        $opciones = "<option value='claro'>Modo claro</option> <option value='oscuro'>Modo oscuro</option> <option value='lgbt' selected>Colores LGBT</option>";
        $hojaEstilos = "<link rel='stylesheet' href='disenoLGBT.css?v=' type='text/css'>";
    }
    else if ($modo == "oscuro"){
        $opciones = "<option value='claro'>Modo claro</option> <option value='oscuro' selected>Modo oscuro</option> <option value='lgbt'>Colores LGBT</option>";
        $hojaEstilos = "<link rel='stylesheet' href='disenoOscuro.css?v=' type='text/css'>";
    }
    else if ($modo == "claro"){
        $opciones = "<option value='claro' selected>Modo claro</option> <option value='oscuro'>Modo oscuro</option> <option value='lgbt'>Colores LGBT</option>";
        $hojaEstilos = "<link rel='stylesheet' href='disenoClaro.css?v=' type='text/css'>";
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
        <link rel="stylesheet" href="estructura.css?v=" type="text/css">

    <?php
        echo $hojaEstilos;
    ?>
    </head>

    <body>
        <div id="menuSuperior"></div>
        <div id="contenedor">
            <div id="menuLateral"></div>
            <div id="contenido">
                <form action="" method="POST">
                    <label>¿Qué estilo prefiere?</label>
                    <select name="diseno">
                        <?php
                            echo $opciones;
                        ?>
                    </select>
                    <button type="submit">Guardar</button>
                </form>
            </div>
        </div>
        <div id="footer"></div>
    </body>
</html>
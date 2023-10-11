<html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Ejercicio 2</title>
        </head>
        <body>

<?php
    if(!empty($_POST)){
        $destinatario = "administradorpagina@mail.com";
        $asunto = "Consulta " . $_POST["apellido"] . $_POST["nombre"];
        $cuerpo = $_POST["motivo"] . "\n" . $_POST["consulta"];
    
        mail($destinatario,$asunto,$cuerpo);

        ?>
        
            <p>Su consulta ha sido enviada</p>
        
        <?php
    }
    else{
        ?>

            <form action="ejercicio2.php" method="POST">
                Nombre: <input type="text" name="nombre" required><br>
                Apellido: <input type="text" name="apellido" required><br>
                Motivo: <select name="motivo">
                    <option>Inicio de sesion</option>
                    <option>Olvide mi contraseña</option>
                    <option>Problema con el sitio</option>
                    <option>Otro</option>
                </select><br>
                Consulta: <br><textarea name="consulta" cols="30" rows="10" required></textarea><br>
                <input type="submit" value="Enviar"><br>
            </form>

        <?php
    }
?>

    </body>
</html>
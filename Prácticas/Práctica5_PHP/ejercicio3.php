<html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Ejercicio 3</title>
        </head>
        <body>

<?php
    if(!empty($_POST)){
        $destinatario = $_POST['email'];
        $asunto = "Amigo, prueba este sitio! Tiene funcionalidades espectaculares";
        $cuerpo = "Hola " . $_POST["amigo"] . " soy " . $_POST["visitante"] . " y quiero invitarte a probar el sitio EJERCICIO 3";
    
        mail($destinatario,$asunto,$cuerpo);

        ?>
        
            <p>Su invitación ha sido enviada</p>
        
        <?php
    }
    else{
        ?>

            <form action="ejercicio3.php" method="POST">
                <h2>Recomienda nuestro sitio!</h2>
                Quién es tu amigo?: <input type="text" name="amigo" required><br>
                Cómo te reconocerá?: <input type="text" name="visitante" required><br>
                Ingresa su email: <input type="email" name="email" required><br>
                <input type="submit">
            </form>

        <?php
    }
?>

    </body>
</html>
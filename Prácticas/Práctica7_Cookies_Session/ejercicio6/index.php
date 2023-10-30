<?php
    if(!empty($_POST['correo'])){
        $dbServer = "localhost";
        $dbName = "base2";
        $dbUser = "root";
        $dbPassword = "";
        $cn = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName) or die;
        $query = "SELECT nombre FROM alumnos WHERE mail = '" . $_POST['correo'] . "'";
        $resultados = mysqli_query($cn, $query);

        session_start();
        while($fila = mysqli_fetch_array($resultados)){
            $_SESSION['nombre'] = $fila['nombre'];
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 6</title>
    </head>
    <body>
        <form action="" method="POST">
            <label>Mail alumno:</label>
            <input type="mail" name="correo">
            <input type="submit" value="Aceptar">
        </form>
        <br>
        <a href="bienvenida.php">Página de bienvenida!<a>
    </body>
</html>
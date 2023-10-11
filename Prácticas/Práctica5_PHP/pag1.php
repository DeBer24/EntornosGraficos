<!DOCTYPE html>
<html>
    <head>
        <title>Página 1</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>

<?php
    session_start();
    if (isset($_SESSION["contador"]))
    {
        $_SESSION["contador"]++;
        echo '<p>Usted ha visitado ' . $_SESSION["contador"] . ' páginas de este sitio';
    }
    else
    {
        $_SESSION["contador"] = 1;
        echo '<p>Usted ha visitado 1 página de este sitio';
    }
?>

        <a href="pag2.php"><button type="button" class="btn btn-secondary">Página 2</button></a>
        <a href="pag3.php"><button type="button" class="btn btn-success">Página 3</button></a>
        <a href="pag4.php"><button type="button" class="btn btn-danger">Página 4</button></a>
        <a href="ejercicio4.php"><button type="button" class="btn btn-dark">Volver al inicio</button></a>
    </body>
</html>

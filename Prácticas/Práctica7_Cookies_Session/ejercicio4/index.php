<?php
    $titular = "todos";
    if(!empty($_COOKIE['tipoTitular'])){
        $titular = $_COOKIE['tipoTitular'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Periódico La Nación</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="configuracion.php">Configurar la página</a>
                </div>
            <div class="row">
                
        <?php
            switch ($titular) {
                case 'todos':
                    ?>
                    <div class="col-4">
                        <h3>Política</h3>
                        <?php include 'cargarNoticias.php'; ?>
                    </div>
                    <div class="col-4">
                        <h3>Deportes</h3>
                        <?php include 'cargarNoticias.php'; ?>
                    </div>
                    <div class="col-4">
                        <h3>Economía</h3>
                        <?php include 'cargarNoticias.php'; ?>
                    </div>
                    <?php
                    break;
                
                case 'politica':
                    ?>
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h3>Política</h3>
                        <?php include 'cargarNoticias.php'; ?>
                    </div>
                    
                    <div class="col-2"></div>
                    <?php
                    break;

                case 'economia':
                    ?>
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h3>Economía</h3>
                        <?php include 'cargarNoticias.php'; ?>
                    </div>
                    <div class="col-2"></div>
                    <?php
                    break;
                
                case 'deportes':
                    ?>
                    <div class="col-2"></div>
                    <div class="col-8">
                        <h3>Deportes</h3>
                        <?php include 'cargarNoticias.php'; ?>
                    </div>
                    <div class="col-2"></div>
                    <?php
                    break;
            }
        ?>

            </div>
        </div>
    </body>
</html>
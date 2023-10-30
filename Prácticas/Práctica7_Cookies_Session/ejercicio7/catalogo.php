<?php
    session_start();
    if(isset($_SESSION['carro']))
        $carro = $_SESSION['carro'];
    else
        $carro = false;

    $server = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "compras";

    $cn = mysqli_connect($server, $dbUser, $dbPassword, $dbName) or die;
    $query = "SELECT id, producto, precio FROM catalogo";
    $resultados = mysqli_query($cn, $query);
    mysqli_close($cn);

?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuestro catálogo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <a href="mostrarCarrito.php?<?php echo session_id() ?>"><button>Mi carrito</button></a> 
            </div>
            <div class="row">

        <?php
            while ($fila = mysqli_fetch_array($resultados)){
                ?>
                <div class="card" style="width: 18rem; margin:10px">
                    <img src="" class="card-img-top" alt="Imagen del producto">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fila['producto']?></h5>
                        <p class="card-text">$<?php echo number_format($fila['precio'], 2)?></p>
                
                <?php
                if(!$carro || !isset($carro[md5($fila['id'])]['identificador']) || $carro[md5($fila['id'])]['identificador'] != md5($fila['id'])){ //el prod no está en el carrito
                    $link = "agregarProd.php?" . session_id() . "&id=" . $fila['id'];
                ?>
                        <a href=<?php echo "'$link'"?> class="btn btn-primary">Añadir al carrito</a>

                <?php
                }
                else{//el prod está en el carro
                    $link = "borrarProd.php?" . session_id() . "&id=" . $fila['id'];
                ?>
                        <a href=<?php echo "'$link'"?> class="btn btn-danger">Borrar producto</a>

                <?php
                }
                ?>
                    </div>
                </div>
                <?php
            }
        ?>
            </div>
        </div>
    </body>
</html>
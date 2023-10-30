<?php
    session_start();
    if(isset($_SESSION['carro']))
        $carro = $_SESSION['carro'];
    else
        $carro = false;
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mi carrito</title>
        <link rel="stylesheet" type="text/css" href="styles.css?v=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Carrito</h1>
        <?php
        if($carro){
        ?>
            <table>
                <tr>
                    <td width="250">Producto</td>
                    <td width="100">Precio</td>
                    <td width="100">Cantidad de Unidades</td>
                    <td width="100">Borrar</td>
                </tr>
        <?php
            $contador = 0;
            $suma = 0;
            foreach($carro as $k => $v){
                $subto = $v['cantidad'] * $v['precio'];
                $suma = $suma + $subto;
                $contador++;
                ?>

                <form name="a<?php echo $v['identificador'] ?>" method="POST" action="agregarProd.php?<?php echo session_id() ?>&id=<?php echo $v['id']?>">
                    <tr>
                        <td><?php echo $v['producto'] ?></td>
                        <td>$<?php echo number_format($v['precio'], 2) ?></td>
                        <td width="136">
                            <input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad']?>" size="8">
                            <input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>">
                        </td>
                        <td>
                            <a href="borrarProd.php?<?php echo session_id() ?>&id=<?php echo $v['id']?>&car=1"><img src="trash.gif" alt="Borrar"></a>
                        </td>
                    </tr>
                </form>

            <?php
            }
            ?>

            </table><br><br>
            <div><span class="prod">Total de Artículos: <?php echo count($carro);?></span></div><br>

            <div><span class="prod">Total: $<?php echo number_format($suma,2);?></span></div><br>
            
            <a href="catalogo.php?<?php echo SID;?>"><img src="continuar.gif" alt="Ir al catálogo"></a>&nbsp;
            <a href="repago.php?<?php echo SID;?>&costo=<?php echo $suma; ?>"><img src="finalizarcompra.gif" alt="Finalizar compra"></a>

        <?php 
        }
        else{
            ?>
            
            <p>
                <span class="prod">No hay productos seleccionados</span>
                <a href="catalogo.php?<?php echo session_id();?>"><img src="continuar.gif" alt="Catálogo"></a>
            </p>
            
            <?php
        }
        ?>
        </div>
    </body>
</html>
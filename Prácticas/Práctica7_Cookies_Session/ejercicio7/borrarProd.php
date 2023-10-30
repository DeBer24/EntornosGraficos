<?php
    session_start();
    extract($_GET);

    $carro = $_SESSION['carro'];
    unset($carro[md5($id)]);

    $_SESSION['carro'] = $carro;
    
    if(isset($_GET['car']))
        header("Location:mostrarCarrito.php?" . session_id());
    else
        header("Location:catalogo.php?" . session_id());
?>
<?php
    session_start();
    $id = $_GET['id'];
    
    $server = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "compras";
    $cn = mysqli_connect($server, $dbUser, $dbPassword, $dbName) or die;

    $cantidad = 1;
    if(isset($_POST['cantidad']))
        $cantidad = $_POST['cantidad'];
    
    $resultados = mysqli_query($cn, "SELECT * FROM catalogo where Id = '".$id."'");
    $row = mysqli_fetch_array($resultados);

    if(isset($_SESSION['carro']))
        $carro = $_SESSION['carro'];

    $carro[md5($id)] = array('identificador'=>md5($id), 'cantidad'=>$cantidad, 'producto'=>$row['producto'], 'precio'=>$row['precio'], 'id'=>$id);

    $_SESSION['carro'] = $carro;

    if(isset($_POST['cantidad']))
        header("Location:mostrarCarrito.php?" . session_id());
    else
        header("Location:catalogo.php?" . session_id());
?> 
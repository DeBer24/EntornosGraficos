<?php
    $resultados = false;
    if(!empty($_POST['frase'])){
        $server = "localhost";
        $dbUser = "root";
        $dbPassword = "";
        $dbName = "prueba";
        $cn = mysqli_connect($server, $dbUser, $dbPassword, $dbName) or die;
        $query = "SELECT * FROM buscador WHERE letra LIKE '%" . $_POST['frase'] . "%'";
        $resultados = mysqli_query($cn, $query);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Buscador de canciones</title>
    </head>
    <body>
        <form action="" method="POST">
            <label>Frase a buscar:</label>
            <input type="text" name="frase">
            <input type="submit" value="Buscar">
        </form>

        <?php
        if($resultados && mysqli_num_rows($resultados) > 0){
            ?><p>Las canciones que contienen la frase: "<?php echo $_POST['frase']?>" son:<p>
            <ul><?php
            
            while($fila = mysqli_fetch_array($resultados)){
                ?>
                <li><?php echo $fila['cancion'] ?></li>
                <?php
            }
            ?></ul><?php
        }
        else{
            ?><p>No hay canciones con la frase: "<?php echo $_POST['frase']?>"<p><?php
        }

    ?>
    </body>
</html>
<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "capitales";
    $query = "";
    $valido = true;


    if (!empty($_POST['accion'])){
        if ($_POST['accion'] == "eliminar"){
            
            if (!empty($_POST['id'])){
                $id = $_POST['id'];
                $query = "DELETE FROM ciudades WHERE id = '$id'";
            }
            else
                $valido = false;

        }
        else //no hay que eliminar
        {
            if (!empty($_POST['ciudad']) && !empty($_POST['pais']) && !empty($_POST['habitantes']) && !empty($_POST['superficie']) && !empty($_POST['metro'])){

                $ciudad = $_POST['ciudad'];
                $pais = $_POST['pais'];
                $cantHab = $_POST['habitantes'];
                $sup = $_POST['superficie'];
                $metro = 1;
                if ($_POST['metro'] == "No")
                    $metro = 0;
        
        
                if ($_POST['accion'] == "agregar"){
                    $query = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES ('$ciudad', '$pais', '$cantHab', '$sup', '$metro')";
                }
                else //hay que modificar
                {
                    if (!empty($_POST['id'])){
                        $id = $_POST['id'];
                        $query = "UPDATE ciudades SET ciudad = '$ciudad', pais = '$pais', habitantes = '$cantHab', superficie = '$sup', tieneMetro = '$metro' WHERE id = '$id'";
                    }
                    else
                        $valido = false;
                }
            }
            else
                $valido = false;
        }
    }
    else
        $valido = false;

    
    if ($valido == true){
        $cn = mysqli_connect($hostname, $username, $password, $dbname) or die();
        $resultados = mysqli_query($cn, $query);
        mysqli_close($cn);
        
        if ($resultados){
            header("Location: index.php");
        }
        else{
            echo '<script> alert("Error al ejecutar la consulta"); </script>';
        }

    }else{
        echo '<script> alert("Error al ejecutar la consulta"); </script>';
    }
?>
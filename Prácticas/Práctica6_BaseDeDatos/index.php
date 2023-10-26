<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Capitales del mundo</title>
        <link rel="stylesheet" href="styles.css?v=1" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <div id="contenedor">
            <h2>Capitales del mundo</h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Habitantes</th>
                    <th>Superficie</th>
                    <th>Tiene metro</th>
                </tr>

    <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "capitales";
        $cn = mysqli_connect($hostname, $username, $password, $dbname) or die();

        $query = "SELECT * FROM CIUDADES";
        $resultados = mysqli_query($cn, $query);

        while ($fila = mysqli_fetch_array($resultados)){
            echo "<tr id='$fila[0]' onclick='getId(this)'>";
            echo '<td>' . $fila[0] . '</td>';
            echo '<td>' . $fila[1] . '</td>';
            echo '<td>' . $fila[2] . '</td>';
            echo '<td>' . $fila[3] . '</td>';
            echo '<td>' . $fila[4] . '</td>';
            echo '<td>' . $fila[5] . '</td>';
            echo '</tr>';
        }
        mysqli_close($cn);
    ?>

            </table>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAnadir">Agregar nueva capital</button>
            <button class="btn btn-secondary" onclick="validarSeleccion(this)" id="btnModificar">Modificar capital</button>
            <button class="btn btn-danger" onclick="validarSeleccion(this)" id="btnEliminar">Eliminar capital</button>
            

            <!-- Modal añadir ciudad-->
            <div class="modal fade" id="modalAnadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir ciudad</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <form action="consultasDB.php" method="POST">
                            <input type="hidden" name="accion" value="agregar">
                            <div class="modal-body">
                                <div class="form-group">    
                                    <label>Nombre ciudad</label>
                                    <input type="text" name="ciudad" class="form-control" required>
                                </div>

                                <div class="form-group">    
                                    <label>País</label>
                                    <input type="text" name="pais" class="form-control" required>
                                </div>

                                <div class="form-group">    
                                    <label>Habitantes</label>
                                    <input type="number" name="habitantes" class="form-control" required>
                                </div>

                                <div class="form-group">    
                                    <label>Superficie</label>
                                    <input type="number" name="superficie" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>¿Tiene metro?</label>
                                    <select name="metro" class="form-control" required>
                                        <option>Sí</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar ciudad</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal eliminar ciudad-->
            <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar ciudad</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="consultasDB.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" id="idEliminar" name="id" value="0">
                            <div class="form-group">
                                <label>¿Está seguro que desea eliminar la ciudad seleccionada?</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Eliminar ciudad</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>


            <!-- Modal modificar ciudad-->
            <div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar ciudad</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form action="consultasDB.php" method="POST">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="hidden" id="idModificar" name="id" value="0">

                        <div class="modal-body">
                            <div class="form-group">    
                                <label>Nombre ciudad</label>
                                <input type="text" name="ciudad" class="form-control" required>
                            </div>

                            <div class="form-group">    
                                <label>País</label>
                                <input type="text" name="pais" class="form-control" required>
                            </div>

                            <div class="form-group">    
                                <label>Habitantes</label>
                                <input type="number" name="habitantes" class="form-control" required>
                            </div>

                            <div class="form-group">    
                                <label>Superficie</label>
                                <input type="number" name="superficie" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>¿Tiene metro?</label>
                                <select name="metro" class="form-control" required>
                                    <option>Sí</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-warning">Modificar ciudad</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        
        
            <script src="myscript.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        </div>
    </body>
</html>
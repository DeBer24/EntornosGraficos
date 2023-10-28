<!DOCTYPE html>
<html>
    <head>
        <title>Inicio</title>
    </head>
    <body>
        <form action="guardarSession.php" method="POST">
            <div>
                <label>Nombre de usuario</label>
                <input type="text" name="usuario">
            </div>
            <div style="margin-top:20px">
                <label>Contraseña</label>
                <input type="password" name="contrasena">
            </div>
            <div style="margin-top:20px">
                <input type="submit" value="Guardar">
            </div>
        </form>
    </body>
</html>
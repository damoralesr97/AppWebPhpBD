<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practicas/SistemaDeGestion1/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cambiar Contrasena</title>
    </head>
    <body>
        <?php
            $codigo = $_GET["codigo"];
        ?>
        <form id="formulario01" method="POST" action="../../controladores/admin/cambiar_contrasena.php">
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

            <label for="contrasenaActual">Contrasena Actual (*)</label>
            <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contrasena actual...">
            <br>

            <label for="contrasenaNueva">Contrasena Nueva (*)</label>
            <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contrasena nueva...">
            <br>

            <input type="submit" id="modificar" name="modificar" value="Modificar">
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar">
        </form>
    </body>
</html>
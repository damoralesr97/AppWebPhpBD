<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practicas/SistemaDeGestion1/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-*">
        <title>Eliminar datos de persona</title>
    </head>
    <body>
        <?php
            $codigo = $_GET["codigo"];
            $sql = "SELECT * FROM usuario WHERE usu_codigo=$codigo";

            include '../../../config/conexionBD.php';
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
        ?>
                    <form id="formulario01" method="POST" action="../../controladores/admin/eliminar.php">
                        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

                        <label for="cedula">Cedula (*)</label>
                        <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"];?>" disabled>
                        <br>
                        <label for="nombres">Nombres (*)</label>
                        <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];?>" disabled>
                        <br>
                        <label for="apellidos">Apellidos (*)</label>
                        <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];?>" disabled>
                        <br>
                        <label for="direccion">Direccion (*)</label>
                        <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];?>" disabled>
                        <br>
                        <label for="telefono">Telefono (*)</label>
                        <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"];?>" disabled>
                        <br>
                        <label for="fechaNacimiento">Fecha Nacimiento (*)</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"];?>" disabled>
                        <br>
                        <label for="correo">Correo Electronico (*)</label>
                        <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"];?>" disabled>
                        <br>
                        <input type="submit" id="eliminar" name="eliminar" value="Eliminar">
                        <input type="reset" id="cancelar" name="cancelar" value="Cancelar">
                    </form>
        <?php
                }
            }else{
                echo "<p>Ha ocurrido un error inesperado!!!</p>";
                echo "<p>".mysqli_error($conn)."</p>";
            }
            $conn->close();
        ?>            
    </body>
</html>
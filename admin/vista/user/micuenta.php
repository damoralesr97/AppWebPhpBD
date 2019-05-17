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
        <title>Mi Cuenta</title>
    </head>
    <body>
        <?php $codigo = $_GET['codigo']; ?>
        <nav>
            <ul>
                <li><a href="index.php?codigo=<?php echo $codigo ?>"">Inicio</a></li>
                <li><a>Nuevo Mensaje</a></li>
                <li><a>Mensajes Enviados</a></li>
                <li><a href="micuenta.php?codigo=<?php echo $codigo ?>">Mi cuenta</a></li>
                <li><a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <table border="1px">
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
                <th>Eliminar</th>
                <th>Modificar</th>
                <th>Cambiar contrasena</th>
            </tr>

            <?php
                include '../../../config/conexionBD.php';

                $sql = "SELECT * FROM usuario WHERE usu_codigo='$codigo'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if($row["usu_eliminado"]!='S'){
                            echo "<tr>";
                            echo "<td>" .$row["usu_cedula"]."</td>";
                            echo "<td>" .$row["usu_nombres"]."</td>";
                            echo "<td>" .$row["usu_apellidos"]."</td>";
                            echo "<td>" .$row["usu_direccion"]."</td>";
                            echo "<td>" .$row["usu_telefono"]."</td>";
                            echo "<td>" .$row["usu_correo"]."</td>";
                            echo "<td>" .$row["usu_fecha_nacimiento"]."</td>";
                            echo "<td><a href='eliminar.php?codigo=".$row['usu_codigo']."'>Eliminar</a></td>";
                            echo "<td><a href='modificar.php?codigo=".$row['usu_codigo']."'>Modificar</a></td>";
                            echo "<td><a href='cambiar_contrasena.php?codigo=".$row['usu_codigo']."'>Cambiar contrasena</a></td>";
                        }
                    }
                }else{
                    echo "<tr>";
                    echo "<td colspan='7'>No existen usuarios registrados en el sistema</td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>
        </table>
        <a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
    </body>
</html>
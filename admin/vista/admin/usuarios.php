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
        <title>Gestion de usuarios</title>
    </head>
    <body>
        <?php
            $codigo_admin = $_GET["codigo_admin"];
        ?>
    <nav>
            <ul>
                <li><a href="index.php?codigo_admin=<?php echo $codigo_admin ?>">Inicio</a></li>
                <li><a href="usuarios.php?codigo_admin=<?php echo $codigo_admin ?>">Usuarios</a></li>
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

                $sql = "SELECT * FROM usuario";
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
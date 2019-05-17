<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practicas/SistemaDeGestion1/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <?php
        $codigo_admin = $_GET['codigo_admin'];
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Gestion de Mensajes Electronicos</title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php?codigo_admin=<?php echo $codigo_admin ?>">Inicio</a></li>
                <li><a href="usuarios.php?codigo_admin=<?php echo $codigo_admin ?>">Usuarios</a></li>
            </ul>
        </nav>
        <aside>
            <p>Aqui va la foto</p>
            <p>Aqui va el nombre del usuario</p>
        </aside>
        <section>
            <h3>Mensajes Electronicos</h3>
            <form>
                <table border="1px">
                    <tr>
                        <th>Fecha</th>
                        <th>Remite</th>
                        <th>Destinatario</th>
                        <th>Asunto</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                        include '../../../config/conexionBD.php';


                        $sql = "SELECT * FROM correo";
                        $result = $conn->query($sql);
                        

                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                if($row["cor_eliminado"]!='S'){
                                    echo "<tr>";
                                    echo "<td>" .$row["cor_fecha_envio"]."</td>";
                                    echo "<td>".buscarCorreo($row["cor_usu_remite"])."</td>";
                                    echo "<td>".buscarCorreo($row["cor_usu_destino"])."</td>";
                                    echo "<td>" .$row["cor_asunto"]."</td>";
                                    echo "<td><a href='eliminar_mensaje.php?codigo_mensaje=".$row['cor_codigo']."&codigo_admin=".$codigo_admin."'>Eliminar</a></td>";
                                }
                            }
                        }else{
                            echo "<td colspan=4>No hay mensajes electronicos</td>";
                        }

                        function buscarCorreo($codigoCorreo){
                            include '../../../config/conexionBD.php';
                            $sql1 = "SELECT usu_correo FROM usuario WHERE usu_codigo='$codigoCorreo'";
                            $result = $conn->query($sql1);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $direccionCorreo=$row["usu_correo"];
                                }
                            }
                            return $direccionCorreo;
                        }

                        

                        $conn->close();
                    ?>
                </table>
            </form>
        </section>
        <footer>
            <p>Copyright</p>
            <p>David Andres Morales Rivera</p>
            <p>2019</p>
        </footer>
    </body>
</html>
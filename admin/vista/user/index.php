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
        <title>Sistema de Gestion de Mensajes Electronicos</title>
    </head>
    <body>
        <?php
            $codigo = $_GET['codigo'];
        ?>
        <nav>
            <ul>
                <li><a href="index.php?codigo=<?php echo $codigo ?>"">Inicio</a></li>
                <li><a href="nuevo_mensaje.php?codigo=<?php echo $codigo ?>">Nuevo Mensaje</a></li>
                <li><a>Mensajes Enviados</a></li>
                <li><a href="micuenta.php?codigo=<?php echo $codigo ?>">Mi cuenta</a></li>
                <li><a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <aside>
            <p>Aqui va la foto</p>
            <p>Aqui va el nombre del usuario</p>
        </aside>
        <section>
            <h3>Mensajes Recibidos</h3>
            <form>

            </form>
        </section>
        <footer>
            <p>Copyright</p>
            <p>David Andres Morales Rivera</p>
            <p>2019</p>
        </footer>
    </body>
</html>
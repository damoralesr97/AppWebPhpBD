<?php

    $correo = $_GET['correo'];


    include "conexionBD.php";

    echo $sql = "SELECT * FROM correo WHERE usu_codigo=".buscarCodigoCorreo($correo);
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row["cor_remite"]."</td>";
            echo "<td>".$row["cor_asunto"]."</td>";
            echo "<td>".$row["cor_mensaje"]."</td>";
            echo "<td>".$row["cor_fecha_envio"]."</td>";
        }
        
    }else{
        echo "<td>No hay ningun mensaje elctronico de ".$correo."</td>";
    }


    function buscarCodigoCorreo($correo){
        include 'conexionBD.php';
        $sql1 = "SELECT usu_codigo FROM usuario WHERE usu_correo='$correo'";
        $result = $conn->query($sql1);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $codigoCorreo=$row["usu_codigo"];
            }
        }
        return $codigoCorreo;
    }

?>
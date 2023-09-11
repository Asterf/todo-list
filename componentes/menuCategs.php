<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include "config.php";
    $correo = $_SESSION["correo"];
    $query="SELECT  * FROM categorias WHERE correo='$correo'";
    $result=mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) - 1){
        $i = 1;
        while ($row=mysqli_fetch_assoc($result)){
            $categ = $row["nombreCategoria"];
            if(strtolower($categ) != "sin clasificar")
            {
                $email = $row["correo"];
                echo '
                    <span>'.$categ.'</span>
                    <input type="button" value="Eliminar" onclick="eliminarCatIndiv(\''.$categ.'\');">
                    <input type="button" value="Modificar" onclick="modificarCatIndiv(\''.$categ.'\');">
                    <br> <br>
                ';

            }
            $i++;
        } 
    }
    else 
        echo '<p>Aún no has creado categorías</p>';
?>

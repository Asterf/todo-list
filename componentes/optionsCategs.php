<?php
    include "config.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $correo = $_SESSION["correo"];
    $query="SELECT  * FROM categorias WHERE correo='$correo'";
    $result=mysqli_query($conexion, $query);
    echo '<span>Categoría: </span>';
    echo '<select id="categTarea" name="opciones">';
    while ($row=mysqli_fetch_array($result)){
        echo '<option value="'.$row['nombreCategoria'].'">'.$row['nombreCategoria'].'</option>';
    } 
    echo '</select>';
?>
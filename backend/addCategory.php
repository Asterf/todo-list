<?php 
//Recoger datos
$newCateg = $_POST["categ"];
session_start();
$correoUser = $_SESSION["correo"];
include "../config.php";
//Validar existencia
if (strlen($newCateg) != 0){
    //Validar que aún no se tenga la categoría ingresada
    $queryExistenceCategory = "SELECT * FROM categorias WHERE nombreCategoria='$newCateg' and correo='$correoUser'";
    $resultadoExistenceCategory = mysqli_query($conexion, $queryExistenceCategory);
    if(!mysqli_num_rows($resultadoExistenceCategory)){
        //Agregar categoría
        $queryAddCategory = "INSERT INTO categorias VALUES('$correoUser','$newCateg')";
        mysqli_query($conexion, $queryAddCategory);
        //---------------------Volver a dibujar caegorias---------------------
        $query="SELECT  * FROM categorias WHERE correo='$correoUser'";
        $result=mysqli_query($conexion, $query);      
        //Draw
        //----------------------------------------------------------------------------------------------
        echo '
            <span>Categoría: </span>
            <select name="categorias" id="categTarea">
        ';
        while ($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['nombreCategoria'].'">'.$row['nombreCategoria'].'</option>';
        } 
        echo '</select>';
        //--------------------------------------------------------------------------------------------------
    }
}
?>
<?php 
//Conectar con la base de datos
include "../config.php";
//Recibir datos
$nameCat = $_POST["name"];
$newNameCat = $_POST["newName"];
//Recuperar correo de usuario
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$correo_user = $_SESSION["correo"];
//Validar existencia de nuevo nombre
if (strlen($newNameCat) != 0){
    //Validar que aún no se tenga la categoría ingresada
    $queryExistenceCategory = "SELECT * FROM categorias WHERE nombreCategoria='$newNameCat' and correo='$correo_user'";
    $resultadoExistenceCategory = mysqli_query($conexion, $queryExistenceCategory);
    if(!mysqli_num_rows($resultadoExistenceCategory)){
        //Crear consulta de modificación 
        $queryUpdateCat = "UPDATE categorias SET nombreCategoria='$newNameCat' WHERE nombreCategoria='$nameCat' AND correo='$correo_user'";
        //Ejecutar consulta
        mysqli_query($conexion, $queryUpdateCat);
        //Categoría eliminada
        echo 'Modificada';
    }
    else
        echo "Ya existe";
}

?>
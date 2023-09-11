<?php 
//---------------------Eliminar una categoría---------------------
//Conectar con la base de datos
include "../config.php";
//Recibir data del frontend
$nombre_categoria = $_POST["nameCat"];
//Recuperar correo de usuario
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$correo = $_SESSION["correo"];
//Validar existencia
if (strlen($nombre_categoria) != 0){
    //Crear consulta para eliminar categoría
    $queryDeleteCat = "DELETE FROM categorias WHERE correo='$correo' and nombreCategoria='$nombre_categoria'";
    //Ejecutar consulta
    mysqli_query($conexion, $queryDeleteCat);
    //Categoría eliminada
    echo 'eliminada';
}
?>
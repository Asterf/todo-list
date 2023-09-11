<?php 
//Recoger datos
$categoria = $_POST["category"];
$tarea = $_POST["tarea"];
//Obtener correo
session_start();
$correoUsuario = $_SESSION["correo"];
//Insertar nueva tarea
include "../config.php";
if(strlen($tarea) != 0){
    $queryInsertTask = "INSERT INTO tareas(correo, nombreCategoria, nombreTarea) VALUES('$correoUsuario', '$categoria', '$tarea')";
    mysqli_query($conexion, $queryInsertTask);
}
//Volver a dibujar tareas disponibles
$queryObtenerTareas = "SELECT * FROM tareas WHERE correo='$correoUsuario'";
$resultadoObtenerTareas = mysqli_query($conexion, $queryObtenerTareas);
if(mysqli_num_rows($resultadoObtenerTareas)){
    while($tarea = mysqli_fetch_assoc($resultadoObtenerTareas)){
        $categ = $tarea["nombreCategoria"];
        $task = $tarea["nombreTarea"];
        $idTask = $tarea["idTarea"];
        echo '
            <div class="tareaIndividual">
                <span>'.$categ.':  '.$task.'</span>
                <input type="button" value="Eliminar" onclick="deleteTask('.$idTask.');">
            </div>
            <br>
        ';
    }
}
else{
    echo '<p>No tienes tareas pendientes</p>';
}
?>
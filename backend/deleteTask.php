<?php 
include "../config.php";
session_start();
//Recoger datos
$idTask = $_POST["id"];
//Eliminar tarea
$queryDeleteTask = "DELETE FROM tareas WHERE idTarea='$idTask'";
mysqli_query($conexion, $queryDeleteTask);
//Volver a dibujar tareas
$correoUsuario = $_SESSION["correo"];
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
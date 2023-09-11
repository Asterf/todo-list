<?php
session_start();
if (is_null($_SESSION["correo"]))
    header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link css -->
    <link rel="stylesheet" type="text/css" href="styles/style_main.css">
    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Reload components -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>ToDoList</title>
</head>
<body>
    <div id="globalContainer">
        <h2>Bienvenido a tu lista de tareas</h1>
        <div id="ingresarTarea">
            <h3>Ingresar una nueva tarea</h3>
            <form action="">         
                <!-- Contenido: Opciones de categoría -->
                <div id="categoryOptions">
                    <?php
                        include("componentes/optionsCategs.php") 
                    ?>
                </div>
                <br>
                <label for="">Tarea: </label>
                <input type="text" id="newTarea">
                <br> <br>
                <button id="btnOpenModifCateg">Modificar categorías</button>
                <input type="button" value="Agregar tarea" onclick="addNewTask();">
            </form>
        </div>
        <dialog id="modificarCategorias">
            <h3>Categorías Actuales</h3>
            <div id="categoriaIndividual">
                <!-- Contenido: menú de categorías -->
                <?php 
                    include("componentes/menuCategs.php")
                ?>
            </div>
            <button id="btnOpenAddCateg">Crear nueva</button>
        </dialog>
        <!-- DIALOG: modificar categoría individual -->
        <dialog id="modalModifCategIndiv">
            <h4>Modificar nombre de categoría</h4>
            <input id= "inptModfCatIndv" type="text">
            <br>
            <button id="updtCategIdiv">Cambiar</button>
        </dialog>
        <dialog id="modalAgregarCateg">
            <label for="">Nombre de nueva categoría: </label>
            <input type="text" id="newCategory">
            <br> <br>
            <input type="button" value="Agregar" onclick="addCategory();">
            <button id="btnCloseAddCateg">Cancelar</button>
        </dialog>
        <div id="tareasPendientes">
            <div class="tareas">
                <h3>Tareas pendientes</h3>
                <div id="tareasUser">
                    <?php 
                        include "config.php";
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
                </div>
            </div>
        </div>
    </div>
    <form action="close.php">
        <br> <br>
        <button>Cerrar Sesión</button>
    </form>
    <!-- CARGAR COMPONENTES -->
    <script src="scripts/main.js"></script>
</body>
</html>
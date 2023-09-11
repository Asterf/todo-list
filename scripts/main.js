//Abrir ventana de modificar categorías
//Obtener ventana
const vtnModificarCateg = document.querySelector("#modificarCategorias")
//Obtener botones
const btnOpenModifCateg = document.querySelector("#btnOpenModifCateg")
// const btnCloseModifCateg = document.querySelector("#btnCloseModifCateg")
//Agregar eventos
btnOpenModifCateg.addEventListener("click", (e) =>{
    e.preventDefault()
    vtnModificarCateg.showModal()
})

//Abrir ventana de agregar categoría
//Obtener ventana
const vtnAddCateg = document.querySelector("#modalAgregarCateg")
//Obtener botones
const btnOpenAddCateg = document.querySelector("#btnOpenAddCateg")
const btnCloseAddCateg = document.querySelector("#btnCloseAddCateg")
//Agregar eventos
btnOpenAddCateg.addEventListener("click", (e) =>{
    e.preventDefault()
    vtnAddCateg.showModal()
})
btnCloseAddCateg.addEventListener("click", (e) =>{
    e.preventDefault()
    vtnAddCateg.close()
})

//Funcion para agregar una nueva tarea
function addNewTask(){
    //Obtener datos
    var categoriaNewTask = document.getElementById("categTarea").value
    var newTask = document.getElementById("newTarea").value
    //Preparar data
    var parametros ={
        "category": categoriaNewTask,
        "tarea": newTask,
    }
    //Llamada a ajax
    $.ajax({
        data: parametros,
        url: 'backend/backendAddTask.php',
        type: 'POST',
        success: function(retorno){
            $("#newTarea").val("");
            $('#tareasUser').html(retorno);
        }
    });
}
//Función para eliminar una tarea
function deleteTask(idTarea){
    var datos = {
        "id": idTarea
    }
    //Llamado a ajax
    $.ajax({
        data: datos,
        url: 'backend/deleteTask.php',
        type: 'POST',
        success: function(retorno){
            $('#tareasUser').html(retorno);
        }
    });
}
//Función para añadir una nueva categoría
function addCategory(){
    //Recoger datos
    var newCateg = document.getElementById("newCategory").value
    //Preparar datos
    var parametros = {
        "categ": newCateg
    }
    //Llamado a ajax
    $.ajax({
        data: parametros,
        url: 'backend/addCategory.php',
        type: 'POST',
        success: function(retorno){
            vtnAddCateg.close();
            // vtnModificarCateg.close();
            $("#newCategory").val("");
            // $('#categoryOptions').html(retorno);
            $('#categoryOptions').load('componentes/optionsCategs.php');
            $('#categoriaIndividual').load('componentes/menuCategs.php');
        }
    });
}
//Función para modificar una categoría
// const btnOpen = document.getElementsByClassName("btnOpenModifCatIndiv")

function eliminarCatIndiv(catName){
    //Preaparar datos para modificar
    parametros = {
        "nameCat": catName
    }
    //Llamado a ajax
    $.ajax({
        data:parametros,
        url:"backend/deleteCategory.php",
        type:"POST",
        success: function(retorno){
            // console.log(retorno)
            $('#categoryOptions').load('componentes/optionsCategs.php');
            $('#categoriaIndividual').load('componentes/menuCategs.php');
        }
    })
}

function modificarCatIndiv(catName){
    // const modalModifCatIndiv = document.getElementById("modalModifCategIndiv")
    vtnModificarCateg.close()     
    Swal.fire({
        title: 'Cambiar nombre de categoría',
        input: 'text',
        inputValue: catName,
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Cambiar',
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
            newValue = result.value
            $.ajax({
                data:{
                    "name": catName,
                    "newName": newValue
                },
                url: "backend/backendModifCat.php",
                type: "POST",
                success: function(retorno){
                    console.log(retorno)
                    //Actualizar componentes
                    $('#categoryOptions').load('componentes/optionsCategs.php')
                    $('#categoriaIndividual').load('componentes/menuCategs.php')
                    vtnModificarCateg.showModal()
                }

            })
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
            vtnModificarCateg.showModal()
        }
      })
}
// Abrir modal de Registrarse
//Obtener modal
var mdlSignUp = document.querySelector("#modalSignUp")
//Obtener botones
var btnOpenSignUp = document.querySelector("#btnOpenSignUp")
var btnCloseSignUp = document.querySelector("#btnCloseSignUp")
// Añadir eventos
btnOpenSignUp.addEventListener("click", (e) =>{
    e.preventDefault();
    mdlSignUp.showModal();
})
btnCloseSignUp.addEventListener("click", (e) =>{
    e.preventDefault();
    $("#correoSu").val("")
    $("#passSu").val("")
    $("#passConfSu").val("")
    mdlSignUp.close()
})
//Creación de alerta
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

//Función de validación para el login
function validarLogin(){
    //Obtener elementos
    var correo = document.getElementById("correoLogin").value 
    var password = document.getElementById("passLogin").value 
    //Preparar data
    var parametros = {
        "usuario": correo,
        "password": password
    }
    //Llamada a ajax
    $.ajax({
        data: parametros,
        url: 'backend/backendLogin.php',
        type: 'POST',
        success: function(mensaje_mostrar){
            // window.location.href("main.php");
            if(mensaje_mostrar == "goMain"){
                window.location.replace("main.php")
            }
            else{
                Toast.fire({
                    icon: 'error',
                    title: 'Error',
                    text: mensaje_mostrar,
                    color: '#f0716a',                       
                })
            }
        }
    });
}
//Función para validar el registro de una nueva cuenta
function registrarse(){
    //Obtener datos
    var correoN = document.getElementById("correoSu").value
    var passN = document.getElementById("passSu").value
    var passConfN = document.getElementById("passConfSu").value
    console.log("pass: " + passN)
    //Preparar data
    var paramets ={
        "correoN": correoN,
        "passwordN": passN,
        "passwordConf": passConfN 
    }
    //Llamado a ajax
    $.ajax({
        data: paramets,
        url: 'backend/backSingUp.php',
        type: 'POST',
        success: function(message){
            // window.location.href("main.php");
            if(message == "cuentaCreada"){
                Toast.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: "La cuenta fue registrada con éxito",
                    color: '#f0716a',                       
                })
                //Limpiar datos
                $("#correoSu").val("")
                $("#passSu").val("")
                $("#passConfSu").val("")
                //Cerrar modal
                mdlSignUp.close()

            }
            else if (message == "correoExistente"){
                Toast.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "El correo ya tiene una cuenta",
                    color: '#f0716a',                       
                })
            }
            else{
                Toast.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message,
                    color: '#f0716a',                       
                })
            }
        }
    });
}
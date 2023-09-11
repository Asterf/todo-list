<?php 
//Recibir datos
$user = $_POST["usuario"];
$password = $_POST["password"];
//Verificar existencia de ambos
if (strlen($user) == 0){
    echo "Ingrese un correo";
}
else if(strlen($password) == 0){
    echo "Ingrese su contraseña";
}
//Verificar datos correctos
else{
    //Verificar correo correo
    include "../config.php";
    //Crear consulta
    $queryBuscarCorreo = "SELECT * FROM usuarios WHERE correo='$user'";
    $resultadoBuscarCorreo = mysqli_query($conexion, $queryBuscarCorreo);
    if(mysqli_num_rows($resultadoBuscarCorreo)){
        //Vefiicar contraseña
        //Crear consulta
        $queryBuscarPass = "SELECT * FROM usuarios WHERE correo='$user' AND contrasenia='$password'";
        $resultadoBuscarPass = mysqli_query($conexion, $queryBuscarPass);
        if(mysqli_num_rows($resultadoBuscarPass)){
            //Guardar datos
            session_start();
            $_SESSION["correo"] = $user;
            echo "goMain";
        }
        else 
            echo "La contraseña es incorrecta";
    }
    else 
        echo "El correo no está registrado";
}

?>
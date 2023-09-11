<?php 
//Recoger datos
$user = $_POST["correoN"];
$pass = $_POST["passwordN"];
$pass2 = $_POST["passwordConf"];
//Validar existencia de datos
if(strlen($user) == 0)
    echo "Ingresar un correo";
else if(strlen($pass) == 0)
    echo "Ingresar una contraseña";
else if(strlen($pass2) == 0)
    echo "Confirme su contraseña";
//Validar datos
else{
    //Validar que el correo no exista
    include "../config.php";
    $queryBuscarCorreo = "SELECT * FROM usuarios WHERE correo = '$user'";
    $resultadoBuscarCorreo = mysqli_query($conexion, $queryBuscarCorreo);
    if (mysqli_num_rows($resultadoBuscarCorreo))
        echo "correoExistente";
    else{
        //Validar contraseñas
        if($pass == $pass2){
            //Insertar nueva cuenta
            $queryInsertAccount = "INSERT INTO usuarios VALUES('$user','$pass')";
            mysqli_query($conexion, $queryInsertAccount);
            //nsertar categoria por defecto
            $queryInsertCategory = "INSERT INTO categorias VALUES('$user','Sin clasificar')";
            mysqli_query($conexion, $queryInsertCategory);
            echo "cuentaCreada";
        }
        else 
            echo "Las contraseñas no coinciden";
    }
}
?>
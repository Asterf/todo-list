<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Links Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <!-- Css -->
    <link rel="stylesheet" type="text/css" href="styles/style_index.css">
    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>ToDoList</title>
</head>
<body>
    <div class="formulario">
        <form action="">
            <label for="">Correo electrónico</label>
            <br>
            <input type="email" id="correoLogin">
            <br> <br>
            <label for="">Contraseña</label>
            <br>
            <input type="password" id="passLogin">
            <br> <br>
            <input type="button" value="Ingresar" onclick="validarLogin();">
            <button id="btnOpenSignUp">Registrarse</button>
            <!-- <button id="btnIngresar" onclick="validarLogin();">Ingresar</button> -->
        </form>
    </div>
        <dialog id="modalSignUp">
            <div id="formSignUp">
                <form action="">
                    <label for="">Correo electrónico</label> <br>
                    <input type="email" id="correoSu"> <br> <br>
                    <label for="">Contraseña</label> <br>
                    <input type="password" id="passSu"> <br> <br>
                    <label for="">Confirmar contraseña</label> <br>
                    <input type="password" id="passConfSu"> <br> <br>
                    <input type="button" value="Registrarse" onclick="registrarse();">
                    <!-- <button>Registrarse</button> -->
                    <button id="btnCloseSignUp">Cancelar</button>
                </form>
            </div>
        </dialog>
    <script src="scripts/login.js"></script>
</body>
</html>
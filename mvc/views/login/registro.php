<?php

require_once 'C:/xampp/htdocs/proyecto/mvc/config/conexion.php';
require_once 'C:/xampp/htdocs/proyecto/mvc/libs/controller.php';
require_once 'C:/xampp/htdocs/proyecto/mvc/libs/model.php';
require_once 'C:/xampp/htdocs/proyecto/mvc/libs/views.php';
require_once 'C:/xampp/htdocs/proyecto/mvc/libs/app.php';

$app = new App();

require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/controlador_usuarios.php';
$errores['log'] = '';
//Comprobación de si el usuario tiene la sesión iniciada
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['rol'] == 1) {
        header('Content-Type: text/html; charset=utf-8');
        header('location:../admin/index.php');
    } else if ($_SESSION['usuario']['rol'] == 2) {
        header('Content-Type: text/html; charset=utf-8');
        header('location:../users/index.php');
    }
}


$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        //Confirmación de definicion de las variables 
        if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
            $nuevo_usuario = new Controlador_usuarios();

            $resultado = $nuevo_usuario->nuevo_usuario($_POST["name"], $_POST["email"], $_POST["password"]);
            if ($resultado) {
                $mensaje = "Usuario <span class='fs-5 fw-semibold text-primary'>" . $_POST["name"] . "</span> registrado correctamente.";
            } else {
                $mensaje = "La cuenta de correo <span class='fs-5 fw-semibold text-primary'>" . $_POST["email"] . "</span> ya se encuentra registrada.";
            }
        }
    }
}

echo '
<!DOCTYPE html>
<html lang="es">';

require "../layout/head.php";
echo '
<body class="d-flex flex-column justify-content-between ">
    <header class="d-md-none container-xxl  d-flex justify-content-around align-items-center">
        <h1 class="text-success title title__h1 align-self-start mt-1 fw-bold ">Bienvenido</h1>
    </header>

    <header class="d-none d-md-flex justify-content-between container-fluid d-flex w-100 border-bottom">
        <div class="row w-50">
            <a href="../../index.php"><img class="col-1 p-0 m-0 header__logo" src="http://localhost/proyecto/mvc/resources/img/logo_mini.svg" alt="logo en miniatura"></a>
        </div>
        <div class="me-3 w-25 row d-flex flex-column justify-content-center align-items-center ">
            <a class=" col-sm-6 col-md-9 col-lg-7 col-xl-6  align-self-end text-decoration-none"href="./record.php"><button class=" fs-5 btn btn-secondary text-white border p-2  button button__index">Crear cuenta</button></a>
        </div>        
    </header>
    <main class="container-xxl d-flex  flex-column mb-5 align-items-center">
        <figure class="col-sm-8 col-md-6 col-lg-5 d-flex justify-content-center  m-0 p-0">
            <img class=" w-100 main__logo" src="http://localhost/proyecto/mvc/resources/img/logo.svg" alt="Logotipo de la aplicación web">
        </figure>
        <form method="POST" class="row d-flex flex-column justify-content-center align-items-center fw-semibold form w-100">
            <div class="mb-3 col-sm-9 col-md-9 col-lg-7 col-xl-6">
                <label for="name" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
                <input type="text" name="name" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
            </div>
            <div class="mb-3 col-sm-9 col-md-9 col-lg-7 col-xl-6">
                <label for="email" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                <input type="email" name="email" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
            </div>
            <div class="mb-3 col-sm-9 col-md-9 col-lg-7 col-xl-6">
                <label for="password" class="form-label text-muted fs-5 fw-semibold" >Contraseña</label>
                <input type="password" name="password" class=" form-control fs-5  p-2" id="exampleInputPassword1" placeholder="Contraseña">
            </div>';
        if ($mensaje) {
            echo '
            <div class="m-0 mb-1 d-flex justify-content-center align-items-center">
                <p class="m-0 text-center text-secondary fs-5">' . $mensaje . '</p>
            </div>';
        }
        echo '
            <button type="submit" class="mt-2 btn btn-secondary text-white border  p-1 fs-5  col-2 ">Registrar</button>
            <p class="text-center mt-3 m-0 mb-3"><a class="fw-bold fs-5 text-success text-decoration-none" href="../../index.php">Volver atras</a></p>
        </form>
    </main>';
require "../layout/footer.php";
echo '
</body>

</html>';

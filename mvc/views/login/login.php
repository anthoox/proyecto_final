<?php
require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/controller.php';


if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['rol'] == 1) {
        header('Content-Type: text/html; charset=utf-8');
        header('location:../admin/index.php');
    } else if ($_SESSION['user']['rol'] == 2) {
        header('Content-Type: text/html; charset=utf-8');
        header('location:../users/index.php');
    }
}

//Eliminar los datos de sesión
unset($_SESSION['user']['id_user']);
unset($_SESSION['user']['email']);
unset($_SESSION['user']['password']);
unset($_SESSION['user']['rol']);
unset($_SESSION['error_message']);

$_SESSION['error_message'] = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $validator = new LoginController();
            $result = $validator->startSession($_POST["email"], $_POST["password"]);
            if (!$result) {
                $_SESSION['error_message']['log'] = "Usuario o contraseña incorrectos";
            } else {
                session_start();
                $_SESSION['user']['id_user'] = $result['id_user'];
                $_SESSION['user']['name'] = $result['name'];
                $_SESSION['user']['password'] = $result['password'];
                $_SESSION['user']['email'] = $result['email'];
                $_SESSION['user']['rol'] = $result['rol'];
                $_SESSION['user']['registration_date'] = $result['registration_date'];
                $_SESSION['user']['photo'] = $result['photo'];
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link Bootstrap compilado -->
    <link rel="stylesheet" href="http://localhost/proyecto/mvc/resources/css/bootstrap.css">
    <!-- Iconos de iconos8 -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="http://localhost/proyecto/mvc/resources/css/style.css">
</head>

<body class="d-flex flex-column justify-content-between ">
    <header class="d-md-none container-xxl  d-flex justify-content-around align-items-center mt-2">
        <h1 class="text-success title title__h1 align-self-start mt-1 fw-bold ">Bienvenido</h1>
    </header>

    <header class="d-none d-md-flex justify-content-between container-fluid d-flex w-100 border-bottom">
        <div class="row w-50">
            <a href="../../index.php"><img class="col-1 p-0 m-0 header__logo"
                    src="http://localhost/proyecto/mvc/resources/img/logo_mini.svg" alt="logo en miniatura"></a>
        </div>
        <div class="me-3 w-25 row d-flex flex-column justify-content-center align-items-center ">
            <a class=" col-sm-6 col-md-9 col-lg-7 col-xl-6  align-self-end text-decoration-none"
                href="./record.php"><button
                    class=" fs-5 btn btn-secondary text-white border p-2  button button__index">Crear
                    cuenta</button></a>
        </div>
    </header>

    <main class="container-xxl d-flex flex-column align-items-center">
        <figure class="col-sm-8 col-md-6 col-lg-5 d-flex justify-content-center m-0 p-0">
            <img class=" w-100 main__logo" src="http://localhost/proyecto/mvc/resources/img/logo.svg"
                alt="Logotipo de la aplicación web">
        </figure>
        <form method="POST" class="row d-flex flex-column justify-content-center align-items-center fw-semibold w-100">
            <div class="mb-3 col-sm-9 col-md-9 col-lg-7 col-xl-6">
                <label for="email" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                <input type="email" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com" name="email">
            </div>
            <div class="mb-3 col-sm-9 col-md-9 col-lg-7 col-xl-6">
                <label for="password" class="form-label text-muted fs-5 fw-semibold">Contraseña</label>
                <input type="password" class=" form-control fs-5  p-2" id="exampleInputPassword1"
                    placeholder="Contraseña" name="password">
            </div>
            <?php
            if ($_SESSION['error_message']) {
                echo '<div class="m-0 mb-1 d-flex justify-content-center align-items-center" id="pruebax">
                    <p class="m-0 text-center fw-bold fs-5 text-secondary ">' . $_SESSION['error_message']['log'] . '</p>
                </div>';
            }
            ?>

            <p class="text-center m-0 mb-3"><a class="fw-bold fs-5 text-success text-decoration-none"
                    href="./recovery.php">¿Olvidaste la contraseña?</a></p>

            <button type="submit" class="btn btn-primary text-white border p-1 fs-5 col-2">Entrar</button>
            <p class="text-center mt-3"><a class="fw-bold fs-5 text-success text-decoration-none"
                    href="../../index.php">Volver</a></p>

        </form>
    </main>
    <?php
    //Carga del fichero footer.php
    require "../layout/footer.php";

    ?>
</body>


</html>
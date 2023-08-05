<?php
require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/controlador_usuarios.php';
$errores['error']['log'] = '';

if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['rol'] == 1) {
        header('Content-Type: text/html; charset=utf-8');
        header('location:../admin/index.php');
    } else if ($_SESSION['usuario']['rol'] == 2) {
        header('Content-Type: text/html; charset=utf-8');
        header('location:../users/index.php');
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST)) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $datos_sesion = new controlador_usuarios();
            $correo = $datos_sesion ->limpiar_correo($_POST['email']);
            $password = $datos_sesion->limpiar_password($_POST['password']);
            $resultado = $datos_sesion->verificar_usuario($correo,$password);
            echo $resultado;

            if ($resultado) {
                session_start();
                $_SESSION['usuario']['id_user'] = $result['id_user'];
                $_SESSION['usuario']['name'] = $result['name'];
                $_SESSION['usuario']['password'] = $result['password'];
                $_SESSION['usuario']['email'] = $result['email'];
                $_SESSION['usuario']['rol'] = $result['rol'];
                $_SESSION['usuario']['registration_date'] = $result['registration_date'];
                $_SESSION['usuario']['photo'] = $result['photo'];
            } else {
                $errores['error']['log'] = "Usuario o contraseña incorrectos";                
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<?php
    require "../layout/head.php";
?>


<body class="d-flex flex-column justify-content-between ">
    <header class="d-md-none container-xxl  d-flex justify-content-around align-items-center mt-2">
        <h1 class="text-success title title__h1 align-self-start mt-1 fw-bold ">Bienvenidos</h1>
    </header>

    <header class="d-none d-md-flex justify-content-between container-fluid d-flex w-100 border-bottom">
        <div class="row w-50">
            <a href="../../index.php"><img class="col-1 p-0 m-0 header__logo"
                    src="http://localhost/proyecto/mvc/resources/img/logo_mini.svg" alt="logo en miniatura"></a>
        </div>
        <div class="me-3 w-25 row d-flex flex-column justify-content-center align-items-center ">
            <a class=" col-sm-6 col-md-9 col-lg-7 col-xl-6  align-self-end text-decoration-none"
                href="./record.php"><button class=" fs-5 btn btn-secondary text-white border p-2  button button__index">Crear cuenta</button></a>
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
   
            if ($errores['error']['log']) {
                echo '<div class="m-0 mb-1 d-flex justify-content-center align-items-center" id="pruebax">
                    <p class="m-0 text-center fw-bold fs-5 text-secondary ">' . $errores['error']['log'] . '</p>
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
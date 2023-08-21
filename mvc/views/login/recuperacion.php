<?php
require_once 'C:/xampp/htdocs/proyecto/mvc/config/db.php';
require_once 'C:/xampp/htdocs/proyecto/mvc/libs/controller.php';
require_once 'C:/xampp/htdocs/proyecto/mvc/libs/model.php';
require_once 'C:/xampp/htdocs/proyecto/mvc/libs/views.php';
// require_once 'C:/xampp/htdocs/proyecto/mvc/libs/app.php';
?>
<!DOCTYPE html>
<html lang="es">

<?php
require "../layout/head.php";

?>

<body class="d-flex flex-column justify-content-between ">
    <header class="d-md-none container-xxl  d-flex justify-content-around align-items-center">
        <h1 class="text-success title title__h1 align-self-start mt-1 fw-bold ">Bienvenido</h1>
    </header>

    <header class="d-none d-md-flex justify-content-between container-fluid d-flex w-100 border-bottom">
        <div class="row w-50">
            <a href="<?php echo constant('URL')?>index.php"><img class="col-1 p-0 m-0 header__logo"
                    src="http://localhost/proyecto/mvc/resources/img/logo_mini.svg" alt="logo en miniatura"></a>
        </div>
        <div class="me-3 w-25 row d-flex flex-column justify-content-center align-items-center ">
            <a class=" col-sm-6 col-md-9 col-lg-7 col-xl-6  align-self-end text-decoration-none"
                href="<?php echo constant('URL')?>views/login/registro.php"><button
                    class=" fs-5 btn btn-secondary text-white border p-2  button button__index">Crear
                    cuenta</button></a>
        </div>
    </header>
    <main class="container-xxl d-flex flex-column align-items-center">
        <figure class="col-sm-8 col-md-6 col-lg-5 d-flex justify-content-center  m-0 p-0">
            <img class=" w-100 main__logo" src="http://localhost/proyecto/mvc/resources/img/logo.svg"
                alt="Logotipo de la aplicación web">
        </figure>
        <form class="row d-flex flex-column justify-content-center align-items-center fw-semibold form w-100">

            <div class="mb-3 col-sm-9 col-md-9 col-lg-7 col-xl-6">
                <label for="exampleInputEmail1"
                    class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                <input type="email" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
            </div>

            <button type="submit" class="mt-2 btn btn-primary text-white border  p-1 fs-5 col-2">Enviar</button>
            <p class="text-center m-0 mt-3"><a class="fw-bold fs-5 text-success text-decoration-none"
                    href="<?php echo constant('URL')?>views/login/login.php">Volver</a></p>
        </form>
    </main>
    <?php
    //Carga del fichero footer.php
    require "../layout/footer.php";
    ?>
</body>

</html>
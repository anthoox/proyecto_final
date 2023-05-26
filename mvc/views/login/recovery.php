<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación</title>
    <!-- Link Bootstrap compilado -->
    <link rel="stylesheet" href="http://localhost/proyecto/mvc/resources/css/bootstrap.css">
    <!-- Iconos de iconos8 -->
    <link rel="stylesheet"href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="shortcut icon" href="http://localhost/proyecto/dev/mvc/resources/img/simple_logo.ico" />
    <link rel="stylesheet" href="http://localhost/proyecto/mvc/resources/css/style.css">
</head>

<body class="d-flex flex-column justify-content-between ">
    <header class="d-md-none container-xxl  d-flex justify-content-around align-items-center">
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
            <!-- <div class="m-0 mb-1 d-flex justify-content-center align-items-center">
                <p class="m-0  mb-3 text-center fw-bold fs-5 text-secondary">Correo no regitrado/Correo enviado</p>
            </div> -->

            <!-- La clase form__parraf--error solo debe salir si hay un error en el usuario o contraseña -->
            <button type="submit" class="mt-2 btn btn-primary text-white border  p-1 fs-5 col-2">Enviar</button>
            <p class="text-center m-0 mt-3"><a class="fw-bold fs-5 text-success text-decoration-none"
                    href="./login.php">Volver</a></p>
        </form>
    </main>
    <?php
    //Carga del fichero footer.php
    require "../layout/footer.php";
    ?>
</body>

</html>
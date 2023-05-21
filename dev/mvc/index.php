<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <!-- Link Bootstrap compilado -->
    <link rel="stylesheet" href="http://localhost/proyecto/dev/mvc/resources/css/bootstrap.css">
    <!-- Iconos de iconos8 -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="http://localhost/proyecto/dev/mvc/resources/css/style.css">
</head>

<body class="d-flex flex-column p-3 justify-content-between align-items-center">
    <header class="d-md-none container-xxl  d-flex justify-content-around align-items-center">
        <h1 class="text-success title title__h1 align-self-start mt-1 fw-bold ">Bienvenido</h1>
    </header>

    <header class="d-none d-md-flex justify-content-between container-fluid d-flex w-100 border-bottom">
        <div class="d-none d-md-flex justify-content-between container-xxl d-flex w-100">
            <div class="row w-75">
                <img class="col-1 p-0 m-0 header__logo" src="http://localhost/proyecto/dev/mvc/resources/img/logo_mini.svg" alt="logo en miniatura">
            </div>
            <div class="me-3 w-25 row d-flex flex-column justify-content-center align-items-center ">
                <a class=" col-sm-7 align-self-end text-decoration-none"href="./views/login/record.php"><button class=" fs-5 btn btn-secondary text-white border p-2  button button__index">Crear cuenta</button></a>
            </div>
        </div>
        
    </header>
    <main class="container-lg d-flex align-items-center mb-5 flex-column row">
        <figure class="col-sm-8 col-md-6 col-lg-5 d-flex justify-content-center m-0 p-0">
            <img class=" w-100 main__logo" src="http://localhost/proyecto/dev/mvc/resources/img/logo.svg" alt="Logotipo de la aplicación web">
        </figure>
        <p class="d-none d-md-block fs-5 fw-semibold text-center"> Simplifica, organiza y diviertete con la herramienta inteligente que optimiza tu productividad y tu rutina diaria. <br>Descubre un mundo de organización eficiente al alcance de tus manos.</p>
        <a class="d-none d-md-flex col-sm-2 text-decoration-none mt-5"href="./views/login/login.php"><button class=" fs-5 btn btn-primary text-white border p-2 button button__index">Entrar</button></a>
        <a class="d-md-none col-sm-8 text-decoration-none"href="./views/login/login.php"><button class=" fs-5 btn btn-primary text-white border p-2 button button__index">Entrar</button></a>
        <a class="d-md-none col-sm-8 text-decoration-none"href="./views/login/record.php"><button class=" fs-5 btn btn-secondary text-white border p-2  button button__index">Crear cuenta</button></a>
    </main>
    <footer class="container-xxl  w-100">
        <ul class="list-unstyled d-md-flex justify-content-around">
            <li> <a class="fw-bold fs-5 text-success text-decoration-none " href="./views/users/guide.php">Guía de usuario</a></li>
            <li> <a class="fw-bold fs-5  text-success text-decoration-none " href="./views/users/contact.php">Contacto</a></li>
        </ul>
    </footer>
</body>

</html>
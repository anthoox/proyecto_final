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

<body class="d-flex flex-column p-3 justify-content-between">
    <header class="container-xxl d-flex justify-content-around align-items-center">
        <h1 class="text-success title title__h1 align-self-start mt-1 fw-bold ">Bienvenido</h1>
    </header>
    <main class="container-xxl d-flex  flex-column">
        <h2 class="text-success title title__h2 fw-bolder mb-4">
            Lista <br>
            Simple
        </h2>
        <a class="text-decoration-none"href="./views/login/login.php"><button class="fs-5 btn btn-primary text-white border p-2 button button__index">Entrar</button></a>
        <a class=" text-decoration-none"href="./views/login/record.php"><button class="fs-5 btn btn-secondary text-white border p-2  button button__index">Crear cuenta</button></a>
    </main>
    <?php
        //Carga del fichero footer.php
        require "./views/layout/footer.php";
    ?>
</body>

</html>
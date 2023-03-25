<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuario</title>
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

<body class="p-3 body__admin">
    <?php
        require "../header/header.php";
    ?>
    <main class="container-xxl d-flex  flex-column mb-5 main__up">
        <h2 class="mt-3 text-success title title__h2 fw-bolder ">
            Alta de <br>
            Usuarios
        </h2>
        <form class=" d-flex flex-column justify-content-center form">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-4 fw-semibold">Nombre</label>
                <input type="text" class="form-control fs-4  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-4 fw-semibold">Correo</label>
                <input type="email" class="form-control fs-4  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-muted fs-4 fw-semibold" >Contraseña</label>
                <input type="password" class=" form-control fs-4  p-2" id="exampleInputPassword1" placeholder="Contraseña">
            </div>
            <p class="text-center  m-0 text-secondary fs-5 fw-semibold form__parraf--error ">El correo ya esta registrado/Registrado</p>
            <button type="submit" class="mt-3 mb-4 btn btn-secondary text-white border mt-1 p-2 fs-4 button">Registrar</button>
        <!-- </form> -->
        <hr>
        <h2 class="mt-4 text-success title title__h2 fw-bolder ">
            Buscar <br>
            Usuario
        </h2>
        <!-- <form class=" d-flex flex-column justify-content-center fw-semibold form"> -->
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-4 fw-semibold">Correo</label>
                <input type="text" class="form-control fs-4  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
            </div>
            <p class="text-center  m-0 text-secondary fs-5 fw-semibold form__parraf--error ">El correo no existe</p>
            <button type="submit" class="mt-3 mb-4  btn btn-primary text-white border mt-1 p-2 fs-4 button">Buscar</button>

        </form>
    </main>
</body>

</html>
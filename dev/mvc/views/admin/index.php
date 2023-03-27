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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="http://localhost/proyecto/dev/mvc/resources/css/style.css">
</head>

<body class="d-flex flex-column justify-content-between p-3 h-100">
    <?php
        require "../layout/header.php";
    ?>
    <main class="container-xxl d-flex flex-column mb-5 position-relative main__trash">
        <h2 class="mt-3 text-success title title__h2 fw-bolder ">
            Alta de <br>
            Usuarios
        </h2>
        <form class=" d-flex flex-column justify-content-center">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
                <input type="text" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                <input type="email" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-muted fs-5 fw-semibold" >Contraseña</label>
                <input type="password" class=" form-control fs-5  p-2" id="exampleInputPassword1" placeholder="Contraseña">
            </div>
            <p class="text-center  m-0 text-secondary fs-6 fw-semibold form__parraf--error ">El correo ya esta registrado/Registrado</p>
            <button type="submit" class="mt-3 mb-5 btn btn-secondary text-white border mt-1 p-1 fs-5 button">Registrar</button>
        
        <hr class="m-0">
        <h2 class="mt-4 text-success title title__h2 fw-bolder ">
            Buscar <br>
            Usuario
        </h2>
        
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                <input type="text" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
            </div>
            <p class="text-center  m-0 text-secondary fs-6 fw-semibold form__parraf--error ">El correo no existe</p>
            <button type="submit" class="mt-3 mb-5  btn btn-primary text-white border mt-1 p-1 fs-5 button">Buscar</button>

        </form>
    </main>
</body>

</html>
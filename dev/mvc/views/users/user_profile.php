<!DOCTYPE html>
<html lang="es">
<!-- añadir validación de sesion. -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
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

<body class="d-flex flex-column justify-content-between p-3 ">
    <header class="container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3" >
        <div class=" d-flex justify-content-between align-items-center header__cnt">
            <div class="d-flex align-items-center">
                <a href="../users/index.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-5">Atras</span>
            </div>
            <h1 class="m-0 fs-2 fw-semibold">Perfil de usuario</h1>
        </div>
    </header>
    <main class="container-xxl d-flex flex-column align-items-center pt-4 main__user">
        <figure class=" figure">
            <img src="http://localhost/Proyecto/dev/mvc/resources/img/img-user.png" class="border border-primary border-2 figure-img img-fluid rounded rounded-circle" alt="...">
        </figure>
        <form class=" d-flex flex-column justify-content-center fw-semibold" >
            <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre de usuario</label>
            <input type="text" class="mb-3 form-control fs-5  p-2 form__input" id="exampleInputEmail1"  placeholder="Usuario">
            <label for="formFileLg" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Cambiar de foto</label>
            <input class="mb-3 form-control form-control-lg fs-5  p-2 form__input" id="formFileLg" type="file">
            <section class="p-2 d-flex justify-content-between">
                <p class="fs-5">Fecha de alta</p>
                <p class=" fs-5">01/01/2023</p>
            </section>
            <section class="p-2 d-flex justify-content-between align-items-center">
                <p class="fs-5 m-0">Descargar datos</p>
                <button class="btn btn-primary text-white border mt-1 p-1 fs-5 button m-0">Enviar</button>
            </section>         
            <button type="submit" class="btn mt-5 btn-secondary fs-5 text-light p-1 button">Guardar</button>
        </form>
    </main>
</body>

</html>
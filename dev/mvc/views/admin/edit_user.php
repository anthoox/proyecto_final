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
    <main class="container-fluid d-flex  flex-column mb-5">
        <h2 class="mt-3 text-success title title__h2 fw-bolder ">
            Editar <br>
            Usuario
        </h2>
        <form class=" d-flex flex-column justify-content-center  form">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-4 fw-semibold">Nombre</label>
                <input type="text" class="form-control fs-4  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-4 fw-semibold">Correo</label>
                <input type="email" class="form-control fs-4  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
            </div>
            <div >
            <label for="" class=" form-label text-muted text-decoration-none fs-4 fw-semibold">Rol</label>
            <select class="form-select fs-4  p-2" aria-label="Default select example">
                <option selected>Seleccionar el rol</option>
                <option class="fs-4" value="1">Usuario</option>
                <option class="fs-4" value="2">Administrador</option>
            </select>
            </div>
            <div class="d-flex  flex-wrap justify-content-between align-items-center ">
                <button type="submit" class="btn btn-primary text-white border mt-5 p-2 fs-4 ps-4 pe-4">Recuperar cuenta</button>
                <button type="submit" class="btn btn-secondary text-white border mt-5 p-2 fs-4 ps-4 pe-4">Borrar listas</button>
                <button type="submit" class="btn btn-secondary text-white border mt-5 p-2 fs-4 ps-4 pe-4">Vaciar papelera</button>
                <button type="submit" class="btn btn-secondary text-white border mt-5 p-2 fs-4 ps-4 pe-4">Borrar usuario</button>
            </div>
            <button type="submit" class="btn btn-secondary text-white border mt-5 p-2 fs-4 button">Guardar</button>
            
        </form>
        
    </main>
</body>

</html>
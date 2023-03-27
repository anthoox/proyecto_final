<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar lista</title>
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

<body class="d-flex flex-column justify-content-between p-3">
    <?php
        require "../layout/header.php";
    ?>
    <main class="mt-3 container-xxl d-flex flex-column main__trash"> 
        <form class=" d-flex flex-column justify-content-center ">
            <label for="exampleInputEmail1" class=" form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
            <input type="text" class="mb-3 form-control fs-4  p-1 form__input" id="exampleInputEmail1"  placeholder="Elemento">
            <label for="formFileLg" class=" form-label text-muted text-decoration-none fs-5 fw-semibold">Cantidad</label>
            <input class="mb-3 form-control form-control fs-4  p-1 form__input" id="formFileLg" type="number" placeholder="1">
            <label for="formFileLg" class=" form-label text-muted text-decoration-none fs-5 fw-semibold">Precio</label>
            <input class="mb-3 form-control form-control fs-4  p-1 form__input" id="formFileLg" type="number" placeholder="0.0">           
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label text-muted fs-5 fw-semibold">Notas</label>
                <textarea class="form-control fs-4" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mt-3 d-flex justify-content-evenly">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <i class="la-3x las la-trash-alt"></i>
                    <p class="fs-6">Eliminar</p>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                <i class="la-3x las la-bell"></i>
                    <p class="fs-6">Notificar</p>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                <i class="la-3x las la-stopwatch"></i>
                <p class="fs-6">Temporizar</p>
                </div>
                
            </div>
            
            <button type="submit" class="btn btn-secondary text-white border p-1 fs-5 mt-4 button">Guardar</button>
        </form>
        
    </main>



</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
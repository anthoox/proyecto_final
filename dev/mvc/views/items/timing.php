<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temporización</title>
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

<body class="body-grid">
    <?php
        require "../header/header.php";
    ?>
    <main class="container-xxl d-flex flex-column p-4"> 
    <form class=" d-flex flex-column justify-content-center fw-semibold">

        <div class="mb-3 d-flex justify-content-between">
            <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold text-muted fs-4">Asignar tiempo:</label>
            <!-- <div class="col-sm-10"> -->
            <input type="time" class="form-control w-50 text-center fs-3" id="inputPassword" >
            <!-- </div> -->
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold text-muted fs-4">Descansos:</label>
            <input type="time" class="form-control w-50 text-center fs-3" id="inputPassword" disabled >
        </div>
        <hr>
        <div class="mb-3 d-flex justify-content-between">
            <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold text-muted fs-4">Tiempo extra:</label>
            <input type="time" class="form-control w-50 text-center fs-3" id="inputPassword" disabled >
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold text-muted fs-4">Tiempo total:</label>
            <input type="time" class="form-control w-50 text-center fs-3" id="inputPassword" disabled >
        </div>
        <div class="mt-5 mb-2 d-flex justify-content-evenly">
                <div class="d-flex flex-column justify-content-center align-items-center">
                <i class="la-3x las la-play"></i>
                <p class="fs-5">play</p>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                <i class="la-3x las la-pause"></i>
                <p class="fs-5">pause</p>
                </div>
            </div>
        <button type="submit" class="btn btn-secondary text-white border mt-5 p-2 fs-4 button">Fin</button>
    </form>
        
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
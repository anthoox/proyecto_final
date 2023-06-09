<!DOCTYPE html>
<html lang="es">

<?php
require "../layout/head.php";
?>

<body class="d-flex flex-column p-3">
    <header class="container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3" >
        <div class=" d-flex justify-content-between align-items-center header__cnt">
            <div class="d-flex align-items-center">
                <a href="../users/editItems.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-4">Atras</span>
            </div>
            <h2 class="m-0  fs-2 fw-semibold">Editar</h2>
        </div>
    </header>
    <main class="container-xxl d-flex flex-column p-0 main__trash"> 
    <form class="mt-3 d-flex flex-column justify-content-center ">

        <div class="mb-3 d-flex justify-content-between p-1">
            <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold text-muted fs-5">Asignar tiempo:</label>
            <!-- <div class="col-sm-10"> -->
            <input type="time" class="form-control w-50 text-center fs-4" id="inputPassword" >
            <!-- </div> -->
        </div>
        <div class="mb-3 d-flex justify-content-between p-1">
            <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold text-muted fs-5">Descansos:</label>
            <input type="time" class="form-control w-50 text-center fs-4" id="inputPassword" disabled >
        </div>
        <hr>
        <div class="mb-3 d-flex justify-content-between p-1">
            <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold text-muted fs-5">Tiempo extra:</label>
            <input type="time" class="form-control w-50 text-center fs-4" id="inputPassword" disabled >
        </div>
        <div class="mb-3 d-flex justify-content-between p-1">
            <label for="inputPassword" class="col-sm-2 col-form-label fw-semibold text-muted fs-5">Tiempo total:</label>
            <input type="time" class="form-control w-50 text-center fs-4" id="inputPassword" disabled >
        </div>
        <div class="mt-5 mb-2 d-flex justify-content-evenly p-1">
                <div class="d-flex flex-column justify-content-center align-items-center">
                <i class="la-3x las la-play"></i>
                <p class="fs-6">play</p>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                <i class="la-3x las la-pause"></i>
                <p class="fs-6">pause</p>
                </div>
            </div>
        <button type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 button">Fin</button>
    </form>
        
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
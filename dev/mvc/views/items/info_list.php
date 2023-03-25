<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información lista</title>
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
    <main class="container-xxl d-flex flex-column p-0">     
            <ul class="ps-2 pe-2 mb-0">
                <li class="d-flex justify-content-between align-items-center p-3 pt-3 pb-3 border-bottom">
                    <p class="fs-3 m-0 ">ID:</p>
                    <p class="fs-3 m-0"> 12</p>
                </li>
                <li class="d-flex justify-content-between align-items-center p-3 pt-3 pb-3 border-bottom">
                    <p class="fs-3 m-0 ">Total de elementos:</p>
                    <p class="fs-3 m-0">100</p>
                </li>
                <li class="d-flex justify-content-between align-items-center p-3 pt-3 pb-3 border-bottom">
                    <p class="fs-3 m-0 ">Precio total:</p>
                    <p class="fs-3 m-0">50</p>
                </li>
                <li class="d-flex justify-content-between align-items-center p-3 pt-3 pb-3 border-bottom">
                    <p class="fs-3 m-0 ">Tiempo de trabajo:</p>
                    <p class="fs-3 m-0">02:10:00</p>
                </li>
                <li class="d-flex justify-content-between align-items-center p-3 pt-3 pb-3 border-bottom">
                    <p class="fs-3 m-0 ">Tiempo de descansos:</p>
                    <p class="fs-3 m-0">02:10:00</p>
                </li>
                <li class="d-flex justify-content-between align-items-center p-3 pt-3 pb-3 border-bottom">
                    <p class="fs-3 m-0 ">Tiempo extra:</p>
                    <p class="fs-3 m-0">02:10:00</p>
                </li>
                <li class="d-flex justify-content-between align-items-center p-3 pt-3 pb-3 border-bottom">
                    <p class="fs-3 m-0 ">Fecha creación:</p>
                    <p class="fs-3 m-0">01/01/2023</p>
                </li>
                <li class="d-flex justify-content-between align-items-center p-3 pt-3 pb-3 border-bottom">
                    <p class="fs-3 m-0 ">Ultima modificación:</p>
                    <p class="fs-3 m-0">01/01/2023</p>
                </li>
                <li class="d-flex justify-content-between align-items-center p-3 pt-3 pb-3 border-bottom">
                    <p class="fs-3 m-0 ">Fecha notificación:</p>
                    <p class="fs-3 m-0">01/01/2023</p>
                </li>
            </ul>
            <section class=" ms-2 me-2 mb-0 accordion accordion-flush border-bottom" id="accordionFlushExample">
                <div class="bg-light  accordion-item">
                    <!-- <h2 class="accordion-header" id="flush-headingOne"> -->
                    <button class="ps-3 pe-3 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <span class=" fs-3   ">Elementos de lista:</span>
                    </button>
                    <!-- </h2> -->
                    <div id="flush-collapseOne" class="border-end border-start ps-1 pe-1 accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class=" accordion-body m-0 fs-3">elemento 1</div>
                        <hr class="m-0 ms-2 me-2">
                        <div class="accordion-body m-0 fs-3">elemento 1</div>
                        <hr class="m-0 ms-2 me-2">
                        <div class="accordion-body m-0 fs-3">elemento 1</div>
                        <hr class="m-0 ms-2 me-2">
                        <div class="accordion-body m-0 fs-3">elemento 1</div>
                        <hr class="m-0 ms-2 me-2">
                        <div class="accordion-body m-0 fs-3">elemento 1</div>
                    </div>
                </div>
                
            </section>
            <section class="mt-2 p-2 ps-4 pe-4 d-flex justify-content-between align-items-center">
                <p class="fs-3 m-0">Descargar en PDF:</p>
                <button class="btn btn-primary text-white border mt-1 p-2 fs-4 button m-0">Enviar</button>
            </section>
            
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
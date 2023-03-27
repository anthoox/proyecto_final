<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista X</title>
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

<body class="d-flex flex-column p-3">
    <?php
        require "../layout/header.php";
    ?>
    <main class="container-xxl d-flex flex-column p-0 main__trash2"> 
        <section class="bg-light d-flex justify-content-center align-items-center  border-bottom border-top fixed-top z-3 w-100 section__position--top2">
            <div id="carouselExampleControls" class="carousel carousel-dark slide w-100" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active p-1 pt-2 pb-2 ">
                        <p class="fs-4 m-0 text-center">Precio total: <span class="fw-semibold fs-4">15€</span></p>
                    </div>

                    <div class="carousel-item p-4 pt-2 pb-2">
                        <p class="fs-4 m-0 text-center">Tiempo total: <span class="fw-semibold fs-4">03:54</span></p>
                    </div>
                    
                </div>
                <button class="carousel-control-prev d-flex flex-column" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon align-self-start ms-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next d-flex flex-column" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon align-self-end me-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>   

        <section class="p-0 m-0 main__trash">
            <ul class="p-0 m-0">

                <li class="d-flex justify-content-between align-items-center p-1 border-bottom ul__li">
                    <div class="m-0 d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input m-0" type="checkbox" value=""> 
                        </div>
                        <div class="input-group d-flex flex-column ms-3 ">                 
                            <label for="exampleInputEmail1" class="m-0 form-label d-flex  fs-4">huevos</label>
                            <p class=" fw-bold fs-6 text-primary m-0 mb-1">Recordatorio: 5 enero 2023, a las 19:30</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fs-4"></span>
                        <i class="la-2x las la-trash-alt"></i>
                    </div>
                </li>

                <li class="d-flex justify-content-between align-items-center p-1 border-bottom ul__li">
                    <div class="m-0 d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input m-0 " type="checkbox" value="" checked> 
                        </div>
                        <div class="input-group d-flex flex-column ms-3 ">                 
                            <label for="exampleInputEmail1" class="m-0 form-label d-flex text-muted text-decoration-line-through fs-4">pan</label>
                            <p class=" fw-bold fs-6 text-muted text-decoration-line-through m-0 mb-1">Recordatorio: 5 enero 2023, a las 19:30</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fs-4"></span>
                        <i class="la-2x las la-trash-alt"></i>
                    </div>
                </li>
                <li class="d-flex justify-content-between align-items-center p-1 border-bottom ul__li">
                    <div class="m-0 d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input m-0" type="checkbox" value=""> 
                        </div>
                        <div class="input-group d-flex flex-column ms-3 ">                 
                            <label for="exampleInputEmail1" class="m-0 form-label d-flex  fs-4">cilantro</label>
                            <!-- <p class=" fw-bold fs-6 text-primary m-0 mb-1">Recordatorio: 5 enero 2023, a las 19:30</p> -->
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fs-4"></span>
                        <i class="la-2x las la-trash-alt"></i>
                    </div>
                </li>

                <li class="d-flex justify-content-between align-items-center p-1 border-bottom ul__li">
                    <div class="m-0 d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input m-0" type="checkbox" value="" checked> 
                        </div>
                        <div class="input-group d-flex flex-column ms-3 ">                 
                            <label for="exampleInputEmail1" class="m-0 form-label d-flex text-muted text-decoration-line-through fs-4">arroz</label>
                            <!-- <p class=" fw-bold fs-6 text-primary m-0 mb-1">Recordatorio: 5 enero 2023, a las 19:30</p> -->
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fs-4"></span>
                        <i class="la-2x las la-trash-alt"></i>
                    </div>
                </li>
            </ul>
        </section>
        <!-- La configuración en modo completo cambia. Hay que mover la primera section -->
        <button class="btn btn-secondary fs-4  text-light d-flex justify-content-center align-items-center button__add_list">
            <i class=" la-1x las la-plus"></i>Añadir</button>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próximos</title>
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

<body >
    <!-- Aqui puede que falte la clase que tienen los otrs body -->
    <?php
        require "../layout/header.php";
        echo "hola";
    ?>
    <main class="container-fluid d-flex flex-column position-relative p-0">    
        <ul class="ps-2 pe-2 position-relative section__position--top">
            <li class="d-flex justify-content-between align-items-center p-1 ps-3 pe-3 border-bottom li__hover">
                <div class="m-0 d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" value="">  
                    <div class="input-group d-flex flex-column ms-3 m-0">                 
                        <label for="exampleInputEmail1" class="m-0 form-label"><span class="fw-semibold fs-4">Lista 1 / </span><span class=" fs-4">huevos</span></label>
                        <p class="fw-bold fs-6 text-primary m-0">Recordatorio: 5 enero 2023, a las 19:30</p>
                    </div>
                </div>
                <i class="la-2x las la-trash-alt"></i>
            </li>

            <li class="d-flex justify-content-between align-items-center p-1 ps-3 pe-3 border-bottom li__hover">
                <div class="m-0 d-flex align-items-center ">
                <label for="exampleInputEmail1" class="m-0 form-label><span class="fw-semibold fs-4"></label>
                    <input class="form-check-input" type="checkbox" value="">  
                    <div class="input-group d-flex flex-column ms-3 m-0">                 
                        
                        <p for="exampleInputEmail1" class="m-0 form-label "><span class="fw-semibold fs-4">Lista 2 / </span><span class=" fs-4">pan</span></p>
                        <p class="fw-bold fs-6 text-primary m-0 ">Recordatorio: 7 enero 2023, a las 21:00</p>
                    </div>
                </div>
                <i class="la-2x las la-trash-alt"></i>
            </li>

            <li class="d-flex justify-content-between align-items-center p-1 ps-3 pe-3 border-bottom li__hover">
                <div class="m-0 d-flex align-items-center ">
                <label for="exampleInputEmail1" class="m-0 form-label><span class="fw-semibold fs-4"></label>
                    <input class="form-check-input" type="checkbox" value="">  
                    <div class="input-group d-flex flex-column ms-3 m-0">                 
                        
                        <p for="exampleInputEmail1" class="m-0 form-label "><span class="fw-semibold fs-4">Lista 2 / </span><span class=" fs-4">pan</span></p>
                        <p class="fw-bold fs-6 text-primary m-0 ">Recordatorio: 7 enero 2023, a las 21:00</p>
                    </div>
                </div>
                <i class="la-2x las la-trash-alt"></i>
            </li>


        </ul>
    </main>
</body>

</html>
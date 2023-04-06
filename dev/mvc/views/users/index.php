<?php 
 session_start();
 require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
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

<body class="d-flex flex-column">
    <?php
        require "../layout/header.php";
    ?>
    <main class="container-xxl d-flex flex-column ps-3 pe-3 pb-3 main__user"> 
        <section class="d-flex align-items-center justify-content-between">
                    <!-- 
                    <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike">
                    </div> 
                    -->

                    <button class="btn fs-6 d-flex bg-primary text-white justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                        Mis listas
                    </button>
                    <button class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                        Próximas
                    </button>
                    <button class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                        Pendientes
                    </button>
                    <button class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100 fw-semibold " type="submit">
                        Completas
                    </button>
        </section>   

        <section class="p-0 m-0">
            <?php 
                // require_once '../layout/lists.php';
                // require_once '../layout/upcoming.php';
                // require_once '../layout/pending.php';
                require_once '../layout/completed.php';
            ?>
        </section>
    
        <button class="btn btn-secondary fs-5 text-light d-flex justify-content-center align-items-center p-1 button border rounded-4 button__add_list">
        <i class="la-2x las la-plus-circle"></i></button>
 
</main>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
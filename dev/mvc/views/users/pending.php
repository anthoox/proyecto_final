<?php
session_start();

require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
//Esto es para probar si al cambiar a una dirección directamente deja acceder a la web
if($_SESSION['user']){
    if($_SESSION['user']['rol'] === 2){
        echo'
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

        <body class="d-flex flex-column">';

        require "../layout/header.php";
        echo'
        <main class="container-xxl d-flex flex-column ps-3 pe-3 pb-3 main__user"> 
        <section class="d-flex align-items-center justify-content-between">
            <button class="btn fs-6 d-flex  justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Mis listas
            </button>
            <button class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Próximas
            </button>
            <button class="btn bg-primary text-white fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Pendientes
            </button>
            <button class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100 fw-semibold " type="submit">
                Completas
            </button>
        </section>   

        <section class="p-0 m-0">
            <ul class="p-0 m-0">';
        
            require_once '../layout/pending.php';

        echo'
            </ul>
        </section>
    
        <button class="btn btn-secondary fs-5 text-light d-flex justify-content-center align-items-center p-1 button border rounded-4 button__add_list">
        <i class="la-2x las la-plus-circle"></i></button>
        <form id="myform" method="post" action="tu-pagina.php">
            <input type="hidden" name="variable1" value="valor1">
            <input type="hidden" name="variable2" value="valor2">
        </form>
</main>';
require "menu.php";
echo'    
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="http://localhost/proyecto/dev/mvc/resources/js/menu.js"></script>
</html>';
    }else{
        header('Content-Type: text/html; charset=utf-8');
        header('location:../login/login.php');
    }
}else{
    header('Content-Type: text/html; charset=utf-8');
    header('location:../login/login.php');
}

?>
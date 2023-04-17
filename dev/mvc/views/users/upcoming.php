<?php
session_start();

require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
//Esto es para probar si al cambiar a una dirección directamente deja acceder a la web
if($_SESSION['user']){
    if($_SESSION['user']['rol'] === 2){

        //POST para añadir una lista de un usuario
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST)){        
                if(isset($_POST['nameList'])) {
                    $list = new UserList();
                    $result = $list->addList($_SESSION['user']['id_user'], $_POST["nameList"]);
                    // if(!$result){                    
                    //     $prueba = '<p class="text-center fs-5 text-secondary desaparece">Lista no añadida</p>';
                    // }
                }
            }
        }
        
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
        <section id="miForm" class="d-flex align-items-center justify-content-between">
            <button id="btn-1" class="btn fs-6 d-flex  justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Mis listas
            </button>
            <button id="btn-2" class="btn  bg-primary text-white fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Próximas
            </button>
            <button id="btn-3" class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Pendientes
            </button>
            <button id="btn-4" class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100 fw-semibold " type="submit">
                Completas
            </button>
        </section>   

        <section class="p-0 m-0">
            <ul class="p-0 m-0">';

            require_once '../layout/upcoming.php';

        echo'
            </ul>
        </section>
    
        <button class="btn btn-primary fs-5 text-light d-flex justify-content-center align-items-center p-1 button border rounded-4 button__add_list">
        <i class="me-1 la-ms las la-plus"></i>Lista</button>

</main>';
require "menu.php";
require "../layout/addList.php";
echo'    
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="http://localhost/proyecto/dev/mvc/resources/js/menu.js"></script>
<script src="http://localhost/proyecto/dev/mvc/resources/js/index.js"></script>
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
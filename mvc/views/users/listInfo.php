<?php
session_start();
require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/controller.php';
require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/functions.php';

//Esto es para probar si al cambiar a una dirección directamente deja acceder a la web
if ($_SESSION['user']) {
    if ($_SESSION['user']['rol'] === 2) {

        $data = new UserList();
        $infoList = $data->infoList($_SESSION['id_list']);
        $dataItems = new UserItems();
        $itemsList = $dataItems->itemsUser('id_list', $_SESSION['id_list']);
        $totalPrice = $_SESSION['total_price'];

        if ($totalPrice == '') {
            $infoList['total_price'] = 0;
        }
        if ($infoList['total_time'] == '') {
            $infoList['total_time'] = '--';
        }
        if ($infoList['work_time'] == '') {
            $infoList['work_time'] = '--';
        }
        if ($infoList['break_time'] == '') {
            $infoList['break_time'] = '--';
        }

        if (!$itemsList) {
            $itemsList['rows'] = 0;
        }

        $infoList['creation_date'] = date('d/m/Y', strtotime($infoList['creation_date']));
        $infoList['modif_date'] = date('d/m/Y', strtotime($infoList['modif_date']));
        echo '
        <!DOCTYPE html>
        <html lang="es">';

        require "../layout/head.php";

        echo '

        <body class="d-flex flex-column">  

       
     
        <header class="d-md-none container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3 shadow" >
            <div class=" d-flex justify-content-between align-items-center header__cnt">
                <div class="d-flex align-items-center">
                    <a href="../users/itemsList.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-4">Atras</span>
                </div>
                <h2 class="m-0 fs-2 fw-semibold">Información lista</h2>
            </div>
        </header>

        <header class="d-none d-md-block container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3 p-4 shadow " >
            <div class=" d-flex justify-content-between align-items-center ">
                <div class="d-flex align-items-center">
                    <a href="../users/itemsList.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-4">Atras</span>
                </div>
               <div class="d-flex align-items-center">
                <h2 class="m-0 fs-2 fw-semibold">Información lista</h2>
               </div>

                
            </div>
        </header>
        <main class="mt-2 mt-md-4 container-xxl d-flex flex-column ps-3 pe-3 pb-3 main__user"> 
            <section class="p-0 mt-3"> 
                <div class="p-0 ps-2 pe-2 d-flex align-items-center justify-content-between">
                <p class="fs-4 m-0 p-0">ID:</p> <p class="fs-4 m-0 p-0">' . $infoList['id_list'] . '</p>
                </div>
                <hr>
                <div class="p-0 ps-2 pe-2 d-flex align-items-center justify-content-between">
                <p class="fs-4 m-0 p-0">Nombre:</p> <p class="fs-4 m-0 p-0">' . $infoList['list_name'] . '</p>
                </div>
                <hr>
                <div class="p-0 ps-2 pe-2 d-flex align-items-center justify-content-between">
                <p class="fs-4 m-0 p-0">Total de elementos:</p> <p class="fs-4 m-0 p-0">' . $itemsList['rows'] . '</p>
                </div>
                <hr>
                <div class="p-0 ps-2 pe-2 d-flex align-items-center justify-content-between">
                <p class="fs-4 m-0 p-0">Importe acumulado:</p> <p class="fs-4 m-0 p-0">' . $totalPrice . '</p>
                </div>
                <hr>
                <div class="p-0 ps-2 pe-2 d-flex align-items-center justify-content-between">
                <p class="fs-4 m-0 p-0">Tiempo total:</p> <p class="fs-4 m-0 p-0">' . $infoList['total_time'] . '</p>
                </div>
                <hr>
                <div class="p-0 ps-2 pe-2 d-flex align-items-center justify-content-between">
                <p class="fs-4 m-0 p-0">Tiempo de trabajo:</p> <p class="fs-4 m-0 p-0">' . $infoList['work_time'] . '</p>
                </div>   
                <hr> 
                <div class="p-0 ps-2 pe-2 d-flex align-items-center justify-content-between">
                <p class="fs-4 m-0 p-0">Tiempo de descanso:</p> <p class="fs-4 m-0 p-0">' . $infoList['break_time'] . '</p>
                </div>   
                <hr> 
                <div class="p-0 ps-2 pe-2 d-flex align-items-center justify-content-between">
                <p class="fs-4 m-0 p-0">Fecha creación:</p> <p class="fs-4 m-0 p-0">' . $infoList['creation_date'] . '</p>
                </div>   
                <hr> 
                <div class="p-0 ps-2 pe-2 d-flex align-items-center justify-content-between">
                <p class="fs-4 m-0 p-0">Última mofidificación:</p> <p class="fs-4 m-0 p-0">' . $infoList['modif_date'] . '</p>
                </div>   
                <hr> 
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item ">
                        <p class="accordion-header" id="flush-headingOne ">
                            <button class="fs-4 m-0 p-0 ps-2 pe-2 accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Elementos de la lista
                            </button>
                        </p>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="pb-0 accordion-body">
                                <ul class="info__ul__li p-0 m-0">';
        for ($i = 0; $i < (count($itemsList) - 1); $i++) {
            echo '<li class="fs-4 list-group-item list-group-item-action">' . $itemsList[$i]['item_name'] . '</li>
                                    <hr class="info__ul__li--hr">';
        }
        //Hay que corregir el precio
        echo '
                                </ul>
                            </div>
                        </div>
                    </div>  
                </div>     
            </section>
            <hr>
            <section class="mt-4 d-flex align-items-center justify-content-between w-100 p-2 m-0"> 
                <p class="fs-4 p-0 m-0">Descargar en PDF</p> 
                <button class="shadow-sm bg-primary text-white btn fs-5 d-flex justify-content-center align-items-center p-2 border rounded-4 h-100" type="submit">Descargar</button>
            </section>
        </main>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="http://localhost/proyecto/mvc/resources/js/infoList.js"></script>';
        $close = new Db_connection();
        $close->closeConnection();
    } else {
        header('Content-Type: text/html; charset=utf-8');
        header('location:../login/login.php');
    }
} else {
    header('Content-Type: text/html; charset=utf-8');
    header('location:../login/login.php');
}







?>
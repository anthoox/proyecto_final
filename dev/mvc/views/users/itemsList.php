<?php
session_start();
//Guardamos el valor del id_list
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_list']) && $_POST['nameList'] != '') {
        $_SESSION['id_list'] = $_POST['id_list'];
        $_SESSION['list_name'] = $_POST['nameList'];
    }

    
}
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/functions.php';

//Esto es para probar si al cambiar a una dirección directamente deja acceder a la web
if($_SESSION['user']){
    if($_SESSION['user']['rol'] === 2){
        $id_list = '';
        $list_name = '';
        
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

        $itemsList = '';
        $items = new Useritems();     
        
        $itemsList = $items->itemsUser('id_list', $_SESSION['id_list']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    
            //POST para añadir un item
            if(isset($_POST['nameItem'])) {
                $newName = new UserItems();
                $result = $newName->addItem( $_SESSION['id_list'], $_SESSION['user']['id_user'], $_POST['nameItem'] );
                if($result){
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit();
                }else{
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit();
                }  
            }

            //POST para eliminar item
            if(isset($_POST['id_item']) && isset($_POST['del_Item'])) {
                $item = new UserItems();
                $result = $item->deleteItem($_POST['id_item']);
                if($result){
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit();
                }  
            }

            //Para editar el item
            if(isset($_POST['id_item']) && isset($_POST['edit_Item'])) {
                    $_SESSION['id_item'] = $_POST['id_item'];
                    header("location:./editItems.php" );
                    exit();
              
            }
            
        }

        $items_total_time = $items->timeItems($_SESSION['id_list']);
        $items_total_time = format_time($items_total_time[0]); 
        echo'
        <header class="container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3" >
            <div class=" d-flex justify-content-between align-items-center header__cnt">
                <div class="d-flex align-items-center">
                    <a href="../users/index.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-5">Atras</span>
                </div>
                <h2 class="m-0  fs-2 fw-semibold">' . $_SESSION['list_name'] .'</h2>
            </div>
        </header>
        <main class="container-xxl d-flex flex-column ps-3 pe-3 pb-3 main__user"> 
        <section class="p-0 m-0"> ';
        if($itemsList){
        //Precio total para la cabecera
        $totalP = $items->itemsPrice($_SESSION['id_list']);
        if($totalP[0]>0){
            $totalP = $totalP[0];
            $totalP = round($totalP, 3) . "€";
            
        }else{
            $totalP = '0';
        }
        echo'

        <header id="carouselExampleDark" class="carousel carousel-dark slide border rounded-4 mt-3 pt-3 pb-3 w-100" data-bs-interval="false">
            <div class="carousel-inner ">
            <div class="carousel-item active " >
                <p class="p-0 m-0  fw-semibold fs-5 text-center">Importe acumulado: '. $totalP .' </p>      
            </div>
            <i class="ms-2 la-2x las la-info-circle"></i>
            <div class="carousel-item " >
                <p class="p-0 m-0 fw-semibold fs-5 text-center">Tiempo empleado: '.$items_total_time .'</p>
                
            </div>
            </div>
            <button class="carousel-control-prev d-flex flex-column" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next d-flex flex-column" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon  align-self-end me-1" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </header>
        </section>

        <section>
        <ul class="p-0 m-0">';

        for($i = 0; $i<(sizeof($itemsList)-1); $i++){
                        
            $item_price = $itemsList[$i]['price'];
            if($item_price<=0){
                $item_price = '';
            }else{
                $item_price = $item_price . "€";
            }

            $quantity = 'x' . $itemsList[$i]['quantity'];
            
            $item_time = $itemsList[$i]['total_time'];
            $item_time = format_time($item_time);
            

            $notif_date  = $itemsList[$i]['alarm_date'];
            if($notif_date != "0000-00-00 00:00:00"){
                $notif_date =  format_date_time($notif_date);
            }else{
                $notif_date = '';
            }
            
            
            echo
            '
            <li class="li__hover d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
                <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike"
                    ';
                    if($itemsList[$i]['is_check'] == 1){
                        echo "checked";
                    }
                    echo'
                    >
                </div>
                <div class="position-relative w-75 h-100">
                    
                    <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                        <div>                    
                            <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">' . $item_price . '</span>
                            <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">'.$quantity.'</span>
                        </div>
                        <div class="w-100 ul__li__div--scroll">
                            <p class="p-0 m-0 fs-4 fw-semibold " id="textToStrike">' . $itemsList[$i]['item_name'] . '</p>
                        </div>
                        
                        <div class="d-flex align-items-center  li__div__icon">';

                        if($item_time){
                            echo'                  
                            <i class="w-semibold mb-1  la-lg las la-stopwatch"></i>
                            <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">'.$item_time.'</span>';
                            if($notif_date){
                                echo
                                '<i class="w-semibold mb-1 ms-2 la-lg las la-bell"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">'.$notif_date.'</span>';
                            }
                        }else{
                            if($notif_date){
                                echo'
                                <i class="w-semibold mb-1 la-lg las la-bell"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">'.$notif_date.'</span>';
                            }
                        };
                        echo'
                        </div>
                    </div>
                </div>
                
                <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between">
                    <form method="POST" class="d-flex ">
                        <input type="hidden" name="id_item" value="' . $itemsList[$i]['id_item']  . '">';
                        echo'
                        <button name="edit_Item" type="submit" class="mt-0 btn btn-link text-black btn__editItem"><i class="la-2x las la-pen"></i></button> 
                        <!-- name="del_Item" para identificar el button que sirve para eliminar el item -->
                        <button name="del_Item" type="submit" class="mt-0 btn btn-link text-black btn__delItem"><i class="la-2x las la-trash-alt"></i></button>
                    </form>
                </div>
            </li>';
            }
            echo'</ul>';
        }else {
            
            echo'
            <section>';
            $_SESSION['error_message']['loadItems'] = "La lista aún esta vacía";
            echo'
                <ul class="p-0 m-0"> 
                    <li class="d-flex  align-items-center justify-content-between mt-5">
                        <div class="position-relative w-100 h-100">
                            <div class="p-0 ps-3 d-flex  m-0 form-check h-100 justify-content-center align-items-center w-100">        
                                <p class="p-0 m-0 fs-5 fw-semibold text-muted" id="textToStrike">' . $_SESSION['error_message']['loadItems'] .'</p>
                            </div>
                        </div>     
                    </li>
                </ul>';
        }    
            echo'
            </section>
            <button class="btn btn-secondary fs-5 text-light d-flex justify-content-center align-items-center p-1 button rounded-circle shadow button__add_item">
            <i class="la-lg las la-plus"></i></button>
            </main>';
            require "../layout/addItem.php";
        echo'
        </body>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="http://localhost/proyecto/dev/mvc/resources/js/items.js"></script>';
          }else{
            header('Content-Type: text/html; charset=utf-8');
            header('location:../login/login.php');
          }
    }else{
        header('Content-Type: text/html; charset=utf-8');
        header('location:../login/login.php');
}


?>
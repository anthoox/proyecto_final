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
        <form class="d-flex align-items-center justify-content-between" id="miForm">
            <button id="btn-1" class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Mis listas
            </button>
            <button id="btn-2" class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Próximas
            </button>
            <button id="btn-3" class="btn fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Pendientes
            </button>
            <button id="btn-4" class="btn bg-primary text-white fs-6 d-flex justify-content-center align-items-center p-1 border rounded-4 mt-3 h-100 fw-semibold " type="submit">
                Completas
            </button>
        </form>   

        <section class="p-0 m-0">
            <ul class="p-0 m-0">';
            
            require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/functions.php';

    
            $lists_items = new UserItems();
        
            $lists_items = $lists_items->completed($_SESSION['user']['id_user']);
        
            if($lists_items){
                for($i = 0; $i < sizeof($lists_items); $i++){
                    $item_price = $lists_items[$i]['price'];
                        if($item_price<=0){
                            $item_price = '';
                        }else{
                            $item_price = $item_price . "€";
                        }
            
                        $quantity = 'x' . $lists_items[$i]['quantity'];
                        
                        $item_time = $lists_items[$i]['total_time'];
                        $item_time = format_time($item_time);
                        
            
                        $notif_date  = $lists_items[$i]['alarm_date'];
                        $notif_date =  format_date_time($notif_date);
        
                        $name_list = new UserList();
                        $name_list = $name_list->getNameList($lists_items[$i]['id_list']);
            
                    echo' 
                    <li class="li__hover d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
                    <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike"
                        ';
                         if($lists_items[$i]['is_check'] == 1){
                            echo "checked";
                         }
                        echo'
                        >
                    </div>
                    <div class="position-relative w-100 h-100">
                        
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                            <div>
                            
                    <span class="text-muted fw-semibold ms-1 mb-2 m-0 p-0 fs-6">' . $item_price . '</span>
                            <span class="text-muted  fw-semibold ms-1 mb-2 m-0 p-0 fs-6">'.$quantity.'</span>
                            </div>
                            <div class="w-100 ul__li__div--scroll">
                                <p class="p-0 m-0 fs-5 fw-semibold text-muted text-decoration-line-through" id="textToStrike"><span class="fs-4 fw-bold text-muted">' .$name_list['list_name']."</span><span class='fs-6 fw-bold text-secondary'> > </span>". $lists_items[$i]['item_name'] . '</p>
                            </div>
                            
                            <div class="d-flex align-items-center  li__div__icon">';
        
                            if($item_time){
                                echo                       
                               '<i class="w-semibold mb-1  la-lg las la-stopwatch text-muted"></i>
                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-muted">'.$item_time.'</span>';
                                if($notif_date){
                                    echo
                                    '<i class="w-semibold mb-1 ms-2 la-lg las la-bell text-muted"></i>
                                    <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-muted">'.$notif_date.'</span>';
                                }
                            }else{
                                if($notif_date){
                                    echo
                                    '<i class="w-semibold mb-1 la-lg las la-bell text-muted"></i>
                                    <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 text-decoration-line-through text-muted">'.$notif_date.'</span>';
                                }
                            };
        
                            echo
                            '</div>
                        </div>
                    </div>
                    <!--
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        
                    </div>
                    -->
                </li>';
                }
            }else{        
                $_SESSION['error_message']['loadLists'] = "No tiene próximas tareas";
                echo
                    '<ul class="p-0 m-0"> 
                        <li class="d-flex  align-items-center justify-content-between mt-5">
                            <div class="position-relative w-100 h-100">
                                <div class="p-0 ps-3 d-flex  m-0 form-check h-100 justify-content-center align-items-center w-100">        
                                    <p class="p-0 m-0 fs-5 fw-semibold text-muted" id="textToStrike">' . $_SESSION['error_message']['loadLists'] .'</p>
                                </div>
                            </div>     
                        </li>
                    </ul>';
            }
            
        echo'
            </ul>
        </section>
    
        <button class="btn btn-secondary fs-5 text-light d-flex justify-content-center align-items-center p-1 shadow button border rounded-4 button__add_list">
        <i class="me-1 la-ms las la-plus"></i>Lista</button>

</main>';
require "menu.php";
require "../layout/addList.php";
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/config/config.php';
$close = new Db_connection();
$close->closeConnection();
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
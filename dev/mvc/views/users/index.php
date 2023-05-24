<?php
session_start();

require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
//Esto es para probar si al cambiar a una dirección directamente deja acceder a la web
if($_SESSION['user']){
    if($_SESSION['user']['rol'] === 2){
        $result = '';
        //POST para añadir una lista de un usuario
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST)){        
                if(isset($_POST['nameList'])) {
                    $list = new UserList();
                    $result = $list->addList($_SESSION['user']['id_user'], $_POST["nameList"]);
                    if($result){
                        header("Location: " . $_SERVER['REQUEST_URI']);
                        exit();
                    }else{
                        $result = "La lista " . $_POST["nameList"] . " ya existe.";
                    }  
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
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- Mis estilos -->
        <link rel="shortcut icon" href="http://localhost/proyecto/dev/mvc/resources/img/simple_logo.ico" />
        <link rel="stylesheet" href="http://localhost/proyecto/dev/mvc/resources/css/style.css">
        </head>

        <body id="head" class="d-flex flex-column">';

        require "../layout/header.php";
        require "../layout/headerDesk.php";
        
        if($_SESSION['user']['photo'] == ""){
            $photo = "img-user.png";
        }else{
            $photo = $_SESSION['user']['photo'];
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Realizar la validación de los datos recibidos
            if (!empty($_POST['id_list']) && !empty($_POST['newNameList'])) {
                $newName = new UserList();
                $result = $newName->editList($_POST['id_list'], 'list_name',$_POST['newNameList'] );
                if($result){
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit();
                }    
            } 

            // Post para enviar la lista a la papelera
            if(isset($_POST['accept'])) {
                // Llamar a la función en el controlador para borrar el elemento
                $newName = new UserList();
                $result = $newName->editList($_POST['id_list'], 'trash',1 );
                if($result){

                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit();
                }   
        } 
    }
        echo'
        
        <main class="mt-md-5 mt-3 position-relative h-100 container-xxl d-flex flex-column flex-md-row ps-3 pe-3 pb-3 main__user"> 

        <nav class="h-100 d-none d-md-flex  justify-content-center w-25 border  shadow border-2  rounded-4 bg-white ps-2 pe-2 me-3">
            <ul class="rounded-4 list-group list-group-flush">
                <li class="mt-1 p-4 d-flex  flex-column justify-content-center align-items-center list-group-item list-group-item-action">
                    <img class="img-user-2 m-2 shadow border border-3 border-primary d-flex justify-content-center align-items-center rounded-circle overflow-hidden " src="/proyecto/dev/mvc/resources/img/img-users/'.$photo.'" alt="imagen de usuario">
                    <a href="./../users/user_profile.php" class="align-self-start mt-3 fs-5 text-decoration-none text-black">Perfil de '.$_SESSION['user']['name'] .'</a>
                </li>
                <li class="p-4 list-group-item list-group-item-action"><a href="./../users/trash.php" class="fs-5 text-decoration-none text-black">Papelera</a></li>
                <li class="p-4 list-group-item list-group-item-action"><a href="./../users/contact.php" class="fs-5 text-decoration-none text-black">Contacto</a></li>
                <li class="p-4 list-group-item list-group-item-action"><a href="./../users/guide.php" class="fs-5 text-decoration-none text-black">Guía de usuario</a></li>
                <li class="p-4 list-group-item list-group-item-action"><a href="../../controllers/exit.php" class="fs-5 text-decoration-none text-black">Cerrar sesión</a></li>
            </ul>
        </nav>

        <div class="p-2 pe-3 ps-3 w-100 d-flex  align-items-center flex-column shadow border  border-2  rounded-4 overflow-auto" >
        <form class=" w-100 d-flex  align-items-center  flex-column flex-sm-row  " id="miForm">
            <div class="pb-2 d-flex w-100 justify-content-around ">
                <button id="btn-1" class="  shadow-sm btn fs-5 d-flex bg-primary text-white justify-content-center align-items-center p-2 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                Mis listas
                </button>
                <button id="btn-2" class=" shadow-sm btn fs-5 d-flex  justify-content-center  align-items-center p-2 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">Próximas
                </button>
            </div>
            
            <div class="pb-2 d-flex w-100 justify-content-around ">
                <button id="btn-3" class=" shadow-sm btn fs-5 d-flex justify-content-center align-items-center p-2 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                    Pendientes
                </button>
                <button id="btn-4" class="  shadow-sm btn fs-5 d-flex justify-content-center align-items-center p-2 border rounded-4 mt-3 h-100 fw-semibold section__btn--size" type="submit">
                    Completas
                </button>
            </div>
        </form>   

        <section class="p-0 m-0 w-100">
            <ul class="p-0 m-0 mt-3">';
            
            $items = new Items();
    
            $user_list = new UserList();
            $user_list = $user_list->toList($_SESSION['user']['id_user']);
        
            $user_items = new UserItems();

            

    //Si tiene listas:
    if($user_list){        
        for($i = 0; $i<sizeof($user_list); $i++){
            $items = $user_items->itemsUser('id_list', $user_list[$i]['id_list']);

            if($items){
                $items = $items['rows'];
            }else{
                $items = 0;
            }

            $item_price = $user_items->itemsPrice($user_list[$i]['id_list']);
            if($item_price[0]>0){
                $item_price = $item_price[0];
                $item_price = round($item_price, 3) . "€";
                
            }else{
                $item_price = '';
            }

            $items_check = $user_items->itemsChecked($user_list[$i]['id_list']);
            if($items_check == false){
                $items_check['items'] = 0;
            }

            echo
            '<li class="shadow-sm align-items-center justify-content-between border border-2 rounded-4 mt-2 ul__li--size li__hover d-flex ">
                <div class="position-relative w-75 h-100">
                    <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end w-100">
                        <div class="w-100 ul__li__div--scroll">
                            <form  action="../users/itemsList.php" method="post">
                                <input type="hidden" name="id_list" value="' . $user_list[$i]["id_list"] . '">
                                <input name="nameList" class="form-control-plaintext text-start w-100 btn btn-link fs-5  ps-0 fw-bold text-decoration-none text-black" type="submit" value="' . $user_list[$i]["list_name"] . '">
                            </form>
                        </div>
                        
                        <div class="d-flex align-items-center  li__div__icon">
                            <i class="mb-1 la-lg las la-check-circle"></i><span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 ">' . $items_check['items'] .  '/'. $items . '</span>
                            <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">' . $item_price .'</span>
                        </div>
                    </div>
                </div>
    
                <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between ">
                    <div class="d-flex ">
                        <button class="mt-0 btn btn-link text-black"><i class="la-2x las la-pen icon__editList"></i></button> 
                        <button class="btn mt-0 btn-link text-black"><i class="la-2x las la-trash-alt icon__trashList"></i></button>
                    </div>            
                </div>
            </li>';
    }
    }else{        
        $_SESSION['error_message']['loadLists'] = "No tiene listas creadas aún";
        echo
            '
                <li class="d-flex  align-items-center justify-content-between mt-5">
                    <div class="position-relative w-100 h-100">
                        <div class="p-0 ps-3 d-flex  m-0 form-check h-100 justify-content-center align-items-center w-100">        
                            <p class="p-0 m-0 fs-5 fw-semibold text-muted" id="textToStrike">' . $_SESSION['error_message']['loadLists'] .'</p>
                        </div>
                    </div>     
                </li>
            ';
    }    
        echo'
            </ul>
        </section>
    
        <button class="me-1 btn btn-secondary fs-5 fw-semibold text-light d-flex justify-content-center align-items-center p-1 shadow button border rounded-4 button__add_list">
        <i class="m-0 me-1 la-sm las la-plus"></i>Lista</button>
        </div>
</main>
<p class="fs-5 fw-bold text-primary text-center position-absolute top-50 start-50 translate-middle p-flotante">' . $result . '</p>
';
require "menu.php";
require "../layout/addList.php";
require "../layout/editList.php";
require "../layout/trashList.php";
echo'    
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="http://localhost/proyecto/dev/mvc/resources/js/addList.js"></script>
<script src="http://localhost/proyecto/dev/mvc/resources/js/menu.js"></script>
<script src="http://localhost/proyecto/dev/mvc/resources/js/index.js"></script>
</html>';
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/config/config.php';
$close = new Db_connection();
$close->closeConnection();
    }else{
        header('Content-Type: text/html; charset=utf-8');
        header('location:../login/login.php');
    }
}else{
    header('Content-Type: text/html; charset=utf-8');
    header('location:../login/login.php');
}

?>
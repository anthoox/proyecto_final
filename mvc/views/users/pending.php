<?php
session_start();

require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/controller.php';
//Esto es para probar si al cambiar a una dirección directamente deja acceder a la web
if ($_SESSION['user']) {
    if ($_SESSION['user']['rol'] === 2) {
        $result = '';
        //POST para añadir una lista de un usuario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST)) {
                if (isset($_POST['nameList']) or ($_POST['nameList'] != '')) {
                    $list = new UserList();
                    $result = $list->addList($_SESSION['user']['id_user'], $_POST["nameList"]);
                    if ($result) {
                        header("Location: " . $_SERVER['REQUEST_URI']);
                        exit();
                    } else {
                        $result = "La lista " . $_POST["nameList"] . " ya existe.";
                    }
                }
            }
        }

        echo '
        <!DOCTYPE html>
        <html lang="es">';

        require "../layout/head.php";

        echo '

        <body class="d-flex flex-column">';
        require "../layout/headerDesk.php";
        require "../layout/header.php";
        if ($_SESSION['user']['photo'] == "") {
            $photo = "img-user.png";
        } else {
            $photo = $_SESSION['user']['photo'];
        }
        echo '
        <main class="mt-md-5 mt-3 position-relative container-xxl d-flex flex-column flex-md-row ps-3 pe-3 pb-3 main__user h-100"> 
        <nav class="h-100 d-none d-md-flex  justify-content-center w-25 border  shadow border-2  rounded-4 bg-white ps-2 pe-2 me-3">
            <ul class="rounded-4 list-group list-group-flush">
                <li class="mt-1 p-4 d-flex  flex-column justify-content-center align-items-center list-group-item list-group-item-action">
                    <img class="img-user-2 m-2 shadow border border-3 border-primary d-flex justify-content-center align-items-center rounded-circle overflow-hidden " src="/proyecto/mvc/resources/img/img-users/' . $photo . '" alt="imagen de usuario">
                    <a href="./../users/user_profile.php" class="align-self-start mt-3 fs-5 text-decoration-none text-black">Perfil de ' . $_SESSION['user']['name'] . '</a>
                </li>
                <li class="p-4 list-group-item list-group-item-action"><a href="./../users/trash.php" class="fs-5 text-decoration-none text-black">Papelera</a></li>
                <li class="p-4 list-group-item list-group-item-action"><a href="./../users/contact.php" class="fs-5 text-decoration-none text-black">Contacto</a></li>
                <li class="p-4 list-group-item list-group-item-action"><a href="./../users/guide.php" class="fs-5 text-decoration-none text-black">Guía de usuario</a></li>
                <li class="p-4 list-group-item list-group-item-action"><a href="../../controllers/exit.php" class="fs-5 text-decoration-none text-black">Cerrar sesión</a></li>
            </ul>
        </nav>
        <div class="p-2 pe-3 ps-3 w-100 d-flex  align-items-center flex-column shadow border  border-2  rounded-4 overflow-auto" >
            <form id="miForm" class="w-100 d-flex  align-items-center  flex-column flex-sm-row ">
                <div class="pb-2 d-flex w-100 justify-content-around ">
                    <button id="btn-1" class="shadow-sm btn fs-5 d-flex  justify-content-center  align-items-center p-2 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                        Mis listas
                    </button>
                    <button id="btn-2" class="shadow-sm btn fs-5 d-flex  justify-content-center  align-items-center p-2 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                        Próximas
                    </button>
                </div>
                <div class="pb-2 d-flex w-100 justify-content-around ">
                <button id="btn-3" class="shadow-sm btn fs-5 d-flex  justify-content-center  align-items-center p-2 border rounded-4 mt-3 h-100  fw-semibold section__btn--size bg-primary text-white" type="submit">
                    Pendientes
                </button>
                <button id="btn-4" class="shadow-sm btn fs-5 d-flex  justify-content-center  align-items-center p-2 border rounded-4 mt-3 h-100  fw-semibold section__btn--size" type="submit">
                    Completas
                </button>
                </div>
            </form>   

            <section class="p-0 m-0 w-100">
                <ul class="p-0 m-0 mt-3 ">';

        require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/functions.php';

        $lists_items = new UserItems();

        $lists_items = $lists_items->pending($_SESSION['user']['id_user']);

        if ($lists_items) {
            for ($i = 0; $i < sizeof($lists_items); $i++) {
                $item_price = $lists_items[$i]['price'];
                if ($item_price <= 0) {
                    $item_price = '';
                } else {
                    $item_price = $item_price . "€";
                }

                $quantity = 'x' . $lists_items[$i]['quantity'];

                $item_time = $lists_items[$i]['total_time'];
                $item_time = format_time($item_time);

                $notif_date = $lists_items[$i]['alarm_date'];
                if ($notif_date != "0000-00-00 00:00:00") {
                    $notif_date = format_date_time($notif_date);
                } else {
                    $notif_date = '';
                }

                $name_list = new UserList();
                $name_list = $name_list->getNameList($lists_items[$i]['id_list']);

                echo
                    '<li class="shadow-sm align-items-center justify-content-between border border-2 rounded-4 mt-2 ul__li--size li__hover d-flex">
                            <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike"
                                ';
                if ($lists_items[$i]['is_check'] == 1) {
                    echo "checked";
                }
                echo '
                                >
                            </div>
                            <div class="position-relative w-100 h-100">
                                <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                                    <div>                    
                                        <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">' . $item_price . '</span>
                                        <span class="fw-semibold ms-1 mb-2 m-0 p-0 fs-6">' . $quantity . '</span>
                                    </div>
                                    <div class="w-100 ul__li__div--scroll">
                                        <p class="p-0 m-0 fs-5 fw-semibold " id="textToStrike"><span class="fs-5 fw-bold ">' . $name_list['list_name'] . "</span><span class='fs-5 fw-bold text-secondary'> > </span>" . $lists_items[$i]['item_name'] . '</p>
                                    </div>                                        
                                    <div class="d-flex align-items-center  li__div__icon">';
                if ($item_time) {
                    echo
                        '<i class="w-semibold mb-1  la-lg las la-stopwatch"></i>
                                            <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">' . $item_time . '</span>';
                    if ($notif_date) {
                        echo
                            '<i class="w-semibold mb-1 ms-2 la-lg las la-bell"></i>
                                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">' . $notif_date . '</span>';
                    }
                } else {
                    if ($notif_date) {
                        echo
                            '<i class="w-semibold mb-1 la-lg las la-bell"></i>
                                                <span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6">' . $notif_date . '</span>';
                    }
                }
                ;

                echo
                    '</div>
                                </div>
                            </div>
                        </li>';
            }
        } else {
            $_SESSION['error_message']['loadLists'] = "No tiene próximas tareas";
            echo
                '
                        <li class="d-flex  align-items-center justify-content-between mt-5">
                            <div class="position-relative w-100 h-100">
                                <div class="p-0 ps-3 d-flex  m-0 form-check h-100 justify-content-center align-items-center w-100">        
                                    <p class="p-0 m-0 fs-5 fw-semibold text-muted" id="textToStrike">' . $_SESSION['error_message']['loadLists'] . '</p>
                                </div>
                            </div>     
                        </li>
                        ';
        }

        echo '
            </ul>
            
        </section>
        
        <button class="me-1 btn btn-secondary fs-5 text-light d-flex justify-content-center align-items-center p-1 shadow button border rounded-4 button__add_list">
        <i class="me-1 la-ms las la-plus"></i>Lista</button>
        </div>
    </main>
    <p class="fs-5 fw-bold text-primary text-center position-absolute top-50 start-50 translate-middle p-flotante">' . $result . '</p>';

        require "menu.php";
        require "../layout/addList.php";
        $close = new Db_connection();
        $close->closeConnection();
        echo '    
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="http://localhost/proyecto/mvc/resources/js/addList.js"></script>
<script src="http://localhost/proyecto/mvc/resources/js/menu.js"></script>
<script src="http://localhost/proyecto/mvc/resources/js/index.js"></script>
</html>';
    } else {
        header('Content-Type: text/html; charset=utf-8');
        header('location:../login/login.php');
    }
} else {
    header('Content-Type: text/html; charset=utf-8');
    header('location:../login/login.php');
}

?>
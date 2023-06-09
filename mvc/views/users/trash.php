<?php
session_start();

require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/controller.php';
require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/functions.php';
if ($_SESSION['user']) {
    if ($_SESSION['user']['rol'] === 2) {
        $user_items = new UserItems();
        $lists = new UserList();
        $user_list = $lists->trash($_SESSION['user']['id_user']);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['accept'])) {
                // Llamar a la función en el controlador para restuarar el elemento
                $newName = new UserList();
                $result = $newName->editList($_POST['id_list'], 'trash', 0);
                if ($result) {
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit();
                }
            }


            if (isset($_POST['acceptDel'])) {
                // Llamar a la función en el controlador para eliminar la lista
                $deleteList = new UserList();
                $result = $deleteList->deleteList($_POST['id_list'], $_SESSION['user']['id_user']);
                if ($result) {
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit();
                }
            }
        }
        echo
            '<!DOCTYPE html>
    <html lang="es">';

        require "../layout/head.php";

        echo '
    <body class="d-flex flex-column">';

        echo
            '
        <header class="d-md-none container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3 shadow" >
            <div class=" d-flex justify-content-between align-items-center header__cnt">
                <div class="d-flex align-items-center">
                    <a href="../users/index.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-5">Atras</span>
                </div>
                <h1 class="m-0 fs-2 fw-semibold">Papelera</h1>
            </div>
        </header>

        <header class="d-none d-md-block container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3 shadow " >
            <div class=" d-flex justify-content-between align-items-center ">
                <div class="d-flex align-items-center">
                    <a href="../users/index.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-4">Atras</span>
                </div>
                <h1 class="m-0 fs-2 fw-semibold">Papelera</h1>
                <div>
                    <img class="logo" src="http://localhost/proyecto/mvc/resources/img/logo.svg" alt="logo web" >
                </div>
            </div>
        </header>

  

        <main class="container-xxl mt-2 mt-md-5  d-flex flex-column ps-3 pe-3 pb-3 main__user"> 
        <section class="p-0 m-0"> 
            <ul class="p-0 m-0">';
        if ($user_list) {
            for ($i = 0; $i < (sizeof($user_list)); $i++) {

                $items_check = $user_items->trashItemsChecked($user_list[$i]['id_list']);
                $items = $user_items->itemsUser('id_list', $user_list[$i]['id_list']);
                if ($items) {
                    $items = $items['rows'];
                } else {
                    $items = 0;
                }

                if ($items_check == false) {
                    $items_check['items'] = 0;
                }
                echo
                    '
                    <li class="shadow-sm align-items-center justify-content-between border border-2 rounded-4 mt-2 ul__li--size li__hover d-flex">
                        <div class="position-relative w-75 h-100">
                            <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end w-100">
                                <div class="w-100 ul__li__div--scroll">
                                <form>
                                    <p class="text-muted p-0 m-0 fs-5 fw-bold " id="textToStrike">' . $user_list[$i]['list_name'] . '</p>
                                    <p class="d-none ">' . $user_list[$i]['id_list'] . '</p>
                                </form>
                                </div>
                                <div class="d-flex align-items-center  li__div__icon">
                                    <i class="text-muted mb-1 la-lg las la-check-circle"></i><span class="text-muted fw-semibold mb-1 ms-2 m-0 p-0 fs-6 ">' . $items_check['items'] . '/' . $items . '</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between ">
                            <div class="d-flex ">
                                <button class="mt-0 btn btn-link text-black "><i class="la-2x las la-undo-alt icon__restList"></i></button> 
                                <button class="mt-0 btn btn-link text-black"><i class="la-2x las la-trash-alt icon__delList"></i></button>
                            </div>            
                        </div>
                    </li>
                </ul>';
            }
        } else {
            $_SESSION['error_message']['loadLists'] = "Papelera vacia";
            echo '
                <li class="d-flex  align-items-center justify-content-between mt-5">
                    <div class="position-relative w-100 h-100">
                        <div class="p-0 ps-3 d-flex  m-0 form-check h-100 justify-content-center align-items-center w-100">        
                            <p class="p-0 m-0 fs-5 fw-semibold text-muted" id="textToStrike">' . $_SESSION['error_message']['loadLists'] . '</p>
                        </div>
                    </div>     
                </li>
            </ul>';
        }

        $close = new Db_connection();
        $close->closeConnection();
        echo '
        </section>';
        require "../layout/restList.php";
        require "../layout/deleteList.php";
        echo '
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="http://localhost/proyecto/mvc/resources/js/rest-del.js"></script>
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
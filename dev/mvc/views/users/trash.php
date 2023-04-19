<?php
    session_start();

    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/functions.php';
    if($_SESSION['user']){
        if($_SESSION['user']['rol'] === 2){
            $user_items = new UserItems();
            $lists = new UserList();
            $user_list = $lists->trash($_SESSION['user']['id_user']);

            
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(isset($_POST['accept'])) {
                    // Llamar a la función en el controlador para restuarar el elemento
                    $newName = new UserList();
                    $result = $newName->editList($_POST['id_list'], 'trash',0 );
                    if($result){
                        header("Location: " . $_SERVER['REQUEST_URI']);
                        exit();
                    } 
                }
            }
    echo
    '<!DOCTYPE html>
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
        



        echo
        '
        <header class="container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3" >
            <div class=" d-flex justify-content-between align-items-center header__cnt">
                <div class="d-flex align-items-center">
                    <a href="../users/index.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-5">Atras</span>
                </div>
                <h1 class="m-0 fs-2 fw-semibold">Papelera</h1>
            </div>
        </header>
        <main class="container-xxl d-flex flex-column ps-3 pe-3 pb-3 main__user"> 
        <section class="p-0 m-0"> 
            <ul class="p-0 m-0">';
        if($user_list){       
            for($i = 0; $i<(sizeof($user_list)); $i++){            
                
                $items_check = $user_items->trashItemsChecked($user_list[$i]['id_list']);
                $items = $user_items->itemsUser('id_list', $user_list[$i]['id_list']);
                if($items){
                    $items = $items['rows'];
                }else{
                    $items = 0;
                }

                if($items_check == false){
                    $items_check['items'] = 0;
                } 
                echo
                '
                    <li class="d-flex  align-items-center justify-content-between border rounded-4 mt-3 ul__li--size">
                        <div class="position-relative w-75 h-100">
                            <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end w-100">
                                <div class="w-100 ul__li__div--scroll">
                                <form>
                                    <p class="p-0 m-0 fs-4 fw-semibold " id="textToStrike">'.$user_list[$i]['list_name'].'</p>
                                    <p class="d-none ">'.$user_list[$i]['id_list'].'</p>
                                </form>
                                </div>
                                <div class="d-flex align-items-center  li__div__icon">
                                    <i class="mb-1 la-lg las la-check-circle"></i><span class="fw-semibold mb-1 ms-2 m-0 p-0 fs-6 ">'. $items_check['items'] .  '/'. $items . '</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between ">
                            <div class="d-flex ">
                                <button class="mt-0 btn btn-link text-black me-3"><i class="la-2x las la-undo-alt icon__restList"></i></button> 
                                <button class="mt-0 btn btn-link text-black"><i class="la-2x las la-trash-alt icon__delList"></i></button>
                            </div>            
                        </div>
                    </li>
                </ul>';                
            }
        }else{        
            $_SESSION['error_message']['loadLists'] = "Papelera vacia";
            echo'
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
        </section>
        </main>';
        require "../layout/restList.php";
    echo'
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="http://localhost/proyecto/dev/mvc/resources/js/rest.js"></script>
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
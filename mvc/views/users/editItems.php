<?php
session_start();
require_once 'C:/xampp/htdocs/proyecto/mvc/controllers/controller.php';
$result = 'dsd';
if ($_SESSION['user']) {
    if ($_SESSION['user']['rol'] === 2) {

        $date = date("Y-m-d");
        $hour = date("H:i");
        $full_date = $date . "T" . $hour;

        if (isset($_SESSION['id_item']) && !empty($_SESSION['id_item'])) {
            $data_item = new UserItems();
            $data_item = $data_item->itemsUser('id_item', $_SESSION['id_item']);
            if ($data_item) {
                $result = $data_item;
                if ($data_item[0]['alarm_date']) {
                    $notification = $data_item[0]['alarm_date'];
                    $notification = date('Y-m-d H:i', strtotime($notification));
                } else {
                    $notification = '';
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['itemName']) && isset($_POST['quantity']) && isset($_POST['itemPrice']) && isset($_POST['notification']) && isset($_POST['notes'])) {
                        $new_data_item = new UserItems();
                        $new_data_item->editItem('item_name', $_POST['itemName'], $data_item[0]['id_item']);
                        $new_data_item->editItem('quantity', $_POST['quantity'], $data_item[0]['id_item']);
                        $new_data_item->editItem('price', $_POST['itemPrice'], $data_item[0]['id_item']);
                        $new_data_item->editItem('alarm_date', $_POST['notification'], $data_item[0]['id_item']);
                        $new_data_item->editItem('notes', $_POST['notes'], $data_item[0]['id_item']);
                        header("Location: ./itemsList.php");
                        exit();
                    }
                }
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
                                        <h2 class="m-0  fs-2 fw-semibold">Editar</h2>
                                    </div>
                            </header>

                            <header class="d-none d-md-block container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3 p-3 shadow " >
                                <div class=" d-flex justify-content-between align-items-center ">
                                    <div class="d-flex align-items-center">
                                        <a href="../users/itemsList.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-4">Atras</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <h2 class="m-0  fs-2 fw-semibold">Editar</h2>
                                    </div>            
                                </div>
                            </header> 

                            <main class=" mt-md-2 container-xxl d-flex flex-column ps-3 pe-3 pb-3 main__user">
                                <form method="POST" class="row align-items-center mt-3 d-flex flex-column justify-content-center fw-semibold ">
                                    <div class="mt-1 mb-3">
                                        <label for="itemName" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
                                        <input type="text" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="itemNameHelp" value="' . $data_item[0]['item_name'] . '" placeholder="' . $data_item[0]['item_name'] . '" name="itemName">
                                    </div>
                                    <div class="mt-1 mb-3">
                                        <label for="quantity" class="form-label text-muted fs-5 fw-semibold" >Cantidad</label>
                                        <input type="number"  class=" form-control fs-5  p-2" id="exampleInputPassword1" value="' . $data_item[0]['quantity'] . '" placeholder="' . $data_item[0]['quantity'] . '" name="quantity">
                                    </div>
                                    <div class="mt-1 mb-3">
                                        <label for="itemPrice" class="form-label text-muted fs-5 fw-semibold" >Precio</label>
                                        <input type="number" min="0" step="0.01" class=" form-control fs-5  p-2" id="exampleInputPassword1" value="' . $data_item[0]['price'] . '" placeholder="' . $data_item[0]['price'] . '" name="itemPrice">
                                    </div>
                                    <div class="mt-1 mb-3">
                                        <label for="notification" class="form-label text-muted fs-5 fw-semibold" >Notificación</label>
                                        <input type="datetime-local" class=" form-control fs-5  p-2" id="exampleInputPassword1" name="notification" min="' . $full_date . '" value="' . $notification . '">
                                    </div>
                                    <div class="mt-1 mb-3 d-flex flex-column">
                                        <label for="notes" class="form-label text-muted fs-5 fw-semibold" >Notas</label>
                                        <textarea name="notes" maxlength="500" class="w-100 fs-5 form-control textarea-size" aria-label="With textarea" placeholder="Añade tus notas aquí">' . $data_item[0]['notes'] . '</textarea>
                                    </div> 
                                    <div class="mt-5 mb-4 d-flex justify-content-center align-items-center ">
                                        <div class="d-flex flex-column align-items-center me-4">
                                        <a class="text-black text-decoration-none" href="./timing.php"><i class="la-3x las la-hourglass"></i></a>
                                            <p class="fs-5">Temporizar</p>
                                        </div>
                                        <div class="d-flex flex-column align-items-center ms-4">
                                            <i class="la-3x las la-trash-alt"></i>
                                            <p class="fs-5">Eliminar</p>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn__save border  btn btn-secondary text-white border p-1 fs-5  col-3 ">Guardar</button>
                                
                                </form>
                            </main>
                        </body>
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
                        <script src="http://localhost/proyecto/mvc/resources/js/items.js"></script>
                    </html>';
                $close = new Db_connection();
                $close->closeConnection();
            } else {
                echo '
                    <!DOCTYPE html>
                        <html lang="es">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Principal</title>
                            <!-- Link Bootstrap compilado -->
                            <link rel="stylesheet" href="http://localhost/proyecto/mvc/resources/css/bootstrap.css">
                            <!-- Iconos de iconos8 -->
                            <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
                            <link rel="preconnect" href="https://fonts.googleapis.com">
                            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                            <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
                            <!-- Mis estilos -->
                            <link rel="shortcut icon" href="http://localhost/proyecto/mvc/resources/img/simple_logo.ico" />
                            <link rel="stylesheet" href="http://localhost/proyecto/mvc/resources/css/style.css">
                        </head>

                        <body class="d-flex flex-column">
                            <header class="container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3" >
                                <div class=" d-flex justify-content-between align-items-center header__cnt">
                                    <div class="d-flex align-items-center">
                                        <a href="../users/itemsList.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-5">Atras</span>
                                    </div>
                                    <h2 class="m-0  fs-2 fw-semibold">Editar</h2>
                                </div>
                            </header>
                            <main class="container-xxl d-flex flex-column ps-3 pe-3 pb-3 main__user">
                                <p class="fs-4 text-center">No se ha podido cargar los datos</p>
                            </main>                        
                    </body>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
                    <script src="http://localhost/proyecto/mvc/resources/js/items.js"></script>
                    </html>';
            }
        }
    }
}
?>
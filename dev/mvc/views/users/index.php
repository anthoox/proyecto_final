<?php 
 session_start();
 require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
 

?>
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

<body class="d-flex flex-column">
    <?php
        require "../layout/header.php";
    ?>
    <main class="container-xxl d-flex flex-column ps-3 pe-3 pb-3 main__user">     
            <ul class="p-0 m-0">
                <li class="d-flex justify-content-between align-items-center p-2 pt-3 pb-3 border mt-3">
                    <p class="fs-4 m-0">Lista 1</p>
                    <div class="d-flex align-items-center">
                        <p class="fs-4 m-0">1/10</p>
                        <i class=" la-2x las la-trash-alt"></i>
                    </div>
                </li>

                <li class="d-flex  align-items-center justify-content-between border rounded mt-3 ul__li--size">
                    <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike">
                    </div>
                    <div class="position-relative w-100 h-100">
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                            <p class="p-0 m-0 fs-4" id="textToStrike">Tareas</p>
                            <div class="d-flex align-items-center  li__div__icon">
                                <i class="mb-2 la-lg las la-check-circle"></i><span class="mb-2 ms-2 m-0 p-0 fs-6">0/10</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between ">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        <div class="d-flex justify-content-center align-self-end"><i class="la-2x las la-plus-circle"></i></div>
                    </div>
                </li>

                <li class="d-flex  align-items-center justify-content-between border rounded mt-3 ul__li--size">
                    <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike">
                    </div>
                    <div class="position-relative w-100 h-100">
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                            <p class="p-0 m-0 fs-4" id="textToStrike">Tareas</p>
                            <div class="d-flex align-items-center  li__div__icon">
                                <i class="mb-2 la-lg las la-check-circle"></i><span class="mb-2 ms-2 m-0 p-0 fs-6">0/10</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between ">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        <div class="d-flex justify-content-center align-self-end"><i class="la-2x las la-plus-circle"></i></div>
                    </div>
                </li>

                <li class="d-flex  align-items-center justify-content-between border rounded mt-3 ul__li--size">
                    <div class="d-flex justify-content-center align-items-center m-0 form-check border-end h-100  ul__li___div--size">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" data-target="textToStrike">
                    </div>
                    <div class="position-relative w-100 h-100">
                        <div class="p-0 ps-3 d-flex flex-column m-0 form-check h-100 justify-content-end">
                            <p class="p-0 m-0 fs-4" id="textToStrike">Tareas</p>
                            <div class="d-flex align-items-center  li__div__icon">
                                <i class="mb-2 la-lg las la-check-circle"></i><span class="mb-2 ms-2 m-0 p-0 fs-6">0/10</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column p-1 pe-3 h-100 justify-content-between">
                        <div class="d-flex ">
                            <div class="me-3"><i class="la-2x las la-pen"></i></div> 
                            <div><i class="la-2x las la-trash-alt"></i></div>
                        </div>
                        <div class="d-flex justify-content-center align-self-end"><i class="la-2x las la-plus-circle"></i></div>
                    </div>
                </li>
                
            </ul>
       
        <button class="btn btn-secondary fs-5 text-light d-flex justify-content-center align-items-center p-1 button button__add_list">
            <i class="la-sm las la-plus"></i>Lista</button>
    </main>
    <?php 
    echo "<br><br><br><br><br><br><br><br>";
     echo $_SESSION['id'];
    $p = new Lists();
    $r = $p->getActiveLists('id_user', $_SESSION['id']);
    
    print_r($r);
    // $prueba = new userList();
    // $prueba->listar($_SESSION['id']);
    // print_r($prueba);
     ?>
</body>

</html>
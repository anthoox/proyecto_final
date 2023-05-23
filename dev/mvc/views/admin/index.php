<?php 
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
session_start();
//Esto es para probar si al cambiar a una dirección directamente deja acceder a la web
if($_SESSION['user']){
    if($_SESSION['user']['rol'] === 1){

$msg_register = '';
$msg_search = '';
$result = '';
$_SESSION['user_data'] = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST)){        
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            if(($_POST['name'] != '') || ($_POST['email'] != '') || ($_POST['password'] != '')){
                $new_user = new LoginController();
                $result = $new_user->addUser($_POST['name'], $_POST['email'], $_POST['password']);
                if(!$result){
                    $msg_register = "La cuenta de correo ya esta registada en el sistema";
                }else{
                    $msg_register = "Usuario " . $_POST['name'] . " registrado con éxito";
                }

            }
        }
    }
    
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST)){        
        if(isset($_POST['emailSearch'])) {
            if(($_POST['emailSearch'] != '')){
                $new_user = new LoginController();
                $result = $new_user->searchUser('email',$_POST['emailSearch']);
                if(!$result){
                    $msg_search = "El email no esta registrado en el sistema";
                }else{
                    $_SESSION['user_data'] = $result;
                    header('Content-Type: text/html; charset=utf-8');
                    header('location:../admin/edit_user.php'); 
                }
                
            }
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
    <title>Registro usuario</title>
    <!-- Link Bootstrap compilado -->
    <link rel="stylesheet" href="http://localhost/proyecto/dev/mvc/resources/css/bootstrap.css">
    <!-- Iconos de iconos8 -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="http://localhost/proyecto/dev/mvc/resources/img/simple_logo.ico" />
    <!-- Mis estilos -->
    <link rel="stylesheet" href="http://localhost/proyecto/dev/mvc/resources/css/style.css">
</head>

<body id="head" class="d-flex flex-column justify-content-between p-3 ">';

    require "../layout/header.php";
    require "../layout/headerDesk.php";

    if($_SESSION['user']['photo'] == ""){
        $photo = "img-user.png";
    }else{
        $photo = $_SESSION['user']['photo'];
    }
        

    echo'
    <main class="mt-md-5 mt-3 position-relative  container-xxl d-flex flex-column flex-md-row ps-3 pe-3 pb-3 main__user">
        <nav class="h-100 d-none d-md-flex  justify-content-center w-25 border  shadow border-2  rounded-4 bg-white ps-2 pe-2 me-3">
            <ul class=" rounded-4 list-group list-group-flush pt-1">
                <li class="p-4 d-flex  flex-column justify-content-center align-items-center list-group-item list-group-item-action">
                    <img class="img-user m-2 shadow border border-3 border-primary d-flex justify-content-center align-items-center rounded-circle overflow-hidden " src="/proyecto/dev/mvc/resources/img/logo2.png" alt="imagen de usuario">
                    
                </li>
                <li class="p-4 list-group-item list-group-item-action"  ><a  href="#" class="fs-5 text-decoration-none text-black">Hesk</a></li>
                <li class="p-4 list-group-item list-group-item-action"><a href="../../controllers/exit.php" class="fs-5 text-decoration-none text-black">Cerra sesión</a></li>
            </ul>
        </nav>

        <div class="h-100 p-2 pe-3 ps-3 w-100 d-flex  align-items-center flex-column shadow border  border-2  rounded-4 overflow-auto" >
            <h2 class=" mt-3 text-success title title__h2 fw-bolder w-100">
                Alta de <br>
                Usuarios
            </h2>
            <form method="POST" class="w-100 row align-items-center d-flex flex-column justify-content-center">
                <div class="mb-3">
                    <label for="name" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
                    <input type="text" class="form-control fs-5  p-2 form__input"  aria-describedby="nameHelp" placeholder="Nombre" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                    <input type="email" class="form-control fs-5  p-2 form__input"  aria-describedby="emailHelp" placeholder="correo@correo.com" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-muted fs-5 fw-semibold" >Contraseña</label>
                    <input type="password" class=" form-control fs-5  p-2"  placeholder="Contraseña" name="password">
                </div>';

                if($msg_register){
                    echo 
                    '<p class="text-center  m-0 text-secondary fs-5 fw-semibold form__parraf--error ">' . $msg_register . '</p>';
                }
                
                echo ' 
                <button type="submit" class="mt-3 mb-5 btn btn-secondary text-white border mt-1 p-1 fs-5 col-3 col-lg-2">Registrar</button>
            </form>
            
            <hr class=" w-100 m-0 mb-3">
            <h2 class=" w-100 mt-4 text-success title title__h2 fw-bolder ">
                Buscar <br>
                Usuario
            </h2>
            
            <form method="POST" class="w-100 row d-flex flex-column justify-content-center align-items-center">    
                <div class="mb-3">
                    <label for="emailSearch" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                    <input name="emailSearch"  type="email" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
                </div>';

                if($msg_search){
                    echo
                    '<p class="text-center  m-0 text-secondary fs-5 fw-semibold form__parraf--error ">'. $msg_search .'</p> ';
                }  
                echo' 
                <button type="submit" class="mt-3 mb-5  btn btn-primary  text-white border mt-1 p-1 fs-5 col-3 col-lg-2" value="search">Buscar</button>

            </form>';
            
            require "users_list.php";

            echo'
        </div>
    </main>';
    require "menu.php";
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/config/config.php';
    $close = new Db_connection();
    $close->closeConnection();
    echo'
</body>
<script src="http://localhost/proyecto/dev/mvc/resources/js/menu.js"></script>

</html>';

    }else{
        header('Content-Type: text/html; charset=utf-8');
        header('location:../login/login.php');
    }
}else{
    header('Content-Type: text/html; charset=utf-8');
    header('location:../login/login.php');
}
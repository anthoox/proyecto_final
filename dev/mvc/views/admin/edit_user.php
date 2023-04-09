<?php
session_start();

require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';

if($_SESSION['user']){
    if($_SESSION['user']['rol'] === 1){

$msg_register = '';
$msg_search = '';
$result = '';


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST)){        
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            if(($_POST['name'] != '') || ($_POST['email'] != '') || ($_POST['password'] != '')){
                $new_user = new LoginController();
                $result = $new_user->addUser($_POST['name'], $_POST['email'], $_POST['password']);
                if(!$result){
                    $msg_register = "La cuenta de correo ya esta registada en el sistema";
                }else{
                    $msg_register = "Usuario " . $_POST['name'] . "registrado con éxito";
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
                $result = $new_user->searchUser($_POST['emailSearch']);
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

echo'
<!DOCTYPE html>
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

<body class="d-flex flex-column justify-content-between p-3">';
        $rol;
        if($_SESSION['user_data']['rol'] == 1){
            $rol = "administrador";
        }else if($_SESSION['user_data']['rol'] == 2){
            $rol = "usuario";
        }
        echo
        '<header class="container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3" >
        <div class=" d-flex justify-content-between align-items-center header__cnt">
            <div class="d-flex align-items-center">
                <a href="../admin/index.php"><i class="la-2x las la-angle-left"></i></a><span class="ms-2 fs-5">Atras</span>
            </div>
            <span class="fw-semibold fs-3 align-self-start mt-3">Perfil: '.$rol.'</span>
        </div>
    </header>
        <main class="container-fluid d-flex  flex-column mb-5 position-relative main__trash">
        
            <h2 class="mt-3 text-success title title__h2 fw-bolder ">
                Editar <br>
                Usuario
            </h2>
            
        
        <form class=" d-flex flex-column justify-content-center  form">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
                <input type="text" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$_SESSION['user_data']['name'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                <input type="email" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="'.$_SESSION['user_data']['email'].'">
            </div>
            <div >
            <label for="" class=" form-label text-muted text-decoration-none fs-5 fw-semibold">Rol</label>
            <select class="form-select fs-5  p-2" aria-label="Default select example">
                <option selected>Seleccionar el rol</option>
                <option class="fs-5" value="1">Usuario</option>
                <option class="fs-5" value="2">Administrador</option>
            </select>
            </div>
            <div class="d-flex  flex-wrap justify-content-between align-items-center ">
                <button type="submit" class="btn btn-primary text-white border mt-5 p-1 fs-5 ps-2 pe-2">Recuperar cuenta</button>
                <button type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 ps-2 pe-2">Borrar listas</button>
                <button type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 ps-2 pe-2">Vaciar papelera</button>
                <button type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 ps-2 pe-2">Borrar usuario</button>
            </div>
            <button type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 button">Guardar</button>
            
        </form>
    </main>
</body>
</html>'
;
    }else{
        header('Content-Type: text/html; charset=utf-8');
        header('location:../login/login.php');
    }
}else{
    header('Content-Type: text/html; charset=utf-8');
    header('location:../login/login.php');
}


?>
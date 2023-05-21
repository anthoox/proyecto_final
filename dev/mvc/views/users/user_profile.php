<?php
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
session_start();
$msg_edited = '';
$photo = $_SESSION['user']['photo'];
$name = $_SESSION['user']['name'];
if(isset($_SESSION['user'])){
    if($_SESSION['user']['rol'] == 1){
        header('Content-Type: text/html; charset=utf-8');
        header('location:../admin/index.php');
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST)){        
        //Código para modificar el nombre de usuario.
        if(isset($_POST['name'])) {
            $validator = new LoginController();      
            $result = $validator->edit_user('name',$_SESSION['user']['id_user'], $_POST['name']);
            if(!$result){                    
                $msg_edited = '<p class="ms-2 mt-4 fs-5 m-0">No se ha podido modificar.</p>';
            }else{
                $name = $validator->searchUser('email', $_SESSION['user']['email']);
                $name = $name[0]['name'];
                $_SESSION['user']['name'] = $name;
                $msg_edited = '<p class="ms-2 mt-4 fs-5 m-0 text-secondary">Modificación realizada.</p>';
            }
        }

        if(isset($_POST['saveData'])){
            $img = $_FILES['photo']['name'];
            if(isset($img) && $img != ''){
                $type = $_FILES['photo']['type'];
                $temp = $_FILES['photo']['tmp_name'];
                //Si no es una imagen gif, o
                if(!(strpos($type, 'gif') || strpos($type, 'jpeg') || strpos($type, 'png') || strpos($type, 'webp') || strpos($type, 'jpg'))){
                    $msg_edited = "Solo se permiten archivos tipo: jpeg, pnp, webp, jpg";
                }else{
                    $validator = new LoginController();      
                    $result = $validator->edit_user('photo',$_SESSION['user']['id_user'], $img);
                    if(!$result){                    
                        $msg_edited = '<p class="ms-2 mt-4 fs-5 m-0">No se ha podido guardar la foto.</p>';
                    }else{
                        $name = $validator->searchUser('email', $_SESSION['user']['email']);
                        $_SESSION['user']['photo'] = $name[0]['photo'];
                        $name = $name[0]['name'];
                        move_uploaded_file($temp, 'C:/xampp/htdocs/proyecto/dev/mvc/resources/img/img-users/' . $img);
                        $msg_edited = '<p class="ms-2 mt-4 fs-5 m-0 text-secondary">Modificación de foto realizada.</p>';
                    }
                }
            }else{
                $msg_edited = "error FILES";
            }
            
        }else{
            $msg_edited = "error isset POST";
        }
    }
}


$registration_date = date('d-m-Y',strtotime($_SESSION['user']['registration_date']));

if($_SESSION['user']['photo'] == ""){
    $photo = "img-user.png";
}else{
    $photo = $_SESSION['user']['photo'];
}

echo'
<!DOCTYPE html>
<html lang="es">
<!-- añadir validación de sesion. -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
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

<body class="d-flex flex-column justify-content-between p-3 ">
    <header class="container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3" >
        <div class=" d-flex justify-content-between align-items-center header__cnt">
            <div class="d-flex align-items-center">
                <a href="../users/index.php"><i class="text-black la-2x las la-angle-left"></i></a><span class="ms-2 fs-5">Atras</span>
            </div>
            <h1 class="m-0 fs-2 fw-semibold">Perfil de usuario</h1>
        </div>
    </header>
    <main class="container-xxl d-flex flex-column align-items-center pt-4 main__user">
        <figure class="figure mb-4 shadow border border-3 border-primary d-flex justify-content-center align-items-center rounded-circle overflow-hidden m-0">
            <img src="http://localhost/Proyecto/dev/mvc/resources/img/img-users/'.$photo.'" class="w-100 h-100 object-fit-cover m-0" alt="Descripción de la imagen">
        </figure>
   
        <form  method="POST" class=" d-flex flex-column justify-content-center fw-semibold" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="name" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre de usuario</label>
                <input type="text" class="mb-3 form-control fs-5 fw-semibold p-2 form__input" id="exampleInputEmail1"  value="' . $name . '" name="name">
            </div>
            <div class="form-group">
                <label for="photo" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Cambiar de foto</label>
                <input name="photo" class="mb-3 form-control form-control-lg fs-5  p-2 form__input" id="formFileLg" type="file">
            </div>
            <section class="p-2 d-flex justify-content-between">
                <p class="fs-5">Fecha de alta</p>
                <p class=" fs-5">' . $registration_date . '</p>
            </section>
            <section class="p-2 d-flex justify-content-between align-items-center">
                <p class="fs-5 m-0">Descargar datos</p>
                <button class="shadow btn border rounded-4 btn-primary text-white border p-1 fs-5 button m-0">Descargar</button>
            </section>';
            if($msg_edited){
                
                echo'
                <section class="d-flex justify-content-center">
                <p class="mt-1 fs-5 m-0 text-secondary">'.$msg_edited.'</p>
                </section>';
            
            }
            echo'         
            <button type="submit" class="shadow border rounded-4 btn mt-4 btn-secondary fs-5 text-light p-1 button" name="saveData" >Guardar</button>
        </form>
    </main>
</body>

</html>';
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/config/config.php';
$close = new Db_connection();
$close->closeConnection();
?>
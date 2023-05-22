<?php
session_start();

require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';

if($_SESSION['user']){
    if($_SESSION['user']['rol'] === 1){

    $msg_edit = '';
    $error_edit = '';
    $result = '';
    $rola = '';
    $result2 = '';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(!empty($_POST)){        

            if(isset($_POST['name']) && isset($_POST['email'])) {
                
                if(($_POST['name'] != '') || ($_POST['email'] != '')){                    
                    $user_data = new LoginController();
                    $rol;
                    
                    //Si no existen datos de sesión de usuario
                    if(!$_SESSION['user_data']){
                        
                        if($_POST['role'] == "Seleccionar el rol"){
                        
                            $rol = $_GET['rol'];
                        }else{
                            $result = $user_data->searchUser('id_user', $_GET['id']);                    
                            if($result[0]['rol'] == $_POST['role']){
                                $rol = $result[0]['rol'];
                            }else{
                                $rol = $_POST['role'];
                            }
                        }
                        $result = $user_data->admin_edit_user($_GET['id'], $_POST['name'], $_POST['email'], $rol);
                        if(!$result){
                            $error_edit = 1;
                            $msg_edit = "No se ha podido realizar la edición";
                        }else{
                            $error_edit = 0;
                            $msg_edit = "Edición realizada con éxito";
                            $result = $user_data->searchUser('id_user', $_GET['id']);
    
                            if(!$_SESSION['user_data']){
                                $_GET['name'] = $result[0]['name'];
                                $_GET['email'] = $result[0]['email'];
                                $_GET['rol'] = $result[0]['rol'];
                            }else{
                                $_SESSION['user_data']['name'] = $result[0]['name'];
                                $_SESSION['user_data']['email'] = $result[0]['name'];
                                
                            }
                        }

                        //Vaciar papelera del usuario
                        if(isset($_POST['emptyTrash'])){
                            $trash = new UserList();
                            $result2 = $trash->emptyTrash($_GET['id']);
                            if($result2){
                                $result2 = "Papelera vaciada";
                            }else{
                                $result2 = "No se ha podido vaciar la papelera";
                            }

                        }

                        //Borrar listas del usuario
                        if(isset($_POST['delUserLists'])){
                            $lists = new UserList();
                            $result2 = $lists->deleteUserList($_GET['id']);
                            if($result2){
                                $result2 = "Listas eliminadas";
                            }else{
                                $result2 = "No hay listas para eliminar";
                            }
                        }
                        
                        
                        //Eliminar usuario
                        if(isset($_POST['delUser'])){
                            $user = new LoginController();
                            $result2 = $user->deleteUser($_GET['id']);
                            if($result2){
                                $result2 = "Usuario eliminado";
                                header('location:../admin/index.php');
                            }else{
                                $result2 = "No se ha podido eliminar al usuario";
                                header('location:../admin/index.php');
                            }
                        }


                    //Si existen datos de sesión de usuario
                    }else{
                        

                        if($_POST['role'] == "Seleccionar el rol"){
                        
                            $rol = $_SESSION['user_data'][0]['rol'];
                        }else{
                            $result = $user_data->searchUser('id_user', $_SESSION['user_data'][0]['id_user']);                    
                            if($result[0]['rol'] == $_POST['role']){
                                $rol = $result[0]['rol'];
                            }else{
                                $rol = $_POST['role'];
                            }
                        }
                        
                        
                        $result = $user_data->admin_edit_user($_SESSION['user_data'][0]['id_user'], $_POST['name'], $_POST['email'], $rol);
                        if(!$result){
                            $error_edit = 1;
                            $msg_edit = "No se ha podido realizar la edición";
                        }else{
                            $error_edit = 0;
                            $msg_edit = "Edición realizada con éxito";
                            $result = $user_data->searchUser('id_user', $_SESSION['user_data'][0]['id_user']);

                            $_SESSION['user_data'][0]['name'] = $result[0]['name'];
                            $_SESSION['user_data'][0]['email'] = $result[0]['email'];
                            $_SESSION['user_data'][0]['rol'] = $rol;
                        }

                        //Vaciar papelera del usuario
                        if(isset($_POST['emptyTrash'])){
                            $trash = new UserList();
                            $result2 = $trash->emptyTrash($_SESSION['user_data'][0]['id_user']);
                            if($result2){
                                $result2 = "Papelera vaciada";
                            }else{
                                $result2 = "No se ha podido vaciar la papelera";
                            }

                        }

                        //Borrar listas del usuario
                        if(isset($_POST['delUserLists'])){
                            $result2 ="borrar";
                            $lists = new UserList();
                            $result2 = $lists->deleteUserList($_SESSION['user_data'][0]['id_user']);
                            if($result2){
                                $result2 = "Listas eliminadas";
                            }else{
                                $result2 = "No hay listas para eliminar";
                            }
                        }


                        //Eliminar usuario
                        if(isset($_POST['delUser'])){
                            $user = new LoginController();
                            $result2 = $user->deleteUser($_SESSION['user_data'][0]['id_user']);
                            if($result2){
                                $result2 = "Usuario eliminado";
                                header('location:../admin/index.php');
                            }else{
                                $result2 = "No se ha podido eliminar al usuario";
                                header('location:../admin/index.php');
                            }
                        }
                    }
                }
            }
        }
    }


if($_SESSION['user_data']==0){
    $rol;
    if($_GET['rol'] == 1){
        $rol = "administrador";
    }else if($_GET['rol'] == 2){
        $rol = "usuario";
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

    <body class="d-flex flex-column justify-content-between p-3">
        <header class="container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3" >
            <div class=" d-flex justify-content-between align-items-center header__cnt">
                <div class="d-flex align-items-center">
                    <a href="../admin/index.php"><i class="la-2x las la-angle-left"></i></a><span class="ms-2 fs-5">Atras</span>
                </div>
                <span class="fw-semibold fs-3 align-self-start mt-3">Tipo de usuario: '.$rol.'</span>
            </div>
        </header>
            <main class="container-fluid d-flex  flex-column mb-5 position-relative main__trash">
            
                <h2 class="mt-3 text-success title title__h2 fw-bolder ">
                    Editar <br>
                    Usuario
                </h2>
                            
                <form method="POST" class="row d-flex flex-column justify-content-center align-items-center form">

                    <div class="mb-3">
                        <label for="name" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
                        <input type="text" class="form-control fs-5 fw-semibold p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$_GET['name'].'" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                        <input type="email" class="form-control fs-5 fw-semibold p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$_GET['email'].'" name="email">
                    </div>
                    <div >
                    <label for="" class=" form-label text-muted text-decoration-none fs-5 fw-semibold">Rol</label>
                    <select name="role" class="form-select fs-5 fw-semibold p-2" aria-label="Default select example">
                        <option class="fs-5 fw-semibold text-muted" selected>Seleccionar el rol</option>
                        <option class="fs-5 fw-semibold" value="2">Usuario</option>
                        <option class="fs-5 fw-semibold" value="1">Administrador</option>
                    </select>';
                    if($error_edit != ''){
                        if($error_edit == 1){
                            echo '
                            <div class="m-0 mt-3  d-flex justify-content-center align-items-center" id="pruebax">
                            <p class="m-0 text-center fw-bold fs-5 text-secondary ">' . $msg_edit .'</p>
                            </div>';
                        }else{
                            echo '
                            <div class="m-0 mt-3  d-flex justify-content-center align-items-center" id="pruebax">
                            <p class="m-0 text-center fw-bold fs-5 text-secondary ">' . $msg_edit .'</p>
                            </div>';
                        }
                    }                    
                    echo'
                    </div>
                    <div class="row d-flex  flex-wrap justify-content-between align-items-center ">
                        <button type="submit" class="btn btn-primary text-white border mt-5 p-1 fs-5 ps-2 pe-2 col-lg-2 col-5 " name="restoreUser">Recuperación</button>
                        <button type="submit" class="btn btn-primary text-white border mt-5 p-1 fs-5 ps-2 pe-2 col-lg-2 col-5 " name="delUserLists">Borrar listas</button>
                        <button type="submit" class="btn btn-primary text-white border mt-5 p-1 fs-5 ps-2 pe-2 col-lg-2 col-5 " name="emptyTrash">Vaciar papelera</button>
                        <button type="submit" class="btn btn-primary text-white border mt-5 p-1 fs-5 ps-2 pe-2 col-lg-2 col-5 " name="delUser">Borrar usuario</button>
                    </div>
                    <button type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 col-lg-2 col-4">Guardar</button>  ';
                    // $result2 = "sdasfd";
                    var_dump($result2) ;
                    echo'                 
                </form>
        </main>
    </body>
    </html>';
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/config/config.php';
    $close = new Db_connection();
    $close->closeConnection();
}else{
    $rol;
    if($_SESSION['user_data'][0]['rol'] == 1){
        $rol = "administrador";
    }else if($_SESSION['user_data'][0]['rol'] == 2){
        $rol = "usuario";
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

    <body class="d-flex flex-column justify-content-between p-3">
        <header class="container-fluid border-bottom fixed-top z-3 bg-white ps-3 pe-3" >
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
                
            
            <form method="POST"class=" d-flex flex-column justify-content-center  form">
                <div class="mb-3">
                    <label for="name" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
                    <input type="text" class="form-control fs-5 fw-semibold p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$_SESSION['user_data'][0]['name'].'" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                    <input type="email" class="form-control fs-5 fw-semibold p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$_SESSION['user_data'][0]['email'].'" name="email">
                </div>
                <div >
                <label for="role" class=" form-label text-muted text-decoration-none fs-5 fw-semibold">Rol</label>
                <select id="role" name="role" class="form-select fs-5 fw-semibold p-2" aria-label="Default select example">
                    <option class="fs-5 fw-semibold text-muted" selected>Seleccionar el rol</option>
                    <option class="fs-5 fw-semibold" value="2">Usuario</option>
                    <option class="fs-5 fw-semibold" value="1">Administrador</option>
                </select>
                ';
                if($error_edit != ''){
                    if($error_edit == 1){
                        echo '
                        <div class="m-0 mt-3  d-flex justify-content-center align-items-center" id="pruebax">
                        <p class="m-0 text-center fw-bold fs-5 text-secondary ">' . $msg_edit .'</p>
                        </div>';
                    }else{
                        echo '
                        <div class="m-0 mt-3  d-flex justify-content-center align-items-center" id="pruebax">
                        <p class="m-0 text-center fw-bold fs-5 text-secondary ">' . $msg_edit .'</p>
                        </div>';
                    }
                } 
                echo'
                </div>
                <div class="d-flex  flex-wrap justify-content-between align-items-center ">
                    <button type="submit" class="btn btn-primary text-white border mt-5 p-1 fs-5 ps-2 pe-2" name="restoreUser">Recuperar cuenta</button>
                    <button type="submit" type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 ps-2 pe-2" name="delUserLists">Borrar listas</button>
                    <button type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 ps-2 pe-2" name="emptyTrash">Vaciar papelera</button>
                    <button type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 ps-2 pe-2" name="delUser">Borrar usuario</button>
                </div>
                <button type="submit" class="btn btn-secondary text-white border mt-5 p-1 fs-5 button">Guardar</button>     ';
                var_dump($result2) ;
                echo'           
            </form>
        </main>
    </body>
    </html>';
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/config/config.php';
    $close = new Db_connection();
    $close->closeConnection();
    }
}else{
    header('Content-Type: text/html; charset=utf-8');
    header('location:../login/login.php');
    }
}else{
    header('Content-Type: text/html; charset=utf-8');
    header('location:../login/login.php');
}


?>  
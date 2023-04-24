<?php    
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/model/model.php';
    $msg_register='';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST)){        
            //Confirmación de definicion de las variables 
            if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
                $newUser = new Users();

                $result = $newUser->createUser($_POST["name"], $_POST["email"], $_POST["password"]);
                if($result){
                    // header('location:../login/login.php');
                    $msg_register = "La cuenta de correo <span class='fs-5 fw-semibold text-primary'>" . $_POST["email"] . "</span> correctamente en el sistema.";
                }else{
                    $msg_register = "Ese correo electrónico <span class='fs-5 fw-semibold text-primary'>" . $_POST["email"] . "</span> ya se encuentra registrado en el sistema.";
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
    <title>Registro</title>
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
    <header class="container-xxl d-flex justify-content-center align-items-center ">
        <h1 class="text-success title title__h1 align-self-start mt-1 fw-bold">Registro</h1>
    </header>
    <main class="container-xxl d-flex  flex-column mb-5">
        <h2 class="text-success title title__h2 fw-bolder ">
            Lista <br>
            Simple
        </h2>
        <form method="POST" class=" d-flex flex-column justify-content-center fw-semibold form">
            <div class="mb-3">
                <label for="name" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre</label>
                <input type="text" name="name" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                <input type="email" name="email" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-muted fs-5 fw-semibold" >Contraseña</label>
                <input type="password" name="password" class=" form-control fs-5  p-2" id="exampleInputPassword1" placeholder="Contraseña">
            </div>';
            if($msg_register){
                echo'
                <div class="m-0 mb-1 d-flex justify-content-center align-items-center">
                    <p class="m-0 text-center text-secondary fs-5">' . $msg_register . '</p>
                </div>';
            }
            echo'
            <p class="text-center m-0 mb-3"><a class="fw-bold fs-5 text-success text-decoration-none" href="../../index.php">Volver atras</a></p>
            <!-- La clase form__parraf--error solo debe salir si hay un error en el usuario o contraseña -->
            <button type="submit" class="btn btn-secondary text-white border  p-1 fs-5 button">Registrar</button>
        </form>
    </main>';
        //Carga del fichero footer.php
        require "../layout/footer.php";
echo'
</body>

</html>';
?>

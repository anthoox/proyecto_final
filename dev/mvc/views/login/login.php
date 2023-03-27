<?php
    require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
    
    $error;
    $validator = new loginController();
    //Comprobación si POST no esta vacia en el envio del formulario
    if(!empty($_POST)){
        //Confirmación de definicion de las variables 
        if(isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
    
            $validator->startSession($email, $password);
        }
    } 
?>

<!DOCTYPE html> 
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <h1 class="text-success align-self-start mt-1 fw-bold title__h1">Acceso</h1>
    </header>

    <main class="container-xxl d-flex flex-column">
        <h2 class="text-success title title__h2 fw-bolder">
            Lista <br>
            Simple
        </h2>
        <form method="POST" class="d-flex flex-column justify-content-center fw-semibold ">
            <div class="mb-3">
                <label for="email" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Correo</label>
                <input type="email" class="form-control fs-5  p-2 form__input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@ejemplo.com" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-muted fs-5 fw-semibold" >Contraseña</label>
                <input type="password" class=" form-control fs-5  p-2" id="exampleInputPassword1" placeholder="Contraseña" name="password">
            </div>
            <?php
                // if($error){
                //     echo '<div class="m-0 mb-1 d-flex justify-content-center align-items-center" id="pruebax">
                //     <p class="m-0 text-center"><a class="fw-bold fs-5 text-secondary text-decoration-none " href="#" >Usuario o contraseña erroneos<a></p>
                // </div>';
                // }
            ?>
            
            
            <p class="text-center m-0 mb-3"><a class="fw-bold fs-5 text-success text-decoration-none" href="#">¿Olvidaste la contraseña?</a></p>
            <!-- La clase form__parraf--error solo debe salir si hay un error en el usuario o contraseña -->
            <button type="submit" class="btn btn-primary text-white border p-1 fs-5 button">Entrar</button>
        </form>
    </main>
    <?php
        //Carga del fichero footer.php
        require "../layout/footer.php";
    ?>
</body>


</html>
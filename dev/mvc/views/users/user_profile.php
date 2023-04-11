<?php
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/controllers/controller.php';
session_start();
$msg_edited = '';
$photo;
$name = $_SESSION['user']['name'];
$prueba ='';
if(isset($_SESSION['user'])){
    if($_SESSION['user']['rol'] == 1){
        header('Content-Type: text/html; charset=utf-8');
        header('location:../admin/index.php');
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST)){        
        if(isset($_POST['name'])) {
            $validator = new LoginController();      

                $result = $validator->user_edit_user($_SESSION['user']['id_user'], $_POST['name'], $_POST['photo']);
                if(!$result){                    
                    // $_SESSION['error_message']['editUserByUser'] = "No se han podido efectuar los cambios.";
                    $msg_edited = '<p class="ms-2 mt-4 fs-5 m-0">No se ha podido modificar.</p>';
                }else{
                    $name = $validator->searchUser('email', $_SESSION['user']['email']);
                    $name = $name[0]['name'];
                    $msg_edited = '<p class="ms-2 mt-4 fs-5 m-0 text-secondary">Modificación realizada.</p>';
                }
        }
    }
}


// // Obtener información del archivo subido
// $nombreArchivo = $_FILES['imagen']['name']; // Nombre original del archivo
// $tipoArchivo = $_FILES['imagen']['type']; // Tipo de archivo
// $tamanoArchivo = $_FILES['imagen']['size']; // Tamaño del archivo
// $rutaArchivoTemp = $_FILES['imagen']['tmp_name']; // Ruta temporal del archivo

// // Carpeta de destino para guardar la imagen
// $carpetaDestino = '/ruta/de/la/carpeta/destino/';

// // Generar un nombre único para el archivo
// $nuevoNombreArchivo = uniqid() . '_' . $nombreArchivo;

// // Mover el archivo a la carpeta de destino
// if (move_uploaded_file($rutaArchivoTemp, $carpetaDestino . $nuevoNombreArchivo)) {
//     // El archivo se ha movido con éxito, ahora puedes guardar la ruta en la base de datos
//     // y realizar otras acciones necesarias
//     $rutaImagen = $carpetaDestino . $nuevoNombreArchivo;

//     // Aquí puedes guardar la ruta de la imagen en la base de datos
//     // utilizando una consulta SQL con PDO u otro método adecuado

//     // Ejemplo de consulta SQL con PDO
//     $sql = "INSERT INTO tabla (nombre, ruta_imagen) VALUES (?, ?)";
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindValue(1, $nombre, PDO::PARAM_STR);
//     $stmt->bindValue(2, $rutaImagen, PDO::PARAM_STR);
//     $stmt->execute();

//     // Realizar otras acciones necesarias después de guardar la imagen
// } else {
//     // Ocurrió un error al mover el archivo
//     // Manejar el error apropiadamente
// }

$registration_date = date('d-m-Y',strtotime($_SESSION['user']['registration_date']));
if($_SESSION['user']['photo']){
    $photo = $_SESSION['user']['photo'];
}else{
    $photo = "img-user.png";
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
        <figure class=" figure">
            <img src="http://localhost/Proyecto/dev/mvc/resources/img/'.$photo.'" class="border border-primary border-2 figure-img img-fluid rounded rounded-circle" alt="...">
        </figure>
        <form method="POST" class=" d-flex flex-column justify-content-center fw-semibold" >
            <label for="name" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Nombre de usuario</label>
            <input type="text" class="mb-3 form-control fs-5 fw-semibold p-2 form__input" id="exampleInputEmail1"  value="' . $name . '" name="name">
            <label for="photo" class="form-label text-muted text-decoration-none fs-5 fw-semibold">Cambiar de foto</label>
            <input name="photo" class="mb-3 form-control form-control-lg fs-5  p-2 form__input" id="formFileLg" type="file">
            <section class="p-2 d-flex justify-content-between">
                <p class="fs-5">Fecha de alta</p>
                <p class=" fs-5">' . $registration_date . '</p>
            </section>
            <section class="p-2 d-flex justify-content-between align-items-center">
                <p class="fs-5 m-0">Descargar datos</p>
                <button class="btn btn-primary text-white border mt-1 p-1 fs-5 button m-0">Enviar</button>
            </section>';
            if($msg_edited){
                // echo  $msg_edited;
                echo'
                <section class="d-flex justify-content-center">
                <p class="mt-1 fs-5 m-0 text-secondary">Modificación realizada.</p>
                </section>';
            
            }
            echo'         
            <button type="submit" class="btn mt-4 btn-secondary fs-5 text-light p-1 button">Guardar</button>
        </form>
    </main>
</body>

</html>';

?>
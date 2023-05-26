<?php
if($_SESSION['user']['photo'] == ""){
    $photo = "img-user.png";
}else{
    $photo = $_SESSION['user']['photo'];
    
}
echo'
<nav class="d-md-none w-50 rounded-start rounded-4 bg-white ps-2 pe-2 shadow menu">
    <ul class="rounded-4 list-group list-group-flush">
        <li class="d-flex  flex-column justify-content-center align-items-center list-group-item list-group-item-action">
            <img class="img-user m-2 shadow border border-3 border-primary d-flex justify-content-center align-items-center rounded-circle overflow-hidden " src="http://localhost/proyecto/mvc/resources/img/img-users/'.$photo.'" alt="imagen de usuario">
            <a href="./../users/user_profile.php" class="align-self-start mt-1 fs-5 text-decoration-none text-black">Perfil de '.$_SESSION['user']['name'] .'</a>
        </li>
        <li class="list-group-item list-group-item-action"><a href="./../users/trash.php" class="fs-5 text-decoration-none text-black">Papelera</a></li>
        <li class="list-group-item list-group-item-action"><a href="./../users/contact.php" class="fs-5 text-decoration-none text-black">Contacto</a></li>
        <li class="list-group-item list-group-item-action"><a href="./../users/guide.php" class="fs-5 text-decoration-none text-black">Guía de usuario</a></li>
        <li class="list-group-item list-group-item-action"><a href="../../controllers/exit.php" class="fs-5 text-decoration-none text-black">Cerrar sesión</a></li>
        <li class="list-group-item list-group-item-action d-flex justify-content-center align-items-center"><i class="fs-4 la-1x las la-times icon__menu--close"></i></li>
    </ul>
</nav>';
?>
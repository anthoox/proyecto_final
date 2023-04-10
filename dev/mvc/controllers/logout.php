<?php
session_start();
session_destroy();
header('Location: ../views/login/login.php');
//para que no se ejecute otro código despues:
exit;
?>

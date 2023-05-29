<?php
session_start();
session_destroy();
header('Location: ../index.php');
//para que no se ejecute otro código despues:
exit;
?>

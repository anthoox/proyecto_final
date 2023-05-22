<?php
$action = $_POST['action'];
$idItem = $_POST['idItem'];
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/check/check.php';


$check = new Items(); 

// Verificar la acción solicitada y llamar a la función correspondiente del checko
if ($action === 'activate') {
    $result = $check->checkItem($idItem, 1);
    if ($result) {
        echo 'Activación exitosa';
    } else {
        echo 'Error al activar el elemento';
    }
} elseif ($action === 'deactivate') {
    $result = $check->checkItem($idItem, 0);
    if ($result) {
        echo 'Desactivación exitosa';
    } else {
        echo 'Error al desactivar el elemento';
    }
} else {
    echo 'Acción inválida';
}
  
  
?>
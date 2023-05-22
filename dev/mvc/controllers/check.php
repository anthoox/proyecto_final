<?php
$action = $_POST['action'];
$idItem = $_POST['idItem'];
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/model/model.php';


$model = new Items(); 

// Verificar la acción solicitada y llamar a la función correspondiente del modelo
if ($action === 'enable') {
    $result = $model->checkItem($idItem, 1);
    // if ($result) {
    //     echo 'Activación exitosa';
    // } else {
    //     echo 'Error al activar el elemento';
    // }
} elseif ($action === 'disable') {
    $result = $model->checkItem($idItem, 0);
    // if ($result) {
    //     echo 'Desactivación exitosa';
    // } else {
    //     echo 'Error al desactivar el elemento';
    // }
} else {
    echo 'Acción inválida';
}
  
  
?>
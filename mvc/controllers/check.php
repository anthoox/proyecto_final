<?php
$action = $_POST['action'];
$idItem = $_POST['idItem'];
require_once 'C:/xampp/htdocs/proyecto/mvc/model/model.php';


$model = new Items(); 

// Verificar la acción solicitada y llamar a la función correspondiente del modelo
if ($action === 'enable') {
    $result = $model->checkItem($idItem, 1);
} elseif ($action === 'disable') {
    $result = $model->checkItem($idItem, 0);
} else {
    echo 'Acción inválida';
}

?>
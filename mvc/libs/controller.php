<?php 
//Controlador que cargaría las vistas
class Controller{
    
    
    function __construct(){
        $this->view= new View();
    }

    function loadModel($modelo){
        $url = 'model/'.$modelo.'_model.php';

        if(file_exists($url)){
            require $url;

            $model_name = $model.'_model';
            $this->model = new $model_name();
        }
    }
}

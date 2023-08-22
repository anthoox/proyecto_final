<?php 
//Controlador que cargaría las vistas
class Controller{
    public $view;
    public  $model;

    //función constructora para generar la vista
    function __construct(){
        $this->view= new View();
    }

    /**Función para llamar a los modelos */
    function loadModel($modelo){
        $url = 'model/'.$modelo.'_model.php';

        if(file_exists($url)){
            require $url;

            $model_name = $model.'_model';
            $this->model = new $model_name();
        }
    }
}
?>
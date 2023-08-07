<?php 
//Controlador que cargaría las vistas
class Controller{
    private $view;
    private  $model;

    //función constructora para generar la vista
    function __construct(){
        $this->view= new views();
    }

    /**Función para llamar a los modelos */
    function cargarModelo($modelo){
        $url = 'model/'.$modelo.'.php';
        if(file_exists($url)){
            require $url;

            $model_name = $model.'Model';
            $this->model = new $model_name();
        }
    }
}
?>
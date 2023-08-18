<?php

class Errores extends Controller{
    
    function __construct(){
        parent::__construct();
        error_log('Errores::construct -> Inicio de errores');
        $this->render();
    }

    function render(){        
        error_log('Errores::render -> Renderizando vista errores/index');
        $this->view->render('errores/index');
        die();
    }
}
?>
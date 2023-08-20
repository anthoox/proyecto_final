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

    function error_create_list(){
        error_log('Errores::listas -> Error en creación de listas');
        die();
    }
    function error_del_list(){
        error_log('Errores::listas -> Error borrando la lista');
        die();
    }
    function error_update_list(){
        error_log('Errores::listas -> Error en la modificación de la lista');
        die();
    }
}
?>
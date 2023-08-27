<?php 

class View{

    function __construct(){
       
    }

    function render($nombre, $datos = []){
        $this->data = $datos;
        require_once 'C:/xampp/htdocs/proyecto/mvc/views/' . $nombre . '.php';
        
    }
}
?>  
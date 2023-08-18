<?php 

class View{
    
    public $d;//lo dejo como public por ahora.
    function __construct(){
       
    }

    function render($nombre, $datos = []){
        $this->d = $datos;
        require_once 'views/' . $nombre . '.php';
        
    }
}
?>  
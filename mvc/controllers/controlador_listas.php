<?php 

    class Controlador_listas{        
        private $listas;
        public function __construct(){
            require_once 'C:/xampp/htdocs/proyecto/mvc/model/model_usuarios.php';
            $this->listas = new Model_listas();
        }

       
    }
?>
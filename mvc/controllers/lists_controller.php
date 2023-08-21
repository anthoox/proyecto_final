<?php 

    class Controlador_listas extends Controller{        
        public $lists;
        // public $view;
        public $data_user_list;
        
        public function __construct(){
            require_once 'C:/xampp/htdocs/proyecto/mvc/model/lists_model.php';
            $this->lists = new Model_lists();
        }

        public function render(){
            //Aquí lo que se debería de cargar es la vista del usuario y sus listas o por lo menos en el controlador de las listas del usuario
            $this->view->render('users/index');
        }

        /**Método para clean contraseña */
        public function get_userslists($idUser){
           
        }

    }
?>
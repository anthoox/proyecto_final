<?php 

    class Controlador_usuarios extends Controller{        
        public $usuario;
        public $view;
        
        public function __construct(){
            require_once 'C:/xampp/htdocs/proyecto/mvc/model/usuarios_model.php';
            $this->usuario = new Model_usuarios();
        }

        public function render(){
            //Aquí lo que se debería de cargar es la vista del usuario y sus listas o por lo menos en el controlador de las listas del usuario
            $this->view->render('/index');
        }

        /**Método para limpiar contraseña */
        public function limpiar_password($campo){
            //Limpia el valor que entra por el formulario.
            $campo = strip_tags($campo);
            $campo = filter_var($campo, FILTER_UNSAFE_RAW);
            $campo = htmlspecialchars($campo);
            return $campo;
        }
        /**Método para limpiar correo */
        public function limpiar_correo($campo){
            //Limpia el valor que entra por el formulario.
            $campo = strip_tags($campo);
            $campo = filter_var($campo, FILTER_SANITIZE_EMAIL);
            $campo = htmlspecialchars($campo);
            return $campo;
        }
        /**Método para encriptar la contraseña */
        public function encriptar_password($password){
            //cost indica el número de veces que se aplique el algoritmo
            return password_hash($password, PASSWORD_DEFAULT, ['cost' =>10]);
        }
        /**Método para verificar al usuario */
        public function verificar_usuario($correo, $password){
            $clave = $this->usuario->obtener_password($correo);        
            return (password_verify($password,$clave)) ? true : false;
        }

        /**Método para crear usuarios */
        public function nuevo_usuario($nombre,$correo, $password){
            $registro = $this->usuario->crear_usuario($nombre,$this->limpiar_correo($correo), $this->encriptar_password($this->limpiar_password($password)));
            return $registro;
        }

        /**Método para obtener datos del usuario */
        public function datos_usuario($atributo,$dato){
            return $this->usuario->get_datos_usuario($atributo, $dato);
        }

    }
?>
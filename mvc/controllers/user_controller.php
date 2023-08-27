<?php

class User_controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaj = "Mensjae de prueba";
        require_once 'C:/xampp/htdocs/proyecto/mvc/model/users_model.php';
        $this->usuario = new Users_model();
        
        
    }

    function render()
    {
        // $this->view->render('login/registro');
    }

    /**Método para clean contraseña */
    public function clean_password($data)
    {
        //Limpia el valor que entra por el formulario.
        $data = strip_tags($data);
        $data = filter_var($data, FILTER_UNSAFE_RAW);
        $data = htmlspecialchars($data);
        return $data;
    }
    /**Método para clean correo */
    public function clean_email($data)
    {
        //Limpia el valor que entra por el formulario.
        $data = strip_tags($data);
        $data = filter_var($data, FILTER_SANITIZE_EMAIL);
        $data = htmlspecialchars($data);
        return $data;
    }
    /**Método para encriptar la contraseña */
    public function encrypt_password($password)
    {
        //cost indica el número de veces que se aplique el algoritmo
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }
    /** Método para verificar al usuario */
    public function verify_user($email, $password)
    {
        $clave = $this->usuario->get_password($email);
        return (password_verify($password, $clave)) ? true : false;
    }

    /**Método para crear usuarios */
    public function create_user()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $message = "";
        if($this->usuario->new_user($name, $this->clean_email($email), $this->encrypt_password($this->clean_password($password)))){
            $message = "Usuario <span class='fs-5 fw-semibold text-primary'>" . $_POST["name"] . "</span> registrado correctamente.";
        }else{
            $message = "La cuenta de correo <span class='fs-5 fw-semibold text-primary'>" . $_POST["email"] . "</span> ya se encuentra registrada.";
        }
        $this->view->mensaj = "asdf";
        return $message;
        // $this->view->render('login/regisstro');   
        
       
    }

    /**Método para obtener datos del usuario */
    public function get_user_info($atributo, $dato)
    {
        return $this->usuario->get_user_data($atributo, $dato);
    }
}

<?php 
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/model/model.php';

class loginController{
    public $dataUser;
    public $rol;
    public $pageTitle;
    public $viewAdmin;
    public $viewUser;
    public $user;

    public function __construct(){
        $this->viewUser = '';
        $this->viewAdmin = '';
        $this->user = new Users();
    }
    

    public function startSession($email, $password){
        $this->viewUser = 'location:../users/index.php';
        $this->viewAdmin = 'location:../admin/index.php';


        $data = $this->user->validateUser($email, $password);
        if($data == true){
            // session_start();
            echo "casi";
            $infoUser = $this->user->getInfoUser($email);
            // print_r($infoUser['rol']);
                if($infoUser['rol'] == 2){
                    header('location:../admin/index.php');
                }else if($infoUser['rol'] == 1){
                    header('location:../users/index.php');
                }
            }else{
                // echo "errorazo";
                return false;
            }
        }     
}
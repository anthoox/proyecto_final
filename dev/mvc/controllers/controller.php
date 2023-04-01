<?php 

require_once 'C:/xampp/htdocs/proyecto/dev/mvc/model/model.php';

class loginController{
    private $user;
    public function __construct(){
        
        $this->user = new Users();
    }
    

    public function startSession($email, $password){
 

        $data = $this->user->validateUser($email, $password);
        if($data == true){
            
            // echo "casi";
            $userData = $this->user->getInfoUser($email);
            session_start();
            // $_SESSION = array_merge($_SESSION, $userData);
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $userData['id_user'];

                if($userData['rol'] == 1){
                    $_SESSION['rol'] = 1;
                    header('location:../admin/index.php');
                }else if($userData['rol'] == 2){
                    $_SESSION['rol'] = 2;
                    header('location:../users/index.php');
                }
            }else{
                // echo "errorazo";
                return false;
            }
    }     
}

class userList{
    private $pageTitle;
    private $lists;

    public function __construct(){
        
        $this->pageTitle = "";
        $this->lists = new Lists();
    }

    public function listar($data){
        // $this->pageTitle = "Listas de " . $userData['name'];
        return $this->lists->getAllLists('id_user', $data);
    }

}
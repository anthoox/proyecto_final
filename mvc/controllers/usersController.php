<?php 

require_once 'C:/xampp/htdocs/proyecto/mvc/model/usersModel.php';

class UsersController{
    private $user;
    public function __construct(){
        
        $this->user = new Users();
    }
    

    public function startSession($email, $password){ 

        $result = $this->user->validateUser($email, $password);
        if($result){          
            if($result['rol'] == 1){
                header('Content-Type: text/html; charset=utf-8');
                header('location:../admin/index.php');
                return $result;
            }else if($result['rol'] == 2){
                header('Content-Type: text/html; charset=utf-8');
                header('location:../users/index.php');
                return $result;
            }
        }else{
            
            return false;
        }        
    }
    
    public function addUser($name, $email, $password){
        return $this->user->createUser($name, $email, $password);
    }

    public function searchUser($atribute, $data){
        return $this->user->getInfoUser($atribute, $data);
    }

    public function getTable($table, $text = ''){
        return $this->user->getAny($table, $text);
    }

    public function admin_edit_user($idUser, $name, $email, $rol){
        return $this->user->adminEditUser($idUser, $name, $email, $rol);
    }

    public function edit_user($atribute, $idUser, $name){
        return $this->user->editUser($atribute,$idUser, $name);
    }

    public function usersList(){
        return $this->user->totalUser();
    }

    public function limitUsers($offset, $users_per_page){
        return $this->user->limitListUsers($offset, $users_per_page);
    }

    public function deleteUser($idUser){
        return $this->user->deleteUser($idUser);
    }
}
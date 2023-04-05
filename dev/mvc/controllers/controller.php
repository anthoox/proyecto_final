<?php 

require_once 'C:/xampp/htdocs/proyecto/dev/mvc/model/model.php';

class LoginController{
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
}

class UserList{
    private $pageTitle;
    private $lists;
    private $items;

    public function __construct(){

        $this->lists = new Lists();
        $this->items = new Items();
    }

    // public function listar($data){
    //     // $this->pageTitle = "Listas de " . $userData['name'];
    //     return $this->lists->getAllLists('id_user', $data);
    // }

    public function toList($idUser){
        return $this->lists->getActiveLists($idUser);

    }

}

class UserItems{
    private $pageTitle;
    private $lists;
    private $items;

    public function __construct(){
        $this->lists = new Lists();
        $this->items = new Items();
    }

    public function itemsUser($atribute, $idList){
        return $this->items->getItems($atribute, $idList);
    }
    public function itemsChecked($idList){
        return $this->lists->checked($idList);
    }

    public function itemsPrice($idList){
        return $this->items->sumPriceItems($idList);
    }

}

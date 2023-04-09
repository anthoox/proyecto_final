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
    
    public function addUser($name, $email, $password){
        return $this->user->createUser($name, $email, $password);
    }

    public function searchUser($email){
        return $this->user->getInfoUser($email);
    }

    public function getTable($table, $text = ''){
        return $this->user->getAny($table, $text);
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

    public function toList($idUser){
        return $this->lists->getActiveLists($idUser);
    }

    public function listsUser($idUser){
        return $this->lists->getAmountList($idUser);
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

    public function upcoming($idUser){
        return $this->items->next_items($idUser);
    }

    public function pending($idUser){
        return $this->items->pendingItems($idUser);
    }

    public function completed($idUser){
        return $this->items->completedItems($idUser);
    }

}

<?php 

require_once 'C:/xampp/htdocs/proyecto/mvc/model/model.php';

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

class UserList{//UserController
    private $lists;
    private $user;
    private $items;

    public function __construct(){
        $this->lists = new Lists();
        $this->items = new Items();
        $this->user = new Users();
    }

    public function addList($idUser, $list_name){
        return $this->lists->createList($idUser, $list_name);
    }

    public function getNameList($idList){
        return $this->lists->getOneList($idList);
    }

    public function infoList($idList){
        return $this->lists->getInfolist($idList);
    }

    public function toList($idUser){
        return $this->lists->getActiveLists($idUser);
    }

    public function deleteList($idList, $idUser){
        return $this->lists->delList($idList, $idUser);
    }

    public function listsUser($idUser){
        return $this->lists->getAmountList($idUser);
    }

    public function trash($idUser){
        return $this->lists->trashLists($idUser);
    }

    public function editList($idList, $atribute, $data){
        return $this->lists->modifList($idList, $atribute, $data);
    }

    public function emptyTrash($idUser){
        return $this->lists->emptyTrash($idUser);
    }

    public function deleteUserList($idUser){
        return $this->lists->deleteUserList($idUser);
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

    public function addItem($idList,$idUser, $itemName){
        return $this->items->createItem($idList,$idUser, $itemName);
    }

    public function editItem($atribute, $data, $idItem){
        return $this->items->modifItem($atribute, $data, $idItem);
    }

    public function deleteItem($idItem){

        return $this->items->delItem($idItem);
    }

    public function itemsUser($atribute, $idList){
        return $this->items->getItems($atribute, $idList);
    }
    public function itemsChecked($idList){
        return $this->lists->checked($idList);
    }

    public function trashItemsChecked($idList){
        return $this->lists->checkedTrash($idList);
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

    public function timeItems($idList){
        return $this->items->totalItemsTime($idList);
    }
    
}
// $prueba = new UserItems;
// echo $prueba->deleteItem(93);
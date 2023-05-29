<?php 

require_once 'C:/xampp/htdocs/proyecto/mvc/model/listsModel.php';

class ListsController{
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
<?php 

require_once 'C:/xampp/htdocs/proyecto/mvc/model/itemsModel.php';

class ItemsController{
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
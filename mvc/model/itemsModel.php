<?php

/**Carpeta con archivos clases para establecer la conexión con la base de datos */
require_once 'C:/xampp/htdocs/proyecto/mvc/config/connection.php';
class Items
{
    private $table = 'items';
    private $connection;

    public function __construct()
    {
        $this->connection = new Db_connection();
    }

    /**Método para añadir un item a la tabla */
    public function createItem($idList, $idUser, $itemName)
    {
        $creationDate = date('Y-m-d H:i:s');
        ;
        $sql = "INSERT INTO " . $this->table . " (id_list, id_user, item_name, creation_date) VALUES (?, ?, ?, ?)";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $idList);
        $query->bindParam(2, $idUser);
        $query->bindParam(3, $itemName);
        $query->bindParam(4, $creationDate);
        try {
            $query->execute();
            $rows = $query->rowCount();
            if ($rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error en la creación del item." . $e->getMessage();
        }
    }

    /**Método para eliminar un item de la lista o todos los items de una lista */
    public function delItem($data)
    {
        $sql = "DELETE FROM $this->table  WHERE id_item  = ?";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $data);
        try {
            $query->execute();
            $rows = $query->rowCount();
            if ($rows > 0) {

                return true;
            } else {

                return false;
            }
        } catch (PDOException $e) {
            echo "Error en al borrar item/s." . $e->getMessage();
        }
    }

    /**Método para obtener los items de una lista o de un usuario */
    public function getItems($atribute, $data)
    {
        $sql = "SELECT * FROM  $this->table  WHERE  $atribute  = ?";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $data);
        try {
            $query->execute();
            $rows = $query->rowCount();
            if ($rows > 0) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                $result['rows'] = $rows;

                return $result;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al obtener el/los items/s " . $e->getMessage();
        }

    }

    /**Método para modificar cualquier atributo de un item */
    public function modifItem($atribute, $data, $idItem)
    {
        $sql = "UPDATE " . $this->table . " SET " . $atribute . " = ? WHERE id_item = ?";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $data);
        $query->bindParam(2, $idItem);
        try {
            $query->execute();
            $rows = $query->rowCount();
            if ($rows > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error al realizar la modificación " . $e->getMessage();
        }
    }

    /**Método para el check */
    public function checkItem($idItem, $check)
    {
        $sql = "UPDATE " . $this->table . " SET is_check = ? WHERE id_item = ?";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $check);
        $query->bindParam(2, $idItem);
        try {
            $query->execute([$check, $idItem]);
            $rows = $query->rowCount();
            if ($rows > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al realizar la modificación " . $e->getMessage();
        }
    }


    /**Método para obtener las próximas listas */
    public function next_items($idUser)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id_user = ? and is_check = 0 and (alarm_date IS not NULL OR alarm_date > NOW()) and alarm_date <> '0000-00-00 00:00:00'";
        // $sql = "SELECT * from " . $this->table . " WHERE id_user = ? and is_check = 0 and alarm_date != null order by alarm_date";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $idUser);
        try {
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $rows = $query->rowCount();
            if ($rows > 0) {
                return $result;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error al obtener el/los items/s " . $e->getMessage();
        }
        $this->connection->closeConnection();

    }


    /**Método para obtener las próximas listas */
    public function pendingItems($idUser)
    {
        $sql = "SELECT * from " . $this->table . " WHERE id_user = ? and is_check = 0 order by creation_date";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $idUser);
        try {
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $rows = $query->rowCount();
            if ($rows > 0) {
                return $result;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error al obtener el/los items/s " . $e->getMessage();
        }
        $this->connection->closeConnection();

    }

    /**Método para obtener items completados */
    public function completedItems($idUser)
    {
        $sql = "SELECT * from " . $this->table . " WHERE id_user = ? and is_check = 1";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $idUser);
        try {
            $query->execute();
            $rows = $query->rowCount();
            if ($rows > 0) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error al obtener el/los items/s " . $e->getMessage();
        }
        // $this->connection->closeConnection();k

    }

    /**Método para obtener la suma total de los items de una lista que esten marcados teniendo en cuenta la cantidad de items que se tengan */
    public function sumPriceItems($idList)
    {

        $sql = "SELECT SUM(price * quantity) FROM " . $this->table . " WHERE is_check = 1 and id_list = ?";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $idList);
        try {
            $query->execute();
            $rows = $query->rowCount();
            if ($rows > 0) {
                $result = $query->fetch(PDO::FETCH_NUM);
                return $result;
            } else {

                return false;
            }
        } catch (PDOException $e) {
            echo "Error al cargar el precio de los items." . $e->getMessage();
        }
        $this->connection->closeConnection();

    }

    /**Método para obtener el precio de todos los items de todas las listas de un usuario que esten con el check*/
    public function fullPriceItems($idUser)
    {

        $sql = "SELECT SUM(items.price * items.quantity) FROM " . $this->table . " WHERE items.id_user = ? and is_check = 1";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $idUser);
        try {
            $query->execute();
            $rows = $query->rowCount();
            if ($rows > 0) {
                $result = $query->fetch(PDO::FETCH_NUM);
                // echo "Consulta realizada con éxito";
                return $result;
            } else {
                echo "No tiene items completos";
            }

        } catch (PDOException $e) {
            echo "Error al obtener el/los items/s " . $e->getMessage();
        }
        // $this->connection->closeConnection();


    }

    //Obtiene la suma total de todos los tiempos total_time de cada item de la lista
    //ESTO PROBABLEMENTE HAY QUE MODIFICARLO PARA LA TEMPORIZACIÓN
    public function totalItemsTime($idList)
    {
        $sql = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(total_time))) FROM items where id_list= ?";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->bindParam(1, $idList);
        try {
            $query->execute();
            $rows = $query->rowCount();
            if ($rows > 0) {
                $result = $query->fetch(PDO::FETCH_NUM);
                // echo "Consulta realizada con éxito";
                return $result;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error al obtener el/los items/s " . $e->getMessage();
        }
    }
}

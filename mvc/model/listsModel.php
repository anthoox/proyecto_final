<?php

/**Carpeta con archivos clases para establecer la conexión con la base de datos */ 
require_once 'C:/xampp/htdocs/proyecto/mvc/config/connection.php';


class Lists {
	
	private $table = 'lists';

	private $connection;
	public function __construct() {
		$this->connection = new Db_connection();
	}

	/**Método para comprobar si existe la cuenta de correo al darse de alta*/
	public function existList($data, $idUser){
		$sql = "SELECT list_name FROM " . $this->table . " WHERE list_name = ? and id_user= ? and trash = 0";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		$query->bindParam(2, $idUser);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_NUM);
			return $result;
		}catch(PDOException $e){
			echo "Erro en la comprobación del email. " . $e->getMessage();
		}
		// $this->connection->closeConnection();
	}
	
	/**Método para añadir una lista nueva a la base de datos*/
	public function createList($idUser, $list_name){
		$result = $this->existList($list_name, $idUser,);
		if(!$result){
			$creation_date = date('Y-m-d H:i:s');
			$modif_date = $creation_date;
			$sql = "INSERT INTO $this->table (id_user, list_name, creation_date, modif_date) VALUES (?, ?, ?, ?)";
			$query = $this->connection->getConnection()->prepare($sql);
			$query->bindParam(1, $idUser);
			$query->bindParam(2, $list_name);
			$query->bindParam(3, $creation_date);
			$query->bindParam(4, $modif_date);
			try{
				$query->execute();
				$rows = $query->rowCount();
				if($rows > 0){
					return true;
				}else{
					return false;
				}				
			}catch(PDOException $e){
				echo "Error al añadir la lista a la base de datos" . $e->getMessage();
				return false;
			}
		}else{
			return false;
		}
	}

	/**Método para borrar las litas de un usuario */
	public function deleteUserList($idUser){				
		$sql = "DELETE FROM $this->table WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows > 0){
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo "Erro al borrar" . $e->getMessage();
		}
		// $this->connection->closeConnection();
	}

	/**Método para borrar una lista que esta en la papelera*/
	public function delList($idList, $idUser){				
		$sql = "DELETE FROM $this->table WHERE id_list = ? AND id_user = ? AND trash = 1";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		$query->bindParam(2, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows > 0){
				echo "La lista borrada";
				return true;
			}else{
				echo "NO SE HA BORRADO NADA";
				return false;
			}
		}catch(PDOException $e){
			echo "Erro al borrar" . $e->getMessage();
		}
		// $this->connection->closeConnection();
	}

	/**Método para obtener información de una lista */
	public function getInfolist($idList){
		$sql = "SELECT * FROM " . $this->table . " WHERE id_list = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if($result ){
				return $result;
			}else{
				return false;
			}				
		}catch(PDOException $e){
			echo "Error al añadir la lista a la base de datos" . $e->getMessage();
			return false;
		}
	}
	/**Método para obtener una lista a partir del id_list */
	public function getOneList($idList){
		$sql = "SELECT list_name FROM $this->table WHERE id_list = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if($result ){
				return $result;
			}else{
				return false;
			}				
		}catch(PDOException $e){
			echo "Error al añadir la lista a la base de datos" . $e->getMessage();
			return false;
		}

	}
	/**Método para mostrar información una o todas las listas que cumplan una condición*/
	public function getAllLists($atribute, $data){
		$sql = "SELECT * FROM $this->table WHERE $atribute = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			echo "Consulta realizada con éxito";
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
		// $this->connection->closeConnection();
		return $result;
	}	
	
	/**Metodo para modificar algún atributo de cualquier lista.*/

	public function modifList($idList, $atribute, $data){
		$modifDate = date('Y-m-d H:i:s');
		$sql = "UPDATE lists SET $atribute = ?, modif_date = '$modifDate' WHERE id_list = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		$query->bindParam(2, $idList);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows > 0){
				return true;
			}else{
				return false;
			}				
		}catch(PDOException $e){
			echo "Error al añadir la lista a la base de datos" . $e->getMessage();
			return false;
		}
	}
		

	//Metodo para recuperar todas las listas que tiene un usuario en la papelera
	public function restoreList($idUser){
		$sql = "UPDATE $this->table SET in_trash = 0 WHERE in_trash = 1 and id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows > 0 and $rows == 1){
				echo "Se ha restaurado la lista";
			}else if($rows>2){
				echo "Se han restaurado las listas";
			}else{
				echo "La papelera esta vacia";
			}
			
		}catch(PDOException $e){
			echo "Error a la hora de quitar de la papelera. " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

	//Metodo para eliminar/vaciar todas las listas que tienen un si en in_trash
	public function emptyTrash($idUser){
		$sql = "DELETE FROM $this->table WHERE trash = 1 and id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows >= 0){
				// echo "Se ha vaciado la papelera";
				return true;
			}else{
				// echo "La papelera esta vacia";
				return false;
			}
		}catch(PDOException $e){
			echo "Error a la hora de vaciar de la papelera. " . $e->getMessage();
		}
	}


	//Selecciones especiales de listas
	/**Método para seleccionar todas las litas de un usuario que no esten en la papelera */
	public function getActiveLists($idUser){		
		$sql = "SELECT * FROM $this->table where id_user = ? and trash = 0 order by creation_date";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows > 0){
				return $result;
			}else{
				
				return false;
			}
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
		// $this->connection->closeConnection();
	}

	/**Método para obtener las listas de la papelera */
	public function trashLists($idUser){
		$sql = "SELECT * FROM $this->table where id_user = ? and trash = 1 order by list_name";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows > 0){
				return $result;
			}else{
				echo "La papelera esta vacia";
				return false;
			}
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
	}

	/**Método para obtener el nombre de los items que tiene una lista */
	public function infoItemsList($idList){
		$sql = "SELECT items.* , lists.* FROM items INNER JOIN lists ON items.id_list = lists.id_list WHERE lists.id_list = ? order by lists.creation_date";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows > 0){
				// echo "Si tiene listas";
				$result['items'] = $rows;
				return $result ;
			}else{
				// echo "No tiene listas";
			}
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
	}

	/**Método para obtener la información de una lista que no este en la papelera y el nombre de los items que tiene esa lista */
	public function checked($idList){
		$sql = "SELECT items.* , lists.* FROM items INNER JOIN lists ON items.id_list = lists.id_list WHERE lists.id_list = ? and trash = 0 and items.is_check = 1 order by lists.creation_date";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows > 0){
				// echo "Si tiene listas";
				$result['items'] = $rows;
				return $result ;
			}else{
				return false;
				// echo "No tiene listas";
			}
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
	}

	public function checkedTrash($idList){
		$sql = "SELECT items.* , lists.* FROM items INNER JOIN lists ON items.id_list = lists.id_list WHERE lists.id_list = ? and trash = 1 and items.is_check = 1 order by lists.creation_date";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		try{
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows > 0){
				// echo "Si tiene listas";
				$result['items'] = $rows;
				return $result ;
			}else{
				return false;
				// echo "No tiene listas";
			}
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
	}

	public function getAmountList($idUser){
		$sql = "SELECT * FROM " . $this->table . " WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			//Esto es necesario si no no devuelve el número de columnas.
			$query->fetch(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows > 0){
				return $rows ;
			}else if($rows == null){
				$rows = '0';
				return $rows ;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
	}

}
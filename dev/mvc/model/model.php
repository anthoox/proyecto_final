<?php

/**Carpeta con archivos clases para establecer la conexión con la base de datos */ 
require_once 'C:/xampp/htdocs/proyecto/dev/mvc/config/connection.php';


class Lists {
	
	private $table = 'lists';

	private $connection;
	public function __construct() {
		$this->connection = new Db_connection();
	}

	/**Método para comprobar si existe la cuenta de correo al darse de alta*/
	public function existList($data){
		$sql = "SELECT list_name FROM " . $this->table . " WHERE list_name = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_NUM);
			echo "comprobanción de lista lanzada <br>";
			// $this->connection->closeConnection();
			return $result;
		}catch(PDOException $e){
			echo "Erro en la comprobación del email. " . $e->getMessage();
		}
		// $this->connection->closeConnection();
	}
	
	/**Método para añadir una lista nueva a la base de datos*/
	public function createList($idUser, $list_name){
		$result = $this->existList($list_name);
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
				echo "Lista añadida correctamente a la base de datos";
			}catch(PDOException $e){
				echo "Error al añadir la lista a la base de datos" . $e->getMessage();
			}
		}else{
			echo "La lista " .  $list_name . " ya existe.";
		}
		$this->connection->closeConnection();
	}

	/**Método para borrar una lista o todas las listas de un usuario dependiendo del atributo*/
	public function delList($atribute, $data){		
		$sql = "DELETE FROM $this->table WHERE $atribute = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows == 0){
				echo "La lista no existe";
			}else{
				echo "Lista/s Borrado/as con exito de la base de datos";
			}
		}catch(PDOException $e){
			echo "Erro al borrar" . $e->getMessage();
		}
		// $this->connection->closeConnection();
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
			echo "modificación realizada con éxito";
		}catch(PDOException $e){
			echo "Error al realizar la modificación " . $e->getMessage();
		}
		$this->connection->closeConnection();
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
		$sql = "DELETE FROM $this->table WHERE in_trash = 1 and id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows > 0){
				echo "Se ha vaciado la papelera";
			}else{
				echo "La papelera esta vacia";
			}
		}catch(PDOException $e){
			echo "Error a la hora de vaciar de la papelera. " . $e->getMessage();
		}
		$this->connection->closeConnection();
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
		$sql = "SELECT * FROM $this->table where id_user = ? and papelera = 1 order by list_name";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows > 0){
				// echo "Si tiene listas";
				return $result;
			}else{
				echo "La papelera esta vacia";
			}
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
	}

	/**Método para obtener el nombre de los items que tiene una lista */
	public function infoList($idList){
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

}
// $prueba2 = new Lists();
// $prueba2->createList(4, 'pepito');
// print_r($prueba2->getAllLists('id_user', 5));
// print_r($prueba2->getInfoList(3));
// $prueba2->emptyTrash(4);
// print_r($prueba2->getAllLists('id_user', 4));
// $prueba2->modifList(3, 'list_name', 'lista de prueba');

class Users{
	private $table = 'users'; //Para que puedan usarlo sus clases hijas
	private $connection;
	private $items;
	private $lists;

	/**Método para conectar con el servidor */
	public function __construct() {
		$this->connection = new Db_connection();
	}

	public function existEmail($data){
		$sql = "SELECT email FROM " . $this->table . " WHERE email = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		try{
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_NUM);
			echo "comprobanción de email lanzada <br>";
			
		}catch(PDOException $e){
			echo "Erro en la comprobación del email. " . $e->getMessage();
		}
		return $result;
	}
	
	/**Método para crear usuarios en la base de datos. Los usuarios creados por este método son usuarios normales */
	public function createUser($name, $email, $password){
		//Añador sal aquí
		$passwordHased = hash('sha512', $password); 
		$registration_date = date('Y-m-d H:i:s');
		$result = $this->existEmail($email);
		if(!$result){
			$sql = "INSERT INTO " . $this->table . " (name, email, password, registration_date, rol) VALUES (?, ?, ?, ?, 2)";
			$query = $this->connection->getConnection()->prepare($sql);
			$query->bindParam(1, $name);
			$query->bindParam(2, $email);
			$query->bindParam(3, $passwordHased);
			$query->bindParam(4, $registration_date);

			try{
				$query->execute();
				$rows = $query->rowCount();
				if($rows>0){
					echo "usuario creado";
					return true;
				}else{
					echo "usuario no creado";
				}
				
			}catch(PDOException $e){
				echo "Error en la creación del usuario." . $e->getMessage();
			}
		}else{
			echo "El email " . $email . " ya esta registrado en la base de datos";
		}
		$this->connection->closeConnection();
	}

	/**Método para borrar usuarios de la base de datos 
	 * A esto le falta porque al eliminar elementos da error por las claves foraneas
	*/
	public function deleteUser($id){
		$this->items = new Items();
		$this->items->delItem('id_user', $id);
		$this->lists = new Lists();
		$this->lists->delList('id_user', $id);
		$sql = "DELETE FROM " . $this->table . " WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $id);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows>0){
				echo "usuario borrado";
			}else{
				echo "el usuario no existe";
			}
			
		}catch(PDOException $e){
			echo "Error al borrar al usuario." . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

	/**Método para modificar cualquier atributo de user */
	public function modifUSer($atribute, $data, $idUser){
		$sql = "UPDATE users SET " . $atribute . " = ? WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		$query->bindParam(2, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows>0){
				echo "modificación realizada con éxito";
			}else{
				echo "no se ha modificado ninguna fila";
			}
			
		}catch(PDOException $e){
			echo "Error al realizar la modificación " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

	/**Método para obtener los datos de un usuario */
	public function getInfoUser($email){
		$sql = "SELECT * FROM users  WHERE email = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $email);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if(!$result){
				echo "no hay datos del usuario " . $email;
			}else{
				return $result;
			}
		}catch(PDOException $e){
			echo "Error al obtener la información. " . $e->getMessage();
		}		
		// $this->connection->closeConnection();		
		// return $result;
	}

	//Convertirla en una sesion de iniciar como el ejemplo de la web y chatgpt
	public function validateUser($email, $password){		
		$sql = "SELECT * FROM " . $this->table . " WHERE email = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $email);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if(!$result){				
				$this->connection->closeConnection();
			}else{
				//añadir sal aquí
				$hash = hash('sha512', $password); 
				if($result['password'] === $hash){
					return $result;
				}else{
					return false;
				}
			}			
		}catch(PDOException $e){
			echo "Erro en la comprobación del email. " . $e->getMessage();
		}
	}

	public function exit(){
		$this->connection->closeConnection();
	}
}
// $prueba2 = new Users();
// $prueba2->deleteUser(5);
// $prueba2->isTheEmail('prueba@prueba.com');

class Items{
	private $table = 'items';
	private $connection;

	public function __construct() {
		$this->connection = new Db_connection();
	}

	/**Método para añadir un item a la tabla */
	public function createItem($idList,$idUser, $itemName){
		$creationDate = date('Y-m-d H:i:s');;
		$sql = "INSERT INTO " . $this->table . " (id_list, id_user, item_name, creation_date) VALUES (?, ?, ?, ?)";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		$query->bindParam(2, $idUser);
		$query->bindParam(3, $itemName);
		$query->bindParam(4, $creationDate);
		try{
			$query->execute();
			echo "item creado";
		}catch(PDOException $e){
			echo "Error en la creación del item." . $e->getMessage();
		}
		// $this->connection->closeConnection();
	}

	/**Método para eliminar un item de la lista o todos los items de una lista */
	public function delItem($atribute, $data){
		$sql = "DELETE FROM $this->table  WHERE $atribute  = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		try{
			$query->execute();
			echo "item/s eliminado/S";
		}catch(PDOException $e){
			echo "Error en al borrar item/s." . $e->getMessage();
		}
		// $this->connection->closeConnection();
	}

	/**Método para obtener los items de una lista o de un usuario */
	public function getItems($atribute, $data){
		$sql = "SELECT * FROM  $this->table  WHERE  $atribute  = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows>0){
				$result = $query->fetch(PDO::FETCH_ASSOC);
				$result['rows'] = $rows;
				
				return $result;
			}else{
				return false;
			}
			
			// echo "Consulta realizada con éxito";
		}catch(PDOException $e){
			echo "Error al obtener el/los items/s " . $e->getMessage();
		}
		// $this->connection->closeConnection();
		
	}

	/**Método para modificar cualquier atributo de un item */
	public function modifItem($atribute, $data, $idItem){
		$sql = "UPDATE " . $this->table . " SET " . $atribute . " = ? WHERE id_item = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		$query->bindParam(2, $idItem);
		try{
			$query->execute();
			echo "Modificación realizada con éxito";
		}catch(PDOException $e){
			echo "Error al realizar la modificación " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}


	/**Método para obtener las próximas listas */
	public function nextLists($idUser){
		$sql = "SELECT * from " . $this->table . " WHERE id_user = ? and is_check = 0 and alarm_date != null order by alarm_date";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows>0){
				echo "Consulta realizada con éxito";
				return $result;
			}else{
				echo "No tiene próximas";
			}
			
		}catch(PDOException $e){
			echo "Error al obtener el/los items/s " . $e->getMessage();
		}
		$this->connection->closeConnection();
		
	}


	/**Método para obtener las próximas listas */
	public function pendingItems($idUser){
		$sql = "SELECT * from " . $this->table . " WHERE id_user = ? and is_check = 0 and order by creation_date";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows>0){
				echo "Consulta realizada con éxito";
				return $result;
			}else{
				echo "No tiene pendientes";
			}
			
		}catch(PDOException $e){
			echo "Error al obtener el/los items/s " . $e->getMessage();
		}
		$this->connection->closeConnection();
		
	}

	/**Método para obtener items completados */
	public function completedItems($idUser){
		$sql = "SELECT * from " . $this->table . " WHERE id_user = ? and is_check = 1";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows>0){
				$result = $query->fetch(PDO::FETCH_ASSOC);
				echo "Consulta realizada con éxito";
				return $result;
			}else{
				echo "No tiene items completos";
			}
			
		}catch(PDOException $e){
			echo "Error al obtener el/los items/s " . $e->getMessage();
		}
		// $this->connection->closeConnection();k
		
	}

	/**Método para obtener la suma total de los items de una lista que esten marcados teniendo en cuenta la cantidad de items que se tengan */
	public function sumPriceItems($idList){
		
		$sql = "SELECT SUM(price * quantity) FROM " . $this->table . " WHERE is_check = 1 and id_list = ?";
		$query =$this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows>0){
				$result = $query->fetch(PDO::FETCH_NUM);				
				return $result;
			}else{
				
				return false;
			}
		}catch(PDOException $e){
			echo "Error al cargar el precio de los items." . $e->getMessage();
		}
		$this->connection->closeConnection();

	}

	/**Método para obtener el precio de todos los items de todas las listas de un usuario que esten con el check*/
	public function fullPriceItems($idUser){
		$sql = "SELECT SUM(items.price * items.quantity) FROM " . $this->table . " WHERE items.id_user = ? and is_check = 1";
	
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows>0){
				$result = $query->fetch(PDO::FETCH_NUM);
				// echo "Consulta realizada con éxito";
				return $result;
			}else{
				echo "No tiene items completos";
			}
			
		}catch(PDOException $e){
			echo "Error al obtener el/los items/s " . $e->getMessage();
		}
		// $this->connection->closeConnection();

		
	}
}
// $prueba2 = new Items();
// $prueba2->createItem(17, 'prueba2');
// print_r($prueba2->getItems('id_list', 3 ));


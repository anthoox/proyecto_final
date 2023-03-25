<?php
/**Carpeta con archivos clases para establecer la conexión con la base de datos */ 
require_once('../config/config.php');

//Clase para conectar y desconectar a la base de datos:
class Db_connection{
    private $host = DB_HOST;
	private $db = DB;
	private $user = DB_USER;
	private $pass = DB_PASS;
	public $connection;

	//Constructor para establecer directamente la conexión al instanciar un objeto,
	public function __construct() {		
		try {
            $this->connection = new PDO('mysql:host='.$this->host.'; dbname='.$this->db, $this->user, $this->pass);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "conexion correcta<br>";
		} catch (PDOException $e) {
            echo "Error al conectar a la base de datos. " . $e->getMessage();
            exit();
        }
	}

	/**Método para establecer la conexión */
	public function getConnection() {
        return $this->connection;
    }

	//Método para cerrar la conexion con la base de datos
	public function closeConnection() {
        $this->connection = null;
    }
} 

class Lists {
	
	private $table = 'lists';
	private $connection;
	public function __construct() {
		$this->connection = new Db_connection();
	}

	/**Método para conectar con el servidor */
	// public function getconnection(){
	// 	$db = new Db_connection();
	// 	$this->connection = $db->connection;
	// }
		
	/**Método para comprobar si existe la cuenta de correo */
	public function existList($data){
		$sql = "SELECT list_name FROM " . $this->table . " WHERE list_name = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_NUM);
			echo "comprobanción de lista lanzada <br>";
			$this->connection->closeConnection();
			return $result;
		}catch(PDOException $e){
			echo "Erro en la comprobación del email. " . $e->getMessage();
		}
		$this->connection->closeConnection();
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
			$afectedRows = $query->rowCount();
			if($afectedRows == 0){
				echo "La lista no existe";
			}else{
				echo "Lista/s Borrado/as con exito de la base de datos";
			}
		}catch(PDOException $e){
			echo "Erro al borrar" . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

	/**Método para mostrar una o todas las listas que cumplan una condición, vale para obtener todas las listas de un usuario*/
	public function getAllLists($atribute, $data){
		$sql = "SELECT * FROM $this->table WHERE $atribute = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		try{
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			echo "Consulta realizada con éxito";
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
		$this->connection->closeConnection();
		return $result;
	}	
	
	/**Metodo para modificar algún atributo de la lista. Vale para recuperar una lista de la papelera o moverla a la papelera.*/
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
		
	/**Método para obtener información de la lista */
	public function getInfoList($idList){
		$sql = "SELECT * FROM lists  WHERE id_list = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		try{
			$query->execute();
			echo "Información obtenida";
			$result = $query->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			echo "Error al obtener la información";
		}
		$this->connection->closeConnection();				
		return $result;
	}

	//Metodo para recuperar todas las listas que tiene un usuario en la papelera
	public function clearTrash($idUser){
		$sql = "UPDATE $this->table SET in_trash = '' WHERE in_trash = 'si' and id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			echo "Se ha quitado de la papelera";
		}catch(PDOException $e){
			echo "Error a la hora de quitar de la papelera. " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

	//Metodo para eliminar/vaciar todas las listas que tienen un si en in_trash
	public function emptyTrash($idUser){
		$sql = "DELETE FROM $this->table WHERE in_trash = 'si' and id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			echo "Se ha vaciado la papelera";
		}catch(PDOException $e){
			echo "Error a la hora de vaciar de la papelera. " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}
}
// $prueba2 = new Lists();
// $prueba2->createList(4, 'listacosa');
// print_r($prueba2->getAllLists('id_user', 5));
// print_r($prueba2->getInfoList(3));
// $prueba2->emptyTrash(4);
// print_r($prueba2->getAllLists('id_user', 4));
// $prueba2->modifList(3, 'list_name', 'lista de prueba');


class Users{
	private $table = 'users'; //Para que puedan usarlo sus clases hijas
	private $connection;

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
			$result = $query->fetch(PDO::FETCH_NUM);
			echo "comprobanción de lista lanzada <br>";
			$this->connection->closeConnection();
			return $result;
		}catch(PDOException $e){
			echo "Erro en la comprobación del email. " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}
	
	/**Método para crear usuarios en la base de datos. Los usuarios creados por este método son usuarios normales */
	public function createUser($name, $email, $password){
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

			session_start();//Prueba para almacenar la sesión.

			try{
				$query->execute();
				echo "usuario creado";
			}catch(PDOException $e){
				echo "Error en la creación del usuario." . $e->getMessage();
			}
		}else{
			echo "El email " . $email . " ya esta registrado en la base de datos";
		}
		$this->connection->closeConnection();
	}

	/**Método para borrar usuarios de la base de datos */
	public function deleteUser($id){
		$sql = "DELETE FROM " . $this->table . " WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $id);
		try{
			$query->execute();
			echo "usuario borrado";
		}catch(PDOException $e){
			echo "Error al borrar al usuario." . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

	/**Método para modificar cualquier atributo de user */
	public function modifUSer($idUser,$atribute, $data){
		$sql = "UPDATE users SET " . $atribute . " = ? WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		$query->bindParam(2, $idUser);
		try{
			$query->execute();
			echo "modificación realizada con éxito";
		}catch(PDOException $e){
			echo "Error al realizar la modificación " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

	/**Método para obtener los datos de un usuario */
	public function getInfoUser($idUser){
		$sql = "SELECT * FROM users  WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			echo "Información obtenida";
			$result = $query->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			echo "Error al obtener la información. " . $e->getMessage();
		}		
		$this->connection->closeConnection();		
		return $result;
	}
}
// $prueba2 = new Users();
// $prueba2->createUser('pepsdde','pruebadsfa@paado.com','caca');
// $prueba2->isTheEmail('prueba@prueba.com');

class Items{
	private $table = 'items';
	private $connection;

	public function __construct() {
		$this->connection = new Db_connection();
	}

	/**Método para añadir un item a la tabla */
	public function createItem($idList, $itemNAmem, $creationDate){
		$sql = "INSERT INTO " . $this->table . " (id_list, item_name, creation_date) VALUES (?, ?, ?)";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idList);
		$query->bindParam(2, $itemNAmem);
		$query->bindParam(3, $creationDate);
		try{
			$query->execute();
			echo "item creado";
		}catch(PDOException $e){
			echo "Error en la creación del item." . $e->getMessage();
		}
		$this->connection->closeConnection();
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
		$this->connection->closeConnection();
	}

	/**Método para obtener los items de una lista o de un usuario */
	public function getItems($atribute, $data){
		$sql = "SELECT * FROM  $this->table  WHERE  $atribute  = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $data);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			echo "Consulta realizada con éxito";
		}catch(PDOException $e){
			echo "Error al obtener el/los items/s " . $e->getMessage();
		}
		$this->connection->closeConnection();
		return $result;
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
}
// $prueba2 = new Items();
// print_r($prueba2->getItems('id_list', 3 ));

class UsersItems{
	private $table = 'users_items';
	private $connection;

	public function __construct() {
		$this->connection = new Db_connection();
	}

	/**Mñétodo para comprobar si existe el item */
	public function existItem($idUser, $itemName){
		$sql = "SELECT item_name FROM " . $this->table . " WHERE id_user = ? AND item_name = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		$query->bindParam(2, $itemName);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_NUM);
			echo "Comprobado con éxito. ";
			$this->connection->closeConnection();
			return $result;
		}catch(PDOException $e){
			echo "Error al realizar la comprobación " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}
	/**Método para para añadir un item a la lista de items de un usuario comprobando que no exista con anterioridad*/
	public function addItem($idUser, $itemName){
		$result = $this->existItem($idUser, $itemName);
		if($result){
			echo "El item ya existe en la lista";
		}else{
			$sql = "INSERT INTO $this->table (id_user, item_name ) VALUES (?,?)";
			$query = $this->connection->getConnection()->prepare($sql);
			$query->bindParam(1, $idUser);
			$query->bindParam(2, $itemName);
			try{
				$query->execute();
				echo "Item añadido correctamente ";
			}catch(PDOException $e){
				echo "NO se ha podido añadir el item. " . $e->getMessage();
			}
			$this->connection->closeConnection();
		}
	}

	/**Método para obtener todos los items del usuario */
	public function getUsersItems($idUser){
		$sql = "SELECT item_name FROM " . $this->table . " WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			echo "Consulta ejecutada correctamente. ";
			if(!$result){
				$result = "Usuario sin items";
			}
		}catch(PDOException $e){
			echo "Error al seleccionar los items del usuario " . $e->getMessage();
		}
		$this->connection->closeConnection();
		return $result;
	}


	/**Método para borrar todos los items de un usuario */
	public function delALlUsersItems($idUser){
		$sql = "DELETE FROM " . $this->table . " WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			echo " Items borrados de la lista del usuario $idUser ";
		}catch(PDOException $e){
			echo "error al borrar el item del usuario $idUser. " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

	/**Método para eliminar un item de la lista */
	public function delUsersItem($idUser, $itemName){
		$sql = "DELETE FROM " . $this->table . " WHERE id_user = ? AND item_name = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $idUser);
		$query->bindParam(2, $itemName);
		try{
			$query->execute();
			echo " Item borrado de la lista del usuario $idUser ";
		}catch(PDOException $e){
			echo "error al borrar el item del usuario $idUser. " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

}

// $prueba2 = new UsersItems();
// $prueba2->addItem(5, 'calculjknar pesos');
// $prueba2->delUsersItem(3, 'probando');
// print_r($prueba2->getUsersItems(6));


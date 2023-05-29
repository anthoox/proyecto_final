<?php
require_once 'C:/xampp/htdocs/proyecto/mvc/config/connection.php';

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
			if($result){
				return $result;
			}else{
				return false;
			}
			
		}catch(PDOException $e){
			echo "Erro en la comprobación del email. " . $e->getMessage();
		}
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
					// echo "usuario creado";
					return true;
				}else{
					// echo "usuario no creado";
					return false;
				}
				
			}catch(PDOException $e){
				echo "Error en la creación del usuario." . $e->getMessage();
			}
		}else{
			return false;
		}
		// $this->connection->closeConnection();
	}

	/**Método para borrar usuarios de la base de datos 
	 * A esto le falta porque al eliminar elementos da error por las claves foraneas
	*/
	public function deleteUser($id){
		$sql = "DELETE FROM " . $this->table . " WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $id);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows>0){
				echo "usuario borrado";
				return true;
			}else{
				echo "el usuario no existe";
				return false;
			}
			
		}catch(PDOException $e){
			echo "Error al borrar al usuario." . $e->getMessage();
		}
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
			if($rows>=0){
				echo "modificación realizada con éxito";
				return true;
			}else{
				echo "no se ha modificado ninguna fila";
				return false;
			}
			
		}catch(PDOException $e){
			echo "Error al realizar la modificación " . $e->getMessage();
		}
		$this->connection->closeConnection();
	}

	public function adminEditUser($idUser, $name, $email, $rol){
		$sql = "UPDATE users SET name = ?, email = ?, rol = ? WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $name);
		$query->bindParam(2, $email);
		$query->bindParam(3, $rol);
		$query->bindParam(4, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows>=0){
				return true;
			}else{
				return false;
			}
			
		}catch(PDOException $e){
			echo "Error al realizar la modificación " . $e->getMessage();
		}
	}

	public function editUser($atribute, $idUser, $name){

		$sql = "UPDATE users SET ".$atribute." = ? WHERE id_user = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $name);
		$query->bindParam(2, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows>=0){
				return "probando";
			}else{
				return "Error al realizar la modificación";
				// return false;
			}
			
		}catch(PDOException $e){
			echo "Error al realizar la modificación " . $e->getMessage();
		}
	}

	/**Método para obtener los datos de un usuario */
	public function getInfoUser($atribute, $email){
		$sql = "SELECT * FROM users  WHERE $atribute = ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $email);
		try{
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			if(!$result){
				return false;
			}else{
				return $result;
			}
		}catch(PDOException $e){
			echo "Error al obtener la información. " . $e->getMessage();
		}		
	}

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

	public function getAny($table, $text = ''){
		$sql = "SELECT * FROM " . $table . $text;
		$query = $this->connection->getConnection()->prepare($sql);
		try{
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			if($result){
				return $result;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo "Error al obtener valores de la tabla  " . $table . " " . $e->getMessage();
		}
		
	}

	public function totalUser(){
		$sql = "SELECT COUNT(*) as total FROM users";
		$query = $this->connection->getConnection()->prepare($sql);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if($result){
				$rows = $result['total'];
				return $rows;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo "Error al obtener valores de la tabla  " . $e->getMessage();
		}
	}

	public function limitListUsers($offset, $users_per_page){
		$sql = "SELECT * FROM users LIMIT ?, ?";
		$query = $this->connection->getConnection()->prepare($sql);
		$query->bindParam(1, $offset, PDO::PARAM_INT);
		$query->bindParam(2, $users_per_page,PDO::PARAM_INT);
		try{
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
			if($result){

				return $result;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo "Error " . $e->getMessage();
		}
	}
}
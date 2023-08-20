<?php

require_once 'C:/xampp/htdocs/proyecto/mvc/libs/model.php';
class Model_lists extends Model{
	private $table = 'lists'; //Para que puedan usarlo sus clases hijas
	private $statement;

	/**Contructor para conectar con el servidor al crear llamar a cualquier función de esta clase */
	function __construct(){
        parent::__construct();
		//Instanciamos un objeto Model para llamar a las funciones
		$this->statement = new Model();
    }

    /**Método para crear nueva lista */
    public function create_list($idUser, $list_name){		
			$creation_date = date('Y-m-d H:i:s');
			$modif_date = $creation_date;
			$sql = "INSERT INTO $this->table (id_user, list_name, creation_date, modif_date) VALUES (?, ?, ?, ?)";
			$query = $this->statement->prepare($sql);
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

				echo "Error al añadir la lista a la base de datos " . $e->getMessage();
                //Falta añadir que si retorna falso o error, indicar que la lista ya existe
			}
	
	}

    /**Método para borrar las litas de un usuario */
    public function del_Userslist($idUser){				
		$sql = "DELETE FROM $this->table WHERE id_user = ?";
		$query = $this->statement->prepare($sql);
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
            //Falta añadir que si retorna falso o error, indicar que la lista ya existe
		}
	}

    	/**Método para borrar una lista que esta en la papelera*/
	public function del_list($idList, $idUser){				
		$sql = "DELETE FROM $this->table WHERE id_list = ? AND id_user = ? AND trash = 1";
		$query = $this->statement->prepare($sql);
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
            //Falta añadir que si retorna falso o error, indicar que la lista ya existe
		}
	}

    /**Método para obtener información de una lista */
	public function get_infolist($idList){
		$sql = "SELECT * FROM " . $this->table . " WHERE id_list = ?";
		$query = $this->statement->prepare($sql);
		$query->bindParam(1, $idList);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if($result){
				return $result;
			}else{
				return false;
			}				
		}catch(PDOException $e){
			echo "Error al añadir la lista a la base de datos" . $e->getMessage();
			return false;
            //Falta añadir que si retorna falso o error, indicar que la lista ya existe
		}
	}

    /**Método para obtener una lista a partir del id_list */
	public function get_name_list($idList){
		$sql = "SELECT list_name FROM $this->table WHERE id_list = ?";
		$query = $this->statement->prepare($sql);
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


    /**Metodo para modificar algún atributo de cualquier lista.*/
	public function modifList($idList, $atribute, $data){
		$modifDate = date('Y-m-d H:i:s');
		$sql = "UPDATE lists SET $atribute = ?, modif_date = '$modifDate' WHERE id_list = ?";
		$query = $this->statement->prepare($sql);
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
            //Falta añadir que si retorna falso o error, indicar que la lista ya existe

		}
	}

    //Metodo para eliminar/ todas las listas que tiene un usuario en la papelera
	public function emptyTrash($idUser){
		$sql = "DELETE FROM $this->table WHERE trash = 1 and id_user = ?";
		$query = $this->statement->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			$rows = $query->rowCount();
			if($rows >= 0){
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo "Error a la hora de vaciar de la papelera. " . $e->getMessage();
		}
	}

    /**Método para obtener las listas de la papelera */
	public function get_trash_lists($idUser){
		$sql = "SELECT * FROM $this->table where id_user = ? and trash = 1 order by list_name";
		$query = $this->statement->prepare($sql);
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

    /**Método para seleccionar las listas que no estan en la papelera */
	public function get_active_lists($idUser){		
		$sql = "SELECT * FROM $this->table where id_user = ? and trash = 0 order by creation_date";
		$query = $this->statement->prepare($sql);
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
	}


    /**Método para obtener los items que estan con el check activo de una lista*/
	public function checked($idList){
		$sql = "SELECT items.* , lists.* FROM items INNER JOIN lists ON items.id_list = lists.id_list WHERE lists.id_list = ? and trash = 0 and items.is_check = 1 order by lists.creation_date";
		$query = $this->statement->prepare($sql);
		$query->bindParam(1, $idList);
		try{
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			$rows = $query->rowCount();
			if($rows > 0){
				$result['items'] = $rows;
				return $result ;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
	}

    /**
     * Función para obtener los items que que estan en la papelera y tienen el check activo de una lista
     */
    public function checked_trash($idList){
		$sql = "SELECT items.* , lists.* FROM items INNER JOIN lists ON items.id_list = lists.id_list WHERE lists.id_list = ? and trash = 1 and items.is_check = 1 order by lists.creation_date";
		$query = $this->statement->prepare($sql);
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

    /**
     * Método para obtener el numero de listas de un usuario
     */
    public function get_numberLists($idUser){
		$sql = "SELECT COUNT(*) FROM " . $this->table . " WHERE id_user = ?";
		$query = $this->statement->prepare($sql);
		$query->bindParam(1, $idUser);
		try{
			$query->execute();
			//Esto es necesario si no no devuelve el número de columnas.
			$count = $query->fetchColumn();
			if ($count !== false) { // Comprueba si se obtuvo el resultado
                return $count; // Retorna el número de listas
            } else {
                return 0; // No hay listas
            }
		}catch(PDOException $e){
			echo "Error al obtener la/s lista/s " . $e->getMessage();
		}
	}
}




?>
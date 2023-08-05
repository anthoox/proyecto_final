<?php

class Usuarios{
	private $tabla = 'users'; //Para que puedan usarlo sus clases hijas
	private $conexion;

	/**Contructor para conectar con el servidor al crear llamar a cualquier función de esta clase */
	public function __construct() {
        require_once 'C:/xampp/htdocs/proyecto/mvc/config/conexion.php';
		$this->conexion = new BD();
	}

    /**Método para crear usuario */
    public function crear_usuario($nombre, $correo, $password){        
		$fecha_registro = date('Y-m-d H:i:s');
		$sql = "INSERT INTO " . $this->tabla . " (name, email, password, registration_date, rol) VALUES (?, ?, ?, ?, 2)";
		$query = $this->conexion->conectar_bd()->prepare($sql);
		$query->bindParam(1, $nombre);
		$query->bindParam(2, $correo);
		$query->bindParam(3, $password);
		$query->bindParam(4, $fecha_registro);
		try{
			$resultado = $query->execute();
			return true;			
		}catch(PDOException $e){
			//La siguiente linea se puede quitar para que al devolver false se muestre un mensaje
			echo "Error o usuario ya registrado" . $e->getMessage();
			return false;
		}
    }

	public function obtener_password($correo){
		$sql = "SELECT password FROM " . $this->tabla . " WHERE email = ?";
		$query = $this->conexion->conectar_bd()->prepare($sql);
		$query->bindParam(1, $correo);
		try{
			return($query->execute()) ? $query->fetch()['password'] : false;
			
		}catch(PDOException $e){
			echo "Error al obtener la clave" . $e->getMessage();
		}
	}

	// public function existEmail($data){
	// 	$sql = "SELECT email FROM " . $this->table . " WHERE email = ?";
	// 	$query = $this->connection->getConnection()->prepare($sql);
	// 	$query->bindParam(1, $data);
	// 	try{
	// 		$query->execute();
	// 		$result = $query->fetch(PDO::FETCH_NUM);
	// 		if($result){
	// 			return $result;
	// 		}else{
	// 			return false;
	// 		}
			
	// 	}catch(PDOException $e){
	// 		echo "Erro en la comprobación del email. " . $e->getMessage();
	// 	}
	// }
	
	// /**Método para crear usuarios en la base de datos. Los usuarios creados por este método son usuarios normales */
	// public function createUser($name, $email, $password){
	// 	//Añador sal aquí
	// 	$passwordHased = hash('sha512', $password); 
	// 	$registration_date = date('Y-m-d H:i:s');
	// 	$result = $this->existEmail($email);
	// 	if(!$result){
	// 		$sql = "INSERT INTO " . $this->table . " (name, email, password, registration_date, rol) VALUES (?, ?, ?, ?, 2)";
	// 		$query = $this->connection->getConnection()->prepare($sql);
	// 		$query->bindParam(1, $name);
	// 		$query->bindParam(2, $email);
	// 		$query->bindParam(3, $passwordHased);
	// 		$query->bindParam(4, $registration_date);

	// 		try{
	// 			$query->execute();
	// 			$rows = $query->rowCount();
	// 			if($rows>0){
	// 				// echo "usuario creado";
	// 				return true;
	// 			}else{
	// 				// echo "usuario no creado";
	// 				return false;
	// 			}
				
	// 		}catch(PDOException $e){
	// 			echo "Error en la creación del usuario." . $e->getMessage();
	// 		}
	// 	}else{
	// 		return false;
	// 	}
	// 	// $this->connection->closeConnection();
	// }

	

	
}

// $prueba = new Usuarios();
// echo $prueba->obtener_password("prueba@p2rueba2.com");
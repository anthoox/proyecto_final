<?php
class Users_model extends Model
{
	private $tabla = 'users'; //Para que puedan usarlo sus clases hijas
	private $statement;

	function __construct()
	{
		parent::__construct();
		// *Instanciamos un objeto Model para llamar a las funciones de la clase Model cosa que se deberia hacer automaticamente al llamar al constructor arriba.
		$this->statement = new Model();
	}

	//*Método para crear usuario
	public function new_user($nombre, $correo, $password)
	{
		$fecha_registro = date('Y-m-d H:i:s');
		$sql = "INSERT INTO " . $this->tabla . " (name, email, password, registration_date, rol) VALUES (?, ?, ?, ?, 2)";
		$query = $this->statement->prepare($sql);
		$query->bindParam(1, $nombre);
		$query->bindParam(2, $correo);
		$query->bindParam(3, $password);
		$query->bindParam(4, $fecha_registro);
		try {
			$query->execute();
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}
	//*Método para obtener la contraseña del usuario
	public function get_password($correo)
	{
		$sql = "SELECT password FROM " . $this->tabla . " WHERE email = ?";
		// $query = $this->conexion->connect_db()->prepare($sql);
		$query = $this->statement->prepare($sql);
		$query->bindParam(1, $correo);
		try {
			return ($query->execute()) ? $query->fetch()['password'] : false;
		} catch (PDOException $e) {
			echo "Error al obtener la clave" . $e->getMessage();
		}
	}

	//*Método para obtener cualquier dato del usuario
	public function get_user_data($atributo, $dato)
	{
		$sql = "SELECT * FROM " . $this->tabla . "  WHERE $atributo = ?";
		// $query = $this->conexion->connect_db()->prepare($sql);
		$query = $this->statement->prepare($sql);
		$query->bindParam(1, $dato);
		try {
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if ($result) {
				return $result;
			} else {
				return false;
			}
		} catch (PDOException) {
			return false;
		}
	}
}

// $prueba = new Model_usuarios();
// var_dump($prueba->get_datos_usuario('email',"prueba@prueba.com"));
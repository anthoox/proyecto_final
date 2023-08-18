<?php
//Esto lo exije para mostrar la información en el mismo archivo para hacer efectivos los metodos usados aqui
require_once 'C:/xampp/htdocs/proyecto/mvc/libs/model.php';
class Model_Usuarios extends Model{
	private $tabla = 'users'; //Para que puedan usarlo sus clases hijas
	public $conexion;

	/**Contructor para conectar con el servidor al crear llamar a cualquier función de esta clase */
	function __construct(){
        parent::__construct();
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
			$query->execute();
			return true;			
		}catch(PDOException $e){
			return false;
		}
    }
	/**Método para obtener la contraseña del usuario */
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

	/**Método para obtener cualquier dato del usuario */
	public function get_datos_usuario($atributo,$dato){
		$sql = "SELECT * FROM " . $this->tabla . "  WHERE $atributo = ?";
		$query = $this->conexion->conectar_bd()->prepare($sql);
		$query->bindParam(1, $dato);
		try{
			$query->execute();
			$resultado = $query->fetch(PDO::FETCH_ASSOC);
			if($resultado){
				return $resultado;
			}else{
				return false;
			}
		}catch(PDOException){
			return false;
		}
	}

	
}

// $prueba = new Model_usuarios();
// var_dump($prueba->get_datos_usuario('email',"prueba@prueba.com"));
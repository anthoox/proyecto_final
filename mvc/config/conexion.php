<?php 
require_once 'C:/xampp/htdocs/proyecto/mvc/config/config.php';

//Clase para conectar y desconectar a la base de datos:
class BD{
    private $host = DB_HOST;
	private $db = DB;
	private $user = DB_USER;
	private $pass = DB_PASS;
	public $conexion;

	//Constructor para establecer directamente la conexión al instanciar un objeto de la clase bd
	public function __construct() {		
		try {
            $this->conexion = new PDO('mysql:host='.$this->host.'; dbname='.$this->db, $this->user, $this->pass);
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
            echo "Error al conectar a la base de datos. " . $e->getMessage();
            exit();
        }
	}

	/**Método para establecer la conexión */
	public function conectar_bd() {
        return $this->conexion;
    }

	//Método para cerrar la conexion con la base de datos
	public function desconectar_bd() {
        $this->conexion = null;
    }
} 
?>  
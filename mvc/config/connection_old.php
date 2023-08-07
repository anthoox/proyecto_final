<?php 
/**Carpeta con archivos clases para establecer la conexión con la base de datos */ 
require_once 'C:/xampp/htdocs/proyecto/mvc/config/config.php';
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
			// echo "conexion correcta<br>";
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
?>
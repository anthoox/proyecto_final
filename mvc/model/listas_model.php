<?php
//Esto lo exije para mostrar la información en el mismo archivo para hacer efectivos los metodos usados aqui
require_once 'C:/xampp/htdocs/proyecto/mvc/libs/model.php';
class Model_listas extends Model{
    private $tabla = 'lists';
    public $conexion;

    public function __construct(){
        parent::__construct();
    }

    public function get_listas_usuario($id_user){
        $sql = "SELECT * FROM " . $this->tabla . " WHERE id_user = ?";
		$query = $this->conexion->conectar_bd()->prepare($sql);
		$query->bindParam(1, $id_user);
        try{
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
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

$prueba = new Model_listas();
var_dump($prueba->get_listas_usuario(3));
?>
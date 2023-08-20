<?php
//Esto lo exije para mostrar la información en el mismo archivo para hacer efectivos los metodos usados aqui y en otras ventanas
require_once 'C:/xampp/htdocs/proyecto/mvc/config/db.php';
class Model{
    protected $conexion;//protected para que lo usen sus herederos

    //Función constructora que establece la conexión con la base de datos
    function __construct(){
        $this->conexion = new DB();
    }

    function query($query){
        //Ejecuta una consulta SQL y devuelve el resultado como un objeto PDOStatement
        return $this->conexion->connect_db()->query($query);
    }

    function prepare($query){
        return $this->conexion->connect_db()->prepare($query);
    }
}
?>
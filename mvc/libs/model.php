<?php
//Esto lo exije para mostrar la información en el mismo archivo para hacer efectivos los metodos usados aqui y en otras ventanas
require_once 'C:/xampp/htdocs/proyecto/mvc/config/conexion.php';
class Model{
    public $conexion;
    //Función constructora que establece la conexión con la base de datos
    function __construct(){
        $this->conexion = new BD();
    }

    function query($query){
        //Ejecuta una consulta SQL y devuelve el resultado como un objeto PDOStatement
        return $this->conexion->conectar_bd()->query($query);
    }

    function prepare($query){
        return $this->conexion->conectar_bd()->prepare($query);
    }
}
?>
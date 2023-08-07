<?php
//Esto lo exije para mostrar la información en el mismo archivo para hacer efectivos los metodos usados aqui y en otras ventanas
require_once 'C:/xampp/htdocs/proyecto/mvc/config/conexion.php';
class Model{
    public $conexion;
    //Función constructora que establece la conexión con la base de datos
    function __construct(){
        $this->conexion = new BD();
    }
}
?>
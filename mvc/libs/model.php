<?php

// require_once 'C:/xampp/htdocs/proyecto/mvc/config/db.php';

class Model
{
    //*Función constructora que establece la conexión con la base de datos
    function __construct()
    {
        $this->conexion = new DB();
    }

    function query($query)
    {
        return $this->conexion->connect_db()->query($query);
    }

    function prepare($query)
    {
        return $this->conexion->connect_db()->prepare($query);
    }
}

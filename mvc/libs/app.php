<?php
    class App{

        function __construct(){

            $url = isset($_GET['url']) ? $url = $_GET['url']: null;
            $url = rtrim($url, '/');
            $url = explode('/',$url);
             //Cuando se ingresa sin definir controlador
            if(empty($url[0])){
                $archivoController =  'mvc/'.$url[0] . '.php';
                require_once $archivoController;
            }
            
            // var_dump($url);
            $archivoController =  'mvc/'.$url[0] . '.php';
            if(file_exists($archivoController)){
                require_once $archivoController;
                $controller = new $url[0];
                if(isset($url[1])){
                    $controller->{$url[1]}();
                }
            }else{
                // echo "Error en la URL";
            }
        }

    }

?>

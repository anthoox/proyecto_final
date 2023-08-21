<?php

require_once 'controllers/errores.php';

    class App{

        function __construct(){
            //Si existe una url nos quedamos con ese valor si no, lo hacemos nulo
            $url = isset($_GET['url']) ? $url = $_GET['url']: null;
            //Borra cualquier "/" que se encuentre al final de la url
            $url = rtrim($url, '/');
            //Separa por cada "/" que se encuentre en la url
            $url = explode('/',$url);

            //Si esta vacío o no existe redirigeme a index.php
            if(empty($url[0])){
                error_log('APP::construct-> no hay controlador especificado');
                $archivoController =  'index.php';
                require_once $archivoController;        
            }else{
                $archivoController = $url[0] . '.php';  


                if(file_exists($archivoController)){
                    require_once $archivoController;
        
                    //Lo dejo comentado porque sino, no carga el index y tambien cargaria el archivo de prueba en el mismo index. 
                    //Yo diría que con esto ya funciona y puedo avanzar
                    $controller = new $url[0];
                    
                    // if(isset($url[1])){
                    //     if(method_exists($controller, $url[1])){
                    //         if(isset($url[2])){
                    //             //nº de parámetros
                    //             $nparam = count($url)-2;
                    //             $params = [];
    
                    //             for($i = 0; $i<$nparam; $i++){
                    //                 array_push($params, $url[$i]+2);
                    //             }
    
                    //             $controller->{$url[1]}($params);
    
                    //         }else{
                    //             //SE llama el método tal cual sin esos parametros
                    //             $controller->{$url[1]}();
                    //         }
                    //     }else{
                    //         // No existe el método
                    //         $controller = new Errores();
                    //     }
                    //     $controller->{$url[1]}();
                    // }else{
                    //     //Si no hay método para cargar, se carga el por defecto
                    //     // $controller->render();
                    // }
                }else{      
                    
                    $controller = new Errores();
                
                }
            }
            
                     
             
            
          
            
        }

    }

?>

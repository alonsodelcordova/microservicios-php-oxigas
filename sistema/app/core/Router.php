<?php

class Router
{
    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $base_url = $_SERVER['REQUEST_URI'];
        $base_url = $base_url !== '/'? $base_url : '/home/index';
        $data_url = explode('?', $base_url);

        $path = $data_url[0];
        $url = explode('/', $path);
        
        


        $controllerName = ucfirst($url[1]) . 'Controller';
        $method = $url[2] ?? 'index';

        $controllerPath = "../app/controllers/$controllerName.php";
        if (!file_exists($controllerPath)) {
            die('Controller no encontrado');
        }
        require_once "../app/core/Controller.php";

        require_once $controllerPath;

        $controller = new $controllerName();

        if (!method_exists($controller, $method)) {
            die('Método no encontrado');
        }

        $controller->$method();
    }
}

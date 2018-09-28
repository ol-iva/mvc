<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routePath = ROOT . '/applications/config/routers.php';
        $this->routes = include($routePath);
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
       //получить строку запроса;
        $uri = $this->getURI();
       // echo $uri;

        //проверить наличие такого запроса в routers.php;
        foreach ($this->routes as $uriPattern => $path) {
            //echo "<br>$uriPattern -> $path";

            // сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

             //получаем внутренний путь из внешнего:
               $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
               //определить какой контроллер и актион обрабатывают запрос
                $segments = explode('/', $internalRoute);
                //первые директории пути на локальном хосте отбросить
                $projectName = array_shift($segments);
                $directName = array_shift($segments);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
               //echo $controllerName;
                $actionName = 'action'.ucfirst(array_shift($segments));
//                echo 'Class: '.$controllerName;
//                echo 'Method: ' . $actionName;
                $parameters = $segments;
//                echo '<pre>';
//                print_r($parameters);
                //если есть совпадение, определить, какой контроллер и action обрабатывают запрос;
                //подключить файл класса-контроллера;
            $controllerFile = ROOT.'/applications/controllers/'.$controllerName.'.php';
            if(file_exists($controllerFile)){
                include_once($controllerFile);
            }
                //создать объект, вызвать action;
            $controllerObject = new $controllerName;

            //$result =$controllerObject->$actionName($parameters);
           $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
            if($result != null) {
                break;
            }

            }
        }
    }
}
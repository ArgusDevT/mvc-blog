<?php

namespace app\core;

class Router
{
    public static function start()
    {
        $route = isset($_REQUEST['route']) ? $_REQUEST['route'] : 'index';

        $routes = [
            'index' => ['controller' => 'indexController', 'model' => "index", 'action' => 'index'],
            'page' => ['controller' => 'indexController', 'model' => "index", 'action' => 'page'],
            'apanel' => ['controller' => 'adminController', 'model' => "admin", 'action' => 'apanel'],
            'apanel/pages' => ['controller' => 'adminController', 'model' => "admin", 'action' => 'apanel_pages'],
            'api/v1' => ['controller' => 'apiController', 'model' => "api", 'action' => 'v1'],
        ];

        if (array_key_exists($route, $routes)) {
            $controllerName = $routes[$route]['controller'];
            $actionName = $routes[$route]['action'];
            $modelName = $routes[$route]['model'];
            self::dispatch($controllerName, $actionName, $modelName);
        } else {
            self::error('404');
        }
    }

    private static function dispatch($controllerName, $actionName, $modelName)
    {
        $controllerClass = 'app\\controllers\\' . $controllerName;
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass($controllerName, $actionName, $modelName);
            if (method_exists($controller, $actionName)) {
                $controller->$actionName();
            } else {
                self::error('404');
            }
        } else {
            self::error('404');
        }
    }

    public static function error($code)
    {
        require_once("public/views/errors/$code.php");
        exit;
    }
}

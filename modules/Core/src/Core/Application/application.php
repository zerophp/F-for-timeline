<?php
namespace Core\Application;

class application
{        
    static $view;
    static $config;
    static $controller;
    static $action;  
    
    public static function setConfig($config)
    {
        include_once '../modules/Core/src/Router/model/parseUrl.php';
        include_once '../modules/Core/src/Module/model/moduleManager.php';
        self::$config = moduleManager($config);  
        $request = parseURL();
        self::$controller = $request['controller'];
        self::$action = $request['action'];
    }

    public static function getConfig()
    {
        return self::$config;
    }

    public static function dispatch()
    {
        $controllerNameClass= '\Application\controllers\\'.self::$controller;
        
        $controller = new $controllerNameClass();
        $actionName = self::$action;
        ob_start();
            $controller->$actionName();
        self::$view=ob_get_contents();
        ob_end_clean();

        self::twoStep($controller->layout);
    }

    public static function twoStep($layout)
    {
        echo self::$view;
        echo $layout;
    }    
  
}

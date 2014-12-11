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
        self::$config = \Core\Application\Module\model\moduleManager::moduleManager($config);  
        $request = \Core\Application\Router\model\parseURL::parseURL();
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

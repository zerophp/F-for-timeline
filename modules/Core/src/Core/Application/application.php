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
        echo "<pre>Request: ";
        print_r($request);
        echo "</pre>";
        
        self::$controller = $request['controller'];
        self::$action = $request['action'];
        
//         $this->controller = $request['controller'];
//         $this->action = $request['action'];
    }
    
    
//     public function __construct($config)
//     {

//         include_once '../modules/Core/src/Router/model/parseUrl.php';
//         include_once '../modules/Core/src/Module/model/moduleManager.php';
              
        
//         self::$config = moduleManager($config);

//         $request = parseURL();
//         echo "<pre>Request: ";
//         print_r($config);
//         echo "</pre>";

//         $this->controller = $request['controller'];
//         $this->action = $request['action'];


//     }

    public static function getConfig()
    {
        return self::$config;
    }

    public static function run()
    {
//         $controllerNameClass = 'Application_src_Application_controllers_'.
//             $this->controller;
        $controllerNameClass= '\Application\controllers\\'.self::$controller;
        echo $controllerNameClass;
        
        $controller = new $controllerNameClass();
        $actionName = self::$action;
        ob_start();
            $controller->$actionName();
        self::$view=ob_get_contents();
        ob_end_clean();

        self::renderLayout();
    }

    public static function renderLayout()
    {
        echo self::$view;
    }
    
  
//     public function __destruct()
//     {
//         echo self::$view;
//         //include ('../modules/Application/src/Application/layouts/'.$this->controller->layout);
//     }
}

<?php
// namespace Core\Application;


class Core_src_Application_application
{
    private static $controller;
    private static $action;
    private static $view;
    private static $config;

    public static function setConfig($config)
    {
        self::$config = Core_src_Module_model_moduleManager::moduleManager($config);

        $request = Core_src_Router_model_parseUrl::parseURL();

        self::$controller = $request['controller'];
        self::$action = $request['action'];
    }

    public static function getConfig()
    {
        return self::$config;
    }

    public static function run()
    {
        $controllerNameClass = 'Application_src_Application_controllers_'.
            self::$controller;

        $controller = new $controllerNameClass();
        $actionName = self::$action;
        ob_start();
            $controller->$actionName();
        self::$view=ob_get_contents();
        ob_end_clean();
        
        self::renderView();

    }

    public static function renderView()
    {
        echo self::$view;
    }
}

<?php
namespace Application\controllers;

use Core\Application\application;

class Timelines
{
    public $layout = 'none.phtml';
    
    public function index()
    {
        
        $config = app\application::$method();
       echo $config;
        $service = new Services\Timelines();
        return $service->application::$method();
        
       

    }
   
    
}






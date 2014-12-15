<?php
namespace Application\controllers;

use Core\Application\application;

class Timelines
{
    public $layout = 'none.phtml';
    
    public function index()
    {
        
       
        $service = new Services\Timelines();
        return $service->application::$method();
        
       

    }
   
    
}






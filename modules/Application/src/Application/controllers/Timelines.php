<?php
namespace Application\controllers;

use Application\Services;

class Timelines
{
    public $layout = 'none.phtml';
    
    public function index()
    {
        $service = new Services\Timelines();
        $method = \Core\Application\application::$method;
        
        $id = \Core\Application\application::$params;
        
        $response = $service->$method($id, file_get_contents('php://input'));
        header('Content-Type: application/json');
        return $response;
    }
   
    
}






<?php
namespace Application\Controllers;

use Core\Application\Application;
use Application\Services\Timelines as Services;

class Timelines
{
    public $layout = null;
    
    public function index()
    {        
        $service = new Services();     
        $id = \Core\Application\application::$params;  
        $response = $service->{Application::$method}
                    ($id, file_get_contents('php://input'));
        header('Content-Type: application/json');
        return $response;
    }
}

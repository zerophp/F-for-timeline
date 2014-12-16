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
        echo $service->{Application::$method}();
    }
}
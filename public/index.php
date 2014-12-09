<?php

// echo "<pre>Post: ";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>GET: ";
// print_r($_GET);
// echo "</pre>";

// echo "<pre>";
// print_r($_SERVER['REQUEST_URI']);
// echo "</pre>";

include_once '../modules/Core/src/Router/model/parseUrl.php';
include_once '../modules/Core/src/Module/model/moduleManager.php';

$request = parseURL();
$config = moduleManager('../config/global.php');



switch($request['controller'])
{
    case 'timeline':
        include ('../modules/Application/src/Application/controllers/timeline.php');
    break;
    default:
    case 'usuarios':
        ob_start();
            include ('../modules/Application/src/Application/controllers/usuarios.php');
            $view=ob_get_contents();
        ob_end_clean();
    break;
    
    break;

    case 'error':       
        $error_type='404';
        include ('../modules/Application/src/Application/controllers/error.php');
    break;    
    
}

include ('../modules/Application/src/Application/layouts/dashboard.phtml'); 

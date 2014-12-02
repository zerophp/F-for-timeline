<?php
echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>GET: ";
print_r($_GET);
echo "</pre>";


// echo "<pre>";
// print_r($_SERVER['REQUEST_URI']);
// echo "</pre>";

include_once '../modules/Core/src/Router/model/parseUrl.php';

$request = parseURL();

echo "<pre>Request: ";
print_r($request);
echo "</pre>";


switch($request['controller'])
{
    case 'timeline':
        include ('../modules/Application/src/Application/controllers/timeline.php');
    break;
    default:
    case 'usuarios':
        include ('../modules/Application/src/Application/controllers/usuarios.php');
    break;

    case 'error':       
        $error_type='404';
        include ('../modules/Application/src/Application/controllers/error.php');
    break;    
    
}

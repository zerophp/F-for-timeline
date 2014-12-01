<?php


// echo "<pre>";
// print_r($_SERVER['REQUEST_URI']);
// echo "</pre>";

$data = explode('/',$_SERVER['REQUEST_URI']);
$controller = $data[1];
@$action = $data[2];

echo "<pre>Data: ";
print_r($data);
echo "</pre>";

echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>GET: ";
print_r($_GET);
echo "</pre>";




switch($controller)
{
    case 'timeline':
        include ('../modules/Application/src/Application/controllers/timeline.php');
    break;
    case 'usuarios':
        include ('../modules/Application/src/Application/controllers/usuarios.php');
    break;

    case 'error':       
        $error_type='404';
        include ('../modules/Application/src/Application/controllers/error.php');
    break;    
    
}

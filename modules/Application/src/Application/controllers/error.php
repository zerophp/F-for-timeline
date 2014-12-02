<?php
if(!isset($error_type))
    $error_type = '404';

/**
 * 
 */
switch ($error_type)
{
    case '404':
        echo "Página no encontrada: " .$error_type;
        echo "<img src='../assets/img/404.jpg'>";
        break;
    default:
        echo 'Sin capturar'.$error_type;
        break;
}
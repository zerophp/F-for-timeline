<?php

function __autoload($class)
{
    $parts = explode('\\', $class);
    $path = '';
    $file = array_pop($parts);
    
//		echo '<pre>';
//		print_r($parts);
//		echo '</pre>';
//
	
    foreach($parts as $value)
    {
        $path .= $value . DIRECTORY_SEPARATOR; 
    }         
    $module = array_shift($parts);
    
    $include = __DIR__ . DIRECTORY_SEPARATOR .
				'modules' . DIRECTORY_SEPARATOR .
				$module . DIRECTORY_SEPARATOR .
				'/src/' . DIRECTORY_SEPARATOR . $path . $file . '.php';
    
    include $include;
	return;    
}
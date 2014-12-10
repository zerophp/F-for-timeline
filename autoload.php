<?php

function __autoload($class)
{
    $parts = explode('\\', $class);
    
    $path2 = '';
     $file = array_pop($parts);
    
     foreach($parts as $value)
     {
        $path2 .= $value."\\"; 
     }
     
     $module = array_shift($parts);
     $include = __DIR__."/modules/".$module."/src/".$path2.$file.'.php';
         
     include $include;
}
<?php

function __autoload($class)
{
    $parts = explode('\\', $class);
<<<<<<< HEAD
    
    $path2 = '';
     $file = array_pop($parts);
    
     foreach($parts as $value)
     {
        $path2 .= $value."\\"; 
     }
     
     $module = array_shift($parts);
     $include = __DIR__."/modules/".$module."/src/".$path2.$file.'.php';
         
     include $include;
=======

    $path2 = '';
    $file = array_pop($parts);
    
    foreach($parts as $value)
    {
        $path2 .= $value."\\"; 
    }         
    $module = array_shift($parts);
    
    $include = __DIR__."/modules/".$module."/src/".$path2.$file.'.php';
    
    include $include;
    return;    
>>>>>>> 04d8d5d7c250678a4e751244ac7334cb3fec1d3a
}
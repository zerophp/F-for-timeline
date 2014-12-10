<?php

function __autoload($class)
{
    $path = explode('_',$class);
         
     $path2 = '';
     $file = array_pop($path);
     foreach($path as $value)
     {
        $path2 .= $value."/"; 
     }
     
     include "/".$path2.$file.'.php';
}
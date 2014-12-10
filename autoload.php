<?php

function __autoload($class)
{
    echo "--".$class.'--2-';
    echo __NAMESPACE__;
    //$path = __DIR__.'/modules/Application/src/Application/controllers/'.
//                 $class.'.php';
    
    //$path = _
    
    $path = explode('_',$class);
        echo "<pre>";
        print_r($path);
         echo "</pre>";
         
        // echo array_pop($path);
         $path2 = '';
         $file = array_pop($path);
         foreach($path as $value)
         {
            $path2 .= $value."/"; 
         }
         
         echo "/".$path2.$file.'.php';

         include "/".$path2.$file.'.php';
    echo "--AUTOLOAD--";
    
}
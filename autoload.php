<?php

function __autoload($class)
{
//     echo "--".$class.'--2-';
//     echo __NAMESPACE__;
    
    
    
    $parts = explode('\\', $class);
    
    echo "<pre>";
    print_r($parts);
    echo "</pre>";
    
    $path2 = '';
         $file = array_pop($parts);
        
         foreach($parts as $value)
         {
            $path2 .= $value."\\"; 
         }
         
         $module = array_shift($parts);
         $include = __DIR__."/modules/".$module."/src/".$path2.$file.'.php';
        
         echo $include;
//          echo "<br/>";
//          $filee="C:/www2/ffortimeline/modules/Core/src/Application/application.php"; 
//          echo $filee;
         
         include $include;
//         include $path2.$file.'.php';
//     echo $path2;
    
    
//     require end($parts) . '.php';
    
//     include $class.'.php';
    
//     die;
    //$path = __DIR__.'/modules/Application/src/Application/controllers/'.
//                 $class.'.php';
    
    //$path = _
    
//     $path = explode('_',$class);
//         echo "<pre>";
//         print_r($path);
//          echo "</pre>";
         
//         // echo array_pop($path);
//          $path2 = '';
//          $file = array_pop($path);
//          foreach($path as $value)
//          {
//             $path2 .= $value."/"; 
//          }
         
//          echo "/".$path2.$file.'.php';

//          include "/".$path2.$file.'.php';
//     echo "--AUTOLOAD--";
    
}
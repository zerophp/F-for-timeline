<?php


function createUser($postfilter, $config)
{
    switch ($config['repository'])
    {
        case 'txt':
            $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
            return write2txt($filename,$postfilter);
        break;
        case 'db':
            include_once __DIR__.'/write2db.php';
            return write2db($config,$postfilter);         
        break;
        case 'gd':
        break;
    }
      
}
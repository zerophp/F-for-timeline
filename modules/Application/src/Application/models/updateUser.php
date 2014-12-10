<?php
/**
 * Update users
 * 
 * @return number | FALSE
 */
function updateUser($postfilter, $config)
{
    include_once ('fetchAllUser.php');
    switch ($config['repository'])
    {
        case 'txt':
            $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
            return update2txt($filename,$postfilter);
        break;
        case 'db':
            include_once __DIR__.'/update2db.php';
            return update2db($config,$postfilter);
        break;
        case 'gd':
            break;
    }
}
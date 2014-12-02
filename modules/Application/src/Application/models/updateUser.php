<?php
/**
 * Update users
 * 
 * @return number | FALSE
 */
function updateUser($postfilter)
{
    include_once ('fetchAllUser.php');
    $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
    $usuarios = fetchAllUser();
    // Reeemplazar la linea ID
    // Por el string de usuario
    $usuarios[$postfilter['id']]=implode("|", $postfilter);
    // Juntar los datos del usuario por pipes
    // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
    $usuarios=implode("\n",$usuarios);
    
    return file_put_contents($filename, $usuarios);   
}
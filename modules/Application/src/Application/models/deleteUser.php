<?php


function deleteUser($id)
{
    include_once ('fetchAllUser.php');
    $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
    $usuarios = fetchAllUser();
    unset($usuarios[$id]);
    // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
    $usuarios=implode("\n",$usuarios);
    return  file_put_contents($filename, $usuarios);
}
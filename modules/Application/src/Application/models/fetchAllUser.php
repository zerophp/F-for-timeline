<?php

function fetchAllUser()
{
    // Si es valido
    // Leer el archivo de texto en un string
    $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
    $usuarios = file_get_contents($filename);
    
    // Obtener un array desde el string
    $usuarios = explode("\n", $usuarios);
    
    return $usuarios;
}
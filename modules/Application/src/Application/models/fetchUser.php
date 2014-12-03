<?php

/**
 * Fetch user by id
 * 
 * @param int $id
 * @return array:
 */
function fetchUser($id)
{
    // Leer el archivo de texto en un string
    $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
    $usuarios = file_get_contents($filename);
    // Obtener un array desde el string
    $usuarios = explode("\n", $usuarios);
    // Tomar el usuario ID
    // Separar el usuario por pipes para tener una array
    $usuario = explode("|", $usuarios[$id]);
    
    return $usuario;
}
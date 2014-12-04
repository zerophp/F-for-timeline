<?php

/**
 * Fetch user by id
 * 
 * @param int $id
 * @return array:
 */
function fetchUser($id, $config)
{
    switch ($config['repository'])
    {
        case 'txt':
            // Leer el archivo de texto en un string
            $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
            $usuarios = file_get_contents($filename);
            // Obtener un array desde el string
            $usuarios = explode("\n", $usuarios);
            // Tomar el usuario ID
            // Separar el usuario por pipes para tener una array
            $usuario = explode("|", $usuarios[$id]);
            
            return $usuario;
        case 'db':
            // Conectar a la DBMS
            $link = mysqli_connect($config['database']['host'],
            $config['database']['user'],
            $config['database']['password']
            );
            // Seleccionar DB
            mysqli_select_db($link, $config['database']['db']);
    
            // Select user
            $sql = "SELECT * FROM users WHERE iduser = " . $id;
            $result = mysqli_query($link, $sql);
            
            return mysqli_fetch_assoc($result);
            
            break;
        case 'gd':
            break;
    }
}
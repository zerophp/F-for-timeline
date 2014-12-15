<?php

function fetchAllUser($config)
{
   
    
    
    
    switch ($config['adapter'])
    {
        case 'txt':
             // Si es valido
            // Leer el archivo de texto en un string
            $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
            $usuarios = file_get_contents($filename);
            
            // Obtener un array desde el string
            $usuarios = explode("\n", $usuarios);
            
            return $usuarios;
        break;
        case 'db':
            // Conectar a la DBMS
            $link = mysqli_connect($config['database']['host'],
                $config['database']['user'],
                $config['database']['password']
            );
            // Seleccionar DB
            mysqli_select_db($link, $config['database']['db']);
            
            $sql = "SELECT * FROM users";
            $result = mysqli_query($link, $sql);
            
            while($row = mysqli_fetch_assoc($result))
            {
                $usuarios[$row['iduser']]=implode("|", $row);
            }
            
            return $usuarios;
        break;
        case 'gd':
        break;
    }
}
<?php


function deleteUser($id,$config)
{
    
    switch ($config['repository'])
    {
        case 'txt':
            $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
            include_once ('fetchAllUser.php');
            $usuarios = fetchAllUser();
            unset($usuarios[$id]);
            // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
            $usuarios=implode("\n",$usuarios);
            return  file_put_contents($filename, $usuarios);
        case 'db':
            // Conectar a la DBMS
            $link = mysqli_connect($config['database']['host'],
                $config['database']['user'],
                $config['database']['password']
            );
            // Seleccionar DB
            mysqli_select_db($link, $config['database']['db']);
            
            // INSERT INTO users...
            $sql = "DELETE FROM users WHERE
				iduser = ".$id;
            
            $data =mysqli_query($link, $sql);
           
            break;
        case 'gd':
            break;
    }
    
    
    

    
    
}
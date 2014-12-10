<?php


function hydrateUser($usuario,$config)
{
    
    switch ($config['repository'])
    {
        case 'txt':
            $data_usuario = array (
                'name'=>$usuario[1],
                'email'=>$usuario[2],
                'password'=>$usuario[3],
                'id'=>$usuario['id']
            );
            return $data_usuario;
        break;
        case 'db':
            $data_usuario = array (
                'name'=>$usuario['name'],
                'email'=>$usuario['email'],
                'password'=>$usuario['password'],
                'id'=>$usuario['iduser']
            );
            return $data_usuario;
        break;
        case 'gd':
            break;
    }
    
   
}
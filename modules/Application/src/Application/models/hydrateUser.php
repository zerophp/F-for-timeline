<?php


function hydrateUser($usuario)
{
    $data_usuario = array (
        'name'=>$usuario[1],
        'email'=>$usuario[2],
        'password'=>$usuario[3],
        'id'=>$usuario['id']
    );
    
    return $data_usuario;
}
<?php
include_once (__DIR__ . '/../../forms/usuariosForm.php');
include_once (__DIR__ . '/../models/write2txt.php');
include_once (__DIR__ . '/../models/fetchAllUser.php');
include_once (__DIR__ . '/../models/fetchUser.php');
include_once (__DIR__ . '/../models/createUser.php');
include_once (__DIR__ . '/../models/updateUser.php');
include_once (__DIR__ . '/../models/hydrateUser.php');
include_once (__DIR__ . '/../models/deleteUser.php');
include_once (__DIR__ . '/../../../../Core/src/Forms/model/filterForm.php');
include_once (__DIR__ . '/../../../../Core/src/Forms/model/validate.php');
include_once (__DIR__ . '/../../../../Core/src/Forms/model/drawForm.php'); 
include_once (__DIR__ . '/../../forms/usuariosdeleteForm.php');

switch ($request['action'])
{
    case 'insert':
        if ($_POST)
        {            
            $postfilter = filterForm($_POST, $usuarios_form);     
            $validate = validate($postfilter, $usuarios_form);                        
            if($validate['valid'])
            {
                // Guardar en un archivo separado por pipes                
                createUser($postfilter);
                header('Location: /usuarios/select');                 
            }
        }     
        else 
        {
            // Formulario de insert                        
            include ('/../views/usuarios/insert.phtml');
        }
    break;
    case 'update':
        if($_POST)
        {	
            include_once (__DIR__ . '/../../forms/usuariosForm.php');
            include_once (__DIR__ . '/../../filterForm.php');
            include_once (__DIR__ . '/../../validate.php'); 
            // Filtrar
            // Validar             
            $postfilter = filterForm($_POST, $usuarios_form);
            $validate = validate($postfilter, $usuarios_form);
            // Si es valido
            if($validate['valid'])
            {
                    $usuarios = updateUser($postfilter);             
            }
            // Ir a select
            header('Location: /usuarios/select');                
        }
        else 
        {
            $usuario = fetchUser($request['params']['id']);  
            $usuario['id']=$request['params']['id'];
            $data_usuario = hydrateUser($usuario);           
            // Dibujar el formulario con los datos del usuario
            include ('/../views/usuarios/update.phtml');            
        }
       
    break;
    case 'delete':
        echo "esto es el delete";
        
        if($_POST)
        {
            include_once (__DIR__ . '/../../forms/usuariosForm.php');
            include_once (__DIR__ . '/../../filterForm.php');
            include_once (__DIR__ . '/../../validate.php'); 
            // Filtrar
            // Validar              
            $postfilter = filterForm($_POST, $usuariosdelete_form);
            $validate = validate($postfilter, $usuariosdelete_form);
            // Si es valido
            if($validate['valid'])
            {
                // Eliminar la linea ID
                if($postfilter['enviar']=='Si')
                {
                    deleteUser($postfilter['id']);
                }     
                 // Ir a select
                 header('Location: /usuarios/select'); 
            }            
        }
        else
        {
            $usuario = fetchUser($request['params']['id']);            
            $data_usuario = array (
                'name'=>$usuario[1],
                'id'=>$request['params']['id']
            );            
            // Dibujar el formulario de delete con los datos del usuario
            // Dibujar el formulario con los datos del usuario
            include ('/../views/usuarios/delete.phtml');
        }
    break;
    default:
    case 'select':
        $data = fetchAllUser();
        include ('/../views/usuarios/select.phtml');
    break;
}



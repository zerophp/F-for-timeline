<?php
namespace Application\controllers;


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


use Application\mapper;

// class Application_src_Application_controllers_usuarios
class usuarios
{
    public $layout = 'dashboard.phtml';
    
    public function insert()
    {
        if ($_POST)
        {
            $postfilter = filterForm($_POST, $usuarios_form);
            $validate = validate($postfilter, $usuarios_form);
            if($validate['valid'])
            {
                $config = \Core\Application\application::getConfig();
                // Guardar en un archivo separado por pipes
                createUser($postfilter, $config);
                header('Location: /usuarios/select');
            }
        }
        else
        {
            // Formulario de insert
            include ('/../views/usuarios/insert.phtml');
        }
    }
    
    public function update($params)
    {
        $config = \Core\Application\application::getConfig();
        
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
                $usuarios = updateUser($postfilter, $config);             
            }
            // Ir a select
            header('Location: /usuarios/select');                
        }
        else 
        {
            $usuario = fetchUser($params['id'], $config);  
            $usuario['id']=$params['id'];
            $data_usuario = hydrateUser($usuario, $config);           
            // Dibujar el formulario con los datos del usuario
            include ('/../views/usuarios/update.phtml');            
        }
    }
    
    public function delete($params)
    {
        $config = \Core\Application\application::getConfig();
        
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
                    deleteUser($postfilter['id'], $config);
                }
                // Ir a select
                header('Location: /usuarios/select');
            }
        }
        else
        {
            $usuario = fetchUser($params['id'],$config);
            if($config['repository']=='db')
                $data_usuario = array (
                    'name'=>$usuario['name'],
                    'id'=>$params['id']
                );
                elseif($config['repository']=='txt')
                $data_usuario = array (
                    'name'=>$usuario[1],
                    'id'=>$params['id']
                );
                // Dibujar el formulario de delete con los datos del usuario
                // Dibujar el formulario con los datos del usuario
                include ('/../views/usuarios/delete.phtml');
        }
    }
    
    public function index()
    {
        $config =  \Core\Application\application::getConfig();
        
        $mapper =  new mapper\Users();
//         $adapter = $mapper ->getAdapter();
        $usuarios = $mapper->getAdapter()->fetchAll();        
        
        echo "<hr>";
        $data = $usuarios;//fetchAllUser($config);

		include (__DIR__ . '/../views/usuarios/select.phtml');
    }  
}



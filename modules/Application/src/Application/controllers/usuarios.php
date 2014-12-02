<?php

if(!isset($action))
    $action = 'select';

switch ($action)
{
    case 'insert':
        if ($_POST)
        {
            include_once (__DIR__ . '/../../forms/usuariosForm.php');
            include_once (__DIR__ . '/../../filterForm.php');
            include_once (__DIR__ . '/../../validate.php');          
           
            $postfilter = filterForm($_POST, $usuarios_form);     
            $validate = validate($postfilter, $usuarios_form);                        
            if($validate['valid'])
            {
                // Guardar en un archivo separado por pipes
                $data = implode ("|",$postfilter);
                $data.="\n";
                $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
                file_put_contents($filename, $data, FILE_APPEND);
                header('Location: /usuarios/select');                 
            }
        }     
        else 
        {
            // Formulario de insert
            include_once (__DIR__ . '/../../forms/usuariosForm.php');
            include_once (__DIR__ . '/../../drawForm.php');            
            echo drawForm($usuarios_form, '/usuarios/insert', null);
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
            if ($validate){
                // Leer el archivo de texto en un string
                $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
                // Devuelve el contenido del fichero a un string
                $usuarios = file_get_contents($filename);               
                //Obtener un array desde el string
                $usuarios = explode("\n", $usuarios);
                // Reemplazar la linea ID
                   // Por el string de usuario
                        // Juntar los datos del usuario por pipes
                $usuarios[$data[4]]=implode ("|",$postfilter);
                // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
                file_put_contents($filename, implode ("\n",$usuarios));
                // Ir a select 
                header('Location: /usuarios/select'); 
            }
        }
        else 
        {
            // Tomar el id
            // Leer el archivo de texto en un string
            $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
            $usuarios = file_get_contents($filename);
            // Obtener un array desde el string
            $usuarios = explode("\n", $usuarios);
            // Tomar el usuario ID
            // Separar el usuario por pipes para tener una array
            $usuario = explode("|", $usuarios[$data[4]]);

            print_r($usuario);
            
            $data_usuario = array (
                    'name'=>$usuario[0],
                    'email'=>$usuario[1],
                    'password'=>$usuario[2]
            );
            
            print_r($data_usuario);
            
            die;
            include_once (__DIR__ . '/../../forms/usuariosForm.php');
            // Dibujar el formulario con los datos del usuario
            include_once (__DIR__ . '/../../drawForm.php');
            drawForm($usuarios_form,  '/usuarios/update', $data_usuario);
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
            $postfilter = filterForm($_POST, $usuarios_form);
            $validate = validate($postfilter, $usuarios_form);
            // Si es valido
            if ($validate){
                // Leer el archivo de texto en un string
                $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
                $usuarios = file_get_contents($filename);
                // Obtener un array desde el string
                $usuarios = explode("\n", $usuarios);
                // Eliminar la linea ID
                unset($usuarios[$data[4]]);
                // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
                file_put_contents($filename, implode ("\n",$usuarios));
                // Ir a select 
                header('Location: /usuarios/select'); 
            }
        }
        else
        {
            // Tomar el id
            // Leer el archivo de texto en un string
            // Obtener un array desde el string
            $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
            $usuarios = file_get_contents($filename);
            $usuarios = explode("\n", $usuarios[$data[4]]);
            print_r ($usuarios);
            // Tomar el usuario ID
            // Separar el usuario por pipes para tener una array
            $usuario = explode("|", $usuarios[$data[4]]);
            
            print_r ($usuario);
            
            $data_usuario = array (
                    'name'=>$usuario[0],
                    'email'=>$usuario[1]//,
                    //'password'=>$usuario[2]
            );
            // Dibujar el formulario de delete con los datos del usuario
            include_once (__DIR__ . '/../../forms/usuariosdeleteForm.php');
            include_once (__DIR__ . '/../../drawForm.php');
            drawForm($usuariosdelete_form,  '/usuarios/delete', $usuarios);
        }
    break;
    default:
    case 'select':
        // Leer del archivo de texto todos los usuarios en un string
        $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
        $data = file_get_contents($filename);
        // Separar por saltos de linea y guardar en un array
        $data = explode("\n", $data);
        echo "<a href=\"/usuarios/insert\">Insert</a>";
        echo "<table border=1>";
            foreach ($data as $key => $fila)
            {
                // Separar por pipes la fila
                $columnas = explode("|", $fila);
                echo "<tr>";
                foreach ($columnas as $key2 => $value)
                {                
                    echo "<td>";
                        echo $value;
                    echo "</td>";
                }
                echo "<td>";
                        echo "<a href=\"/usuarios/update/id/".$key."\">Update</a> | ";
                        echo "<a href=\"/usuarios/delete/id/".$key."\">Delete</a>";
                    echo "</td>";
                echo "</tr>";
            }
        echo "</table>";
    break;
}



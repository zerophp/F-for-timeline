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
                header('Location: /usuario/select');                 
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
            // Filtrar
            // Validar
            // Si es valido
                // Leer el archivo de texto en un string
                // Obtener un array desde el string
                // Reeemplazar la linea ID
                    // Por el string de usuario
                        // Juntar los datos del usuario por pipes
                // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
                // Ir a select 
        }
        else 
        {
            // Leer el archivo de texto en un string
            $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
            $usuarios = file_get_contents($filename);
            // Obtener un array desde el string
            $usuarios = explode("\n", $usuarios);
            // Tomar el usuario ID
            // Separar el usuario por pipes para tener una array
            $usuario = explode("|", $usuarios[$data[4]]);
                
            echo "<pre>USUARIO: ";
            print_r($usuario);
            echo "</pre>";
            
            $data_usuario = array (
                    'name'=>$usuario[0],
                    'email'=>$usuario[1],
                    'password'=>$usuario[2]
            );
            
            echo "<pre>DATA USUARIO: ";
            print_r($data_usuario);
            echo "</pre>";
            
            die;
            include_once (__DIR__ . '/../../forms/usuariosForm.php');
            // Dibujar el formulario con los datos del usuario
            drawForm($usuarios_form,  '/usuarios/insert', $usuarios);
        }
       
    break;
    case 'delete':
        echo "esto es el delete";
        if($_POST)
        {
            // Filtrar
            // Validar
            // Si es valido
                // Leer el archivo de texto en un string
                // Obtener un array desde el string
                // Eliminar la linea ID
                // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
                // Ir a select 
        }
        else
        {
            // Tomar el id
            // Leer el archivo de texto en un string
            // Obtener un array desde el string
            // Tomar el usuario ID
            // Separar el usuario por pipes para tener una array
            
            // Dibujar el formulario de delete con los datos del usuario
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
                        echo "<a href=\"/usuarios/delet/id/".$key."\">Delete</a>";
                    echo "</td>";
                echo "</tr>";
            }
        echo "</table>";
    break;
}



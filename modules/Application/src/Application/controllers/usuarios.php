<?php


switch ($request['action'])
{
    case 'insert':
        if ($_POST)
        {
            include_once (__DIR__ . '/../../forms/usuariosForm.php');
            include_once (__DIR__ . '/../../../../Core/src/Forms/model/filterForm.php');
            include_once (__DIR__ . '/../../../../Core/src/Forms/model/validate.php');          
           
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
            include_once (__DIR__ . '/../../../../Core/src/Forms/model/drawForm.php');            
            echo drawForm($usuarios_form, '/usuarios/insert', null);
        }
    break;
    case 'update':
        if($_POST)
        {
            // Filtrar
            // Validar
            include_once (__DIR__ . '/../../forms/usuariosForm.php');
            include_once (__DIR__ . '/../../../../Core/src/Forms/model/filterForm.php');
            include_once (__DIR__ . '/../../../../Core/src/Forms/model/validate.php');
             
            $postfilter = filterForm($_POST, $usuarios_form);
            $validate = validate($postfilter, $usuarios_form);
            // Si es valido
            if($validate['valid'])
            {
                // Leer el archivo de texto en un string
                $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
                $usuarios = file_get_contents($filename);
                // Obtener un array desde el string
                $usuarios = explode("\n", $usuarios);
                // Reeemplazar la linea ID
                    // Por el string de usuario
                    $usuarios[$postfilter['id']]=implode("|", $postfilter);
                    // Juntar los datos del usuario por pipes
                    // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
                    $usuarios=implode("\n",$usuarios);
                    file_put_contents($filename, $usuarios);
                    // Ir a select
                    header('Location: /usuarios/select');
            }
            
                
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
            $usuario = explode("|", $usuarios[$request['params']['id']]);
                
            echo "<pre>USUARIO: ";
            print_r($usuario);
            echo "</pre>";
            
            $data_usuario = array (
                    'name'=>$usuario[1],
                    'email'=>$usuario[2],
                    'password'=>$usuario[3],
                    'id'=>$request['params']['id']
            );
            
            echo "<pre>DATA USUARIO: ";
            print_r($data_usuario);
            echo "</pre>";
            
            
            include_once (__DIR__ . '/../../forms/usuariosForm.php');
            include_once (__DIR__ . '/../../../../Core/src/Forms/model/drawForm.php');
            // Dibujar el formulario con los datos del usuario
            echo drawForm($usuarios_form,  '/usuarios/update', $data_usuario);
        }
       
    break;
    case 'delete':
        echo "esto es el delete";
        if($_POST)
        {
            // Filtrar
            // Validar
            include_once (__DIR__ . '/../../forms/usuariosdeleteForm.php');
            include_once (__DIR__ . '/../../../../Core/src/Forms/model/filterForm.php');
            include_once (__DIR__ . '/../../../../Core/src/Forms/model/validate.php');
             
            $postfilter = filterForm($_POST, $usuariosdelete_form);
            $validate = validate($postfilter, $usuariosdelete_form);
            // Si es valido
            if($validate['valid'])
            {
                // Si es valido
                // Leer el archivo de texto en un string
                $filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
                $usuarios = file_get_contents($filename);
            
                // Obtener un array desde el string
                $usuarios = explode("\n", $usuarios);
                // Eliminar la linea ID
                if($postfilter['enviar']=='Si')
                {
                    unset($usuarios[$postfilter['id']]);
                    // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
                    $usuarios=implode("\n",$usuarios);
                    file_put_contents($filename, $usuarios);
                }
                 // Ir a select
                 header('Location: /usuarios/select'); 
            }
         
            
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
            $usuario = explode("|", $usuarios[$request['params']['id']]);
            
            $data_usuario = array (
                'name'=>$usuario[1],
                'id'=>$request['params']['id']
            );
            
            // Dibujar el formulario de delete con los datos del usuario
            include_once (__DIR__ . '/../../forms/usuariosdeleteForm.php');
            include_once (__DIR__ . '/../../../../Core/src/Forms/model/drawForm.php');
            // Dibujar el formulario con los datos del usuario
            echo drawForm($usuariosdelete_form,  '/usuarios/delete', $data_usuario);
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



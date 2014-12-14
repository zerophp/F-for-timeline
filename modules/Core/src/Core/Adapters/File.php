<?php
namespace Core\Adapters;

class File implements AdapterInterface
{
    private $link;
    /**
     * Connect to adapter
     * @param array $config
     * @return resource $link
     */
    public function connect(array $config)
    {
        if (is_file ( $config['filename_path'] ))
        {
            $this->link = $config['filename_path']; //$_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
            return true;
        }
         
        return false;
        
    }
    
    public function disconnect(){
        unset($this->link);
        
        return true;
    }
    
    public function fetchAll()
    {
        if (isset($this->link)){
            $usuarios = file_get_contents($this->link);
            
            // Obtener un array desde el string
            $usuarios = explode("\n", $usuarios);
            
            return $usuarios;
        } else {
            return false;
        }
    }
    public function fetch($id)
    {
        if (isset($this->link)){
            $usuarios = file_get_contents($this->link);
            // Obtener un array desde el string
            $usuarios = explode("\n", $usuarios);
            // Tomar el usuario ID
            // Separar el usuario por pipes para tener una array
            $usuario = explode("|", $usuarios[$id]);
            
            return $usuario;
        } else {
            return false;
        }
    }
    public function create($data)
    {
        if (isset($this->link)){
            $data = implode ("|",$data);
            $data.="\n";
            return file_put_contents($this->link, $data, FILE_APPEND);
        } else {
            return false;
        }
    }
    public function update($id,$data)
    {
        if (isset($this->link)){
            $usuarios = $this->fetchAll();
            $usuarios[$id] = implode ("|",$data);
            $usuarios=implode("\n",$usuarios);
            return  file_put_contents($this->link, $usuarios);
        } else {
            return false;
        }

    }
    public function delete($id)
    {
        if (isset($this->link)){
            $usuarios = $this->fetchAll();
            unset($usuarios[$id]);
            // Sobreestribir el archivo de texto con el array juntado por saltro de lineas
            $usuarios=implode("\n",$usuarios);
            return  file_put_contents($this->link, $usuarios);
        } else {
            return false;
        }
    }
    
}
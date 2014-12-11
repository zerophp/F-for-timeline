<?php

use Core\Adapters\AdapterInterface;

class Txt implements AdapterInterface
{
    private $filename;
    
    public function connect(array $config)
    {
        $this->filename = $config['filename'];
    }

    public function disconnect()
    {
        $this->filename = null;
    }

    public function fetchAll()
    {
        // Leer el archivo de texto en un string
        $usuarios = file_get_contents($this->filename);
        
        // Obtener un array desde el string
        $usuarios = explode("\n", $usuarios);
        
        return $usuarios;
    }

    public function fetch($id)
    {
        // Leer el archivo de texto en un string
        $usuarios = file_get_contents($this->filename);
        // Obtener un array desde el string
        $usuarios = explode("\n", $usuarios);
        // Tomar el usuario ID
        // Separar el usuario por pipes para tener una array
        $usuario = explode("|", $usuarios[$id]);
        
        return $usuario;
    }

    public function create($data)
    {
        $data = implode ("|", (array) $data);
        $data.="\n";
        return file_put_contents($this->filename, $data, FILE_APPEND);  
    }

    public function update($id, $data)
    {
        $data = implode ("|", (array) $data);
        $data.="\n";
        return file_put_contents($this->filename, $data, FILE_APPEND);
    }

    public function delete($id)
    {
        $usuarios = $this->fetchAll();
        $usuarios = (array) $usuarios;
        unset($usuarios[$id]);
        // Sobreestribir el archivo de texto con el array juntado por salto de lineas
        $usuarios=implode("\n", $usuarios);
        return  file_put_contents($this->filename, $usuarios);
    }
}
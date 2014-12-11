<?php
namespace Application\mapper;
use Core\Application\application;

class Users
{
    protected $entity;
    protected $adapter;
    
    public function __construct()
    {
        $config = application::getConfig();

        
        
        $adapter = new $config['adapter']();        
        $adapter->setTable('users');
        $adapter->connect($config);
        
        $this->setAdapter($adapter);
//         $dataUsuarios = $adapter->fetchAll();
        
//         echo "<pre>";
//         print_r($dataUsuarios);
//         echo "</pre>";
        
//         return $dataUsuarios;
    }
         
    /**
     * @return the $adapter
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @param field_type $adapter
     */
    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return the $entity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param field_type $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    
    
}
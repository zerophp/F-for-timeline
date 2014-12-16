<?php

namespace Application\Mapper;
use Core\Application\Application;

class Timelines
{
    protected $entity;
    protected $adapter;
    
    public function __construct()
    {
        $config = application::getConfig();
		$adapter = $config['adapter'];

        $adapter = new $adapter();        
        $adapter->setTable('timelines');
        $adapter->connect($config);
        
        $this->setAdapter($adapter);
//         $data = $adapter->fetchAll();
        
// //         echo "<pre>";
// //         print_r($data);
// //         echo "</pre>";
        
//         return $data;
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
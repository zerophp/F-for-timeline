<?php
namespace Core\Adapters;

use Core\Adapters\MysqlInterface;

abstract class MysqlAbstract implements MysqlInterface
{
//     public function numRows();
//     public function getLastId();
    
    private $table;
    
    /**
     * @return the $table
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param field_type $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

 
    
    
    
    
} 
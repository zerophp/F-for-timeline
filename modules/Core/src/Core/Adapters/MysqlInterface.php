<?php
namespace Core\Adapters;

interface MysqlInterface
{
//     private $table;
//     private $primaryKey;
    
//     public function getLastId();
//     public function numRows(); 
    public function getTable();
    public function setTable($table);   
}
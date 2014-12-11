<?php


use Core\Adapters\MysqlInterface;

abstract class MysqlAbstract implements MysqlInterface

{
    public function numRows();
    public function getLastId();
    
    final public function kaka()
    {
        echo "KAKA";    
    }
} 
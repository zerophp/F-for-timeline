<?php
namespace Core\Adapters;

interface MysqlInterface
{
    public function getLastId();
    public function numRows();    
}
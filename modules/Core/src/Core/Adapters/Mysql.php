<?php
namespace Core\Adapters;


class Mysql extends MysqlAbstract implements AdapterInterface
{
    /**
     * Connect to adapter
     * @param array $config
     * @return resource $link
     */
    private $link;
    
    public function connect(array $config)
    {
        $this->link = mysqli_connect($config['database']['host'],
            $config['database']['user'],
            $config['database']['password']
        );
        
        mysqli_select_db($this->link, $config['database']['db']);
    }
    
    public function disconnect()
    {
        mysqli_close($this->link);
    }
    
    public function fetchAll()
    {
        $sql = "SELECT * FROM ".$this->getTable();
        $result = mysqli_query($this->link, $sql);
    
        while($row = mysqli_fetch_assoc($result))
        {
            // $usuarios[$row['iduser']]=implode("|", $row);
            $usuarios[]=$row;
        }

        return $usuarios;
    }
    
    
    
    public function fetch($id)
    {
        $sql = "SELECT * 
                FROM ".$this->getTable()." 
                WHERE ".key($id)." = " . $id[key($id)];
        $result = mysqli_query($this->link, $sql);
        
        return mysqli_fetch_assoc($result);
    }
    
    public function create($data)
    {
        $sql = "INSERT INTO ".$this->getTable()." SET ";
        foreach ($data as $key => $value)
            $sql.= $key."='".$value."',";
        $sql = rtrim($sql,',');            
        
        $data =mysqli_query($this->link, $sql);
        return $data;
    }
    
    public function update($id, $data)
    {
        $data = (array)$data;
        $sql = "UPDATE ".$this->getTable()." SET ";
        foreach ($data as $key => $value)
            $sql.= $key."='".$value."',";
        $sql = rtrim($sql,',');
        $sql.=" WHERE ".key($id)."=".$id[key($id)];
    
        $data =mysqli_query($this->link, $sql);
        return $data;
    }
    
    
    
    public function delete($id)
    {
        $sql = "DELETE FROM ".$this->getTable()." 
                WHERE ".key($id)."=".$id[key($id)];        
        $data =mysqli_query($this->link, $sql);
    }
}
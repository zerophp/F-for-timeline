<?php
namespace Core\Adapters;

interface AdapterInterface
{

    protected $link;
    /**
     * Connect to adapter
     * @param array $config
     * @return resource $link
     */
    public function connect(array $config);
    public function disconnect();
    
    public function fetchAll();
    public function fetch($id);
    public function create($data);
    public function update($id,$data);
    public function delete($id);
    
}
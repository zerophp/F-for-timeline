<?php
namespace Application\Services;

use Application\Mapper\Users;
use Application\Mapper;

class Timelines
{
    public function GET($id=null)
    {
        
        if(!$id)
        {
            $mapper = new Mapper\Timelines();
            $timelines = $mapper->getAdapter()->fetchAll();
            return json_encode($timelines);
        }
        else 
            $this->GetONE($id);
    }
    
    private function GetONE($id)
    {
//         FILA 2
    }
    
    public function POST($data)
    {
//         FILA 1
    }
    
    public function PUT($id, $data)
    {
//         FILA 3
    }
    
    public function DELETE($id)
    {

        $mapper = new Mapper\Timelines();
        $timelines = $mapper->getAdapter()->delete($id);
        echo json_encode($id);
        
    }
}
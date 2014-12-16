<?php
namespace Application\Services;

use Application\mapper\Users;
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
            $this->GetONE($id)
    }
    
    private function GetONE
    
    public function POST($data)
    {
    
    }
    
    public function PUT($id, $data)
    {
    
    }
    
    public function DELETE($id)
    {
        $mapper = new Mapper\Timelines();
        $timelines = $mapper->getAdapter()->delete($id);
        echo json_encode($id);
        
    }
}
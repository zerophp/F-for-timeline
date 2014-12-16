<?php
namespace Application\Services;

use Application\mapper;

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
    
    public function POST($data)
    {
            
    }
    
    public function PUT($id, $data)
    {
        $timeline = [];
        
        // Comprobar que los datos no vienen vacíos
        if (isset($id) && isset($data)) {
            
            $timelineData = json_decode($data);
            
            $mapper = new Mapper\Timelines();
            
            // Actualizas la BD
            $timelines = $mapper->getAdapter()->update($id, $timelineData);
            
            // Lees los datos actualizados de BD
            $timeline = $mapper->getAdapter()->fetch($id);
        }
        
        return json_encode($timeline);
    }
    
    public function DELETE($id)
    {
    
    }
}
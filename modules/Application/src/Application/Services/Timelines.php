<?php
namespace Application\Services;

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
            return $this->GetONE($id);
    }
    
    private function GetONE($id)
    {
            $mapper = new Mapper\Timelines();
            $timelines = $mapper->getAdapter()->fetch($id);
            return json_encode($timelines);
    }
    
    public function POST($id,$data)
    {
        $timeline = [];
        
        // Comprobar que los datos no vienen vacíos
        if (isset($data)) {
        
            $timelineData = json_decode($data);
        
            $mapper = new Mapper\Timelines();
        
            // Actualizas la BD
            $timelines = $mapper->getAdapter()->create($timelineData);
            
            // Lees los datos actualizados de BD
            $timeline = $mapper->getAdapter()
                        ->fetch(array('idtimeline'=>$timelines));                        
        }
        
        return json_encode($timeline);
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

        $mapper = new Mapper\Timelines();               
        $timelines = $mapper->getAdapter()->delete($id);
        echo json_encode($id);
        
    }
    public function OPTIONS()
    {
        die ("OPTIONS Not implemented");
    }
}
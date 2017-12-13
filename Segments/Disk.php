<?php

class Disk extends AbstractSegment implements SegmentInterface
{
    private $total;
    private $free;
    
    
    public function getSegmentData()
    {
        $this->init();
        
        $pc = substr((100 / $this->total) * $this->free, 0,4);
        return "df:". $pc. "%";
        
    }

    private function init()
    {
        $this->free = disk_free_space(".");
        $this->total = disk_total_space(".");
    }

}

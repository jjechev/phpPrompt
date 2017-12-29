<?php

class Disk extends AbstractSegment implements SegmentInterface
{

    private $total;
    private $free;
    private $alertDiskSpace = 5; // percentages
    
    public function __construct()
    {
        $this->init();
    }

    public function getSegmentData()
    {
        if ($this->total) {
            $disk = substr((100 / $this->total) * $this->free, 0, 4);

            $statusColor =  $disk < $this->alertDiskSpace  ? $this->getStyleCode([Codes::TEXT_COLOR_LIGHT_RED]) : '';

            return "df:" . $statusColor . $disk . "%";
        }
    }

    private function init()
    {
        $this->free = disk_free_space(".");
        $this->total = disk_total_space(".");
    }

}

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

            $statusColor = $disk < $this->alertDiskSpace ? $this->getStyleCode([Codes::TEXT_COLOR_LIGHT_RED]) : '';

            return "df:" . $statusColor . $disk . "%";
        }
    }

    public function getAdditionalSegmentData()
    {
        if ($this->total) {
            $out = "disk total: ". $this->human_filesize($this->total). " | ";
            $out .= "free: ". $this->human_filesize($this->free). " | ";
            $out .= "used: ". $this->human_filesize($this->total - $this->free). " ";
            
            return $out;
        }
    }

    private function init()
    {
        $this->free = disk_free_space(".");
        $this->total = disk_total_space(".");
    }

    private function human_filesize($bytes, $decimals = 2)
    {
        $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

}

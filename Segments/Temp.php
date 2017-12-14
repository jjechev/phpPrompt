<?php

class Temp extends AbstractSegment implements SegmentInterface
{

    public function getSegmentData()
    {
        $out = "";
        $temp = (int) @trim(file_get_contents("/sys/class/thermal/thermal_zone0/temp"));
        $temp = (float) $temp / 1000;
        if ($temp) {
             $out = $temp . "°c";
        }
        return $out;
    }

}

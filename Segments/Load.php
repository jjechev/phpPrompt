<?php

class Load extends AbstractSegment implements SegmentInterface
{

    public function getSegmentData()
    {
        return 'l:' . sys_getloadavg()[0];
    }


    public function getAdditionalSegmentData()
    {
        return 'load: ' . implode(" ",sys_getloadavg());
    }

}

<?php

class Load extends AbstractSegment implements SegmentInterface
{

    public function getAdditionalSegmentData()
    {
        return 'load: ' . implode(" ",sys_getloadavg());
    }

}

<?php

class Host extends AbstractSegment implements SegmentInterface
{

    public function getSegmentData()
    {
        return '\h';
    }

}

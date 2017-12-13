<?php

class Phpversion extends AbstractSegment implements SegmentInterface
{

    public function getSegmentData()
    {
        return "[".phpversion()."]";
    }

}


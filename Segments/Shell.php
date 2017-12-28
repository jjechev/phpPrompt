<?php

class Shell extends AbstractSegment implements SegmentInterface
{

    public function getSegmentData()
    {
        return '\s@\V';
    }

}

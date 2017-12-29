<?php

class Shell extends AbstractSegment implements SegmentInterface
{

    public function getAdditionalSegmentData()
    {
        return 'shell version: \s \V';
    }

}

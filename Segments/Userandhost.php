<?php

class Userandhost extends AbstractSegment implements SegmentInterface
{

    public function getSegmentData()
    {
        return '\u@\h';
    }

}
